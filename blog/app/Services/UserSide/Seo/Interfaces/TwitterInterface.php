<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.18
 * Time: 12:22
 */

namespace App\Services\UserSide\Seo\Interfaces;


interface TwitterInterface
{

    function setImage(): void;

    function setCard(): void;

    function setSiteName(): void;

}