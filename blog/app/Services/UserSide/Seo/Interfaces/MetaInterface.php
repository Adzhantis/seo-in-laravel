<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.18
 * Time: 12:22
 */

namespace App\Services\UserSide\Seo\Interfaces;


interface MetaInterface
{

    function setImage(): void;

    function addMetaRelAlternate($routeName): void;

    function setRobots(): void;

    function setKeywords(): void;

}