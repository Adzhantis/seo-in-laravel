<?php

namespace App\Http\ViewComposers\Seo;

use App\Http\Controllers\UserSide\ReleaseController;


class ReleaseSeoComposer extends AbstractSeoComposer
{

    /**
     * @return string
     */
    public static function getRouteName(): string
    {
        return ReleaseController::ROUTE_NAME;
    }

}