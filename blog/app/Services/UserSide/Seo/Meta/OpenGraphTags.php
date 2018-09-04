<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.18
 * Time: 14:35
 */

namespace App\Services\UserSide\Seo\Meta;

use App\Services\UserSide\Seo\Interfaces\OpenGraphTagsInterface;
use App\Services\UserSide\Seo\Interfaces\TitleDescrInterface;
use App\Services\UserSide\Seo\Abstracts\AbstractMeta;
use Artesaos\SEOTools\Facades\OpenGraph as OpenGraph;
use URL;

class OpenGraphTags extends AbstractMeta implements OpenGraphTagsInterface, TitleDescrInterface
{

    const OPEN_GRAPH_TYPE = 'article';

    function setTitleWithSiteName(): void
    {
        //var_dump($this->locale->og_title);die;
        if(!empty($this->locale->og_title)) {
            OpenGraph::setTitle($this->locale->og_title . static::concatSiteName());
        }
    }

    function setDescriptionWithSiteName(): void
    {
        if(!empty($this->locale->og_description)) {
            OpenGraph::setDescription($this->locale->og_description);
        }

    }

    function setImage(): void
    {
        if(!empty($this->locale->og_image)) {
            OpenGraph::addImage($this->locale->og_image);
        }
    }

    function addProperty($name, $content): void
    {
        OpenGraph::addProperty($name, $content);
    }

    function setUrl(): void
    {
        OpenGraph::setUrl($this->getUrl());
    }

    function setType(): void
    {
        OpenGraph::setType(static::OPEN_GRAPH_TYPE);
    }

    function setSiteName(): void
    {
        OpenGraph::setSiteName(static::SITE_NAME);
    }

    function getUrl(): string
    {
        return URL::current();
    }

}