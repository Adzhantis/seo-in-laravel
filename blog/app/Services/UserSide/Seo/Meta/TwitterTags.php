<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.18
 * Time: 14:35
 */

namespace App\Services\UserSide\Seo\Meta;

use App\Services\UserSide\Seo\Interfaces\TitleDescrInterface;
use App\Services\UserSide\Seo\Interfaces\TwitterInterface;
use App\Services\UserSide\Seo\Abstracts\AbstractMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\OpenGraph;
use Twitter;

class TwitterTags extends AbstractMeta implements TwitterInterface, TitleDescrInterface
{

    const TWITTER_CARD    = 'summary_large_image';

    function setTitleWithSiteName(): void
    {
        if(!empty($this->locale->twitter_title)) {
            TwitterCard::setTitle($this->locale->twitter_title . static::concatSiteName());
        }

    }

    function setDescriptionWithSiteName(): void
    {
        if(!empty($this->locale->twitter_description)) {
            TwitterCard::setDescription($this->locale->twitter_description);
        }
    }

    function setCard(): void
    {
        Twitter::addValue('card', static::TWITTER_CARD);
    }

    function setSiteName(): void
    {
        Twitter::setSite(static::SITE_NAME);
    }

    function setImage(): void
    {
        if(!empty($this->locale->twitter_image)) {
            Twitter::setImage($this->locale->twitter_image);
            // Twitter::addImage();
        }
    }
}

/**
Twitter::addValue('card', static::TWITTER_CARD);

Twitter::setTitle($this->seo_locale->meta_title);
Twitter::setDescription($this->seo_locale->meta_description);
static::setTwitterDescriptionWithSiteName($this->seo_locale->meta_description);
static::setTwitterTitleWithSiteName($this->seo_locale->meta_title);
Twitter::setSite(static::SITE_NAME);
 */