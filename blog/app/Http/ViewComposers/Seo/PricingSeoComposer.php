<?php

namespace App\Http\ViewComposers\Seo;

use App\Http\Controllers\UserSide\PricingController;

class PricingSeoComposer extends AbstractSeoComposer
{

    /**
     * @return string
     */
    public static function getRouteName(): string
    {
        return PricingController::ROUTE_NAME;
    }

}