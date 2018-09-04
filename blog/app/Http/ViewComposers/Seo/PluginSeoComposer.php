<?php

namespace App\Http\ViewComposers\Seo;

use App\Http\Controllers\UserSide\PluginController;

class PluginSeoComposer extends AbstractSeoComposer
{

    /**
     * @return string
     */
    public static function getRouteName(): string
    {
        return PluginController::ROUTE_NAME;
    }

}