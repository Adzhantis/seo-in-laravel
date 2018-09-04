<?php

namespace App\Http\ViewComposers\Seo;

use App\Http\Controllers\UserSide\FrontController;
use App\Services\UserSide\Seo\Meta\FrontOpenGraphTags;


class FrontSeoComposer extends AbstractSeoComposer
{

    /**
     * @return string
     */
    public static function getRouteName(): string
    {
        return FrontController::ROUTE_NAME;
    }

    public function setOpenGraphTags($class = null): void
    {
        $class = FrontOpenGraphTags::class;
        parent::setOpenGraphTags($class);
    }

}