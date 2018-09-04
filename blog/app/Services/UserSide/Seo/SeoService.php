<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.08.18
 * Time: 15:02
 */

namespace App\Services\UserSide\Seo;


use App\Services\UserSide\Seo\Interfaces\OpenGraphTagsInterface;
use App\Services\UserSide\Seo\Interfaces\TwitterInterface;
use App\Repositories\Interfaces\SeoRepositoryInterface;
use App\Services\UserSide\Seo\Interfaces\MetaInterface;
use App\Repositories\SeoRepository;
use App\Entities\SeoLocale;
use URL, Language, App;
use App\Entities\Seo;
class SeoService
{

    /**
     * @var SeoRepository
     */
    protected $repository;

    /**
     * @var Seo
     */
    protected $seo;

    /**
     * @var SeoLocale
     */
    protected $seoLocale;

    /**
     * @var SeoLocale
     */
    public $routeName;

    public function isSetSeoRepository(SeoRepositoryInterface $repository): bool {

        $this->repository = $repository;

        //todo need to set to seo already full locale model with full fields,
        // from current locale or default locale
        $this->seo       = $this->repository->whereRouteName($this->routeName)->first();
        $this->seoLocale = $this->repository->getLocaleMergedData($this->seo);

        if(is_object($this->seo) && is_object($this->seoLocale)) {
            return true;
        }

        return false;
    }

    public function setMetaTags(MetaInterface $metaTags, $params = []): void
    {
        $url       = !empty($params['canonical']) ? $params['canonical'] : URL::current();
        $routeName = !empty($params['routeName']) ? $params['routeName'] : $this->routeName;

        $metaTags->setSeo($this->seo);
        $metaTags->setLocale($this->seoLocale);

        $metaTags->addMetaRelAlternate($routeName);
        $metaTags->setDescriptionWithSiteName();
        $metaTags->setTitleWithSiteName();
        $metaTags->setKeywords();
        $metaTags->setCanonical($url);
        $metaTags->setImage();
        $metaTags->setRobots();

    }


    public function setOpenGraphTags(OpenGraphTagsInterface $ogMetaTags, $params = []): void
    {
        $ogMetaTags->setSeo($this->seo);
        $ogMetaTags->setLocale($this->seoLocale);

        $ogMetaTags->setType();
        $ogMetaTags->setImage();
        $ogMetaTags->setSiteName();


        $ogMetaTags->setTitleWithSiteName();
        $ogMetaTags->setDescriptionWithSiteName();
        $ogMetaTags->setUrl();

        $ogMetaTags->addProperty('locale', Language::getLanguageByAlias(App::getLocale()));

    }

    public function setTwitterTags(TwitterInterface $twitterMetaTags, $params = []): void
    {
        $twitterMetaTags->setSeo($this->seo);
        $twitterMetaTags->setLocale($this->seoLocale);

        $twitterMetaTags->setTitleWithSiteName();
        $twitterMetaTags->setDescriptionWithSiteName();

        $twitterMetaTags->setCard();
        $twitterMetaTags->setSiteName();
        $twitterMetaTags->setImage();
    }

    public function setRouteName($routeName) {
        $this->routeName = $routeName;
    }
}