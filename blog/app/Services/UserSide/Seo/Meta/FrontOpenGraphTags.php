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

class FrontOpenGraphTags extends OpenGraphTags implements OpenGraphTagsInterface, TitleDescrInterface
{
    const OPEN_GRAPH_TYPE = 'website';
}