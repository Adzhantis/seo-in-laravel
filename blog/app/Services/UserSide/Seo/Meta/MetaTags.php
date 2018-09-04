<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.18
 * Time: 14:35
 */

namespace  App\Services\UserSide\Seo\Meta;

use App\Services\UserSide\Seo\Interfaces\TitleDescrInterface;
use App\Services\UserSide\Seo\Interfaces\MetaInterface;
use SEOMeta as SeoToolsMeta, LaravelLocalization, App;
use App\Services\UserSide\Seo\Abstracts\AbstractMeta;
use App\Entities\Language;

class MetaTags extends AbstractMeta implements MetaInterface, TitleDescrInterface
{

    function setTitleWithSiteName(): void
    {
        if(!empty($this->locale->meta_title)) {
            SeoToolsMeta::setTitle($this->locale->meta_title . static::concatSiteName());
            //SeoToolsMeta::set();
        }
    }

    function setDescriptionWithSiteName(): void
    {
        if(!empty($this->locale->meta_description)) {
            SeoToolsMeta::setDescription($this->locale->meta_description);
        }
    }

    public function setKeywords(): void
    {
        if(!empty($this->locale->meta_keywords)) {
            SeoToolsMeta::setKeywords($this->locale->meta_keywords);
        }
    }

    public function setCanonical($url): void
    {
        SeoToolsMeta::setCanonical($url);
    }


    /**
     * @todo may be need to filter links to pages by existing
     * @param $routeName
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function addMetaRelAlternate($routeName):void
    {
        foreach (Language::getPluckAliasId() as $lang => $lang_id) {
            if($lang !== App::getLocale()) {
                SeoToolsMeta::addAlternateLanguage($lang,
                    LaravelLocalization::getLocalizedURL($lang, route($routeName)));
            }
        }
    }

    public function setRobots(): void
    {
        SeoToolsMeta::addMeta('robots', $this->seo->getRobots());
    }

    public function setImage(): void
    {
        // TODO: Implement setImage() method.
    }

}