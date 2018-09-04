<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.18
 * Time: 12:22
 */

namespace App\Services\UserSide\Seo\Interfaces;


interface OpenGraphTagsInterface
{

    function addProperty($name, $content): void;

    function setImage(): void;

    function setSiteName(): void;

    function setType(): void;

    function setUrl(): void;

    function getUrl(): string;

}