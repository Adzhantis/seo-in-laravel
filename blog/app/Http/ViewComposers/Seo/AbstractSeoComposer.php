<?php

namespace App\Http\ViewComposers\Seo;

use Illuminate\View\View;
use App\Services\UserSide\Seo\SeoService;
use \App\Services\UserSide\Seo\Meta\MetaTags;
use App\Services\UserSide\Seo\Meta\OpenGraphTags;
use App\Services\UserSide\Seo\Meta\TwitterTags;
use App\Repositories\SeoRepository;


abstract class AbstractSeoComposer
{
    /**
     * @var SeoService
     */
    private $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    //required for laravel compose logic
    public function compose(View $view):void
    {
        $this->setRouteName();

        if($this->isSetSeoRepository()) {
            $this->setMetaTags();
            $this->setOpenGraphTags();
            $this->setTwitterTags();
        }

    }

    public function isSetSeoRepository($class = null): bool
    {
        $class = $class ?: SeoRepository::class;

        return $this->seoService->isSetSeoRepository(app($class));
    }

    public function setMetaTags($class = null): void
    {
        $class = $class ?: MetaTags::class;
        $this->seoService->setMetaTags(app($class));
    }

    public function setOpenGraphTags($class = null): void
    {
        $class = $class ?: OpenGraphTags::class;
        $this->seoService->setOpenGraphTags(app($class));
    }

    public function setTwitterTags($class = null): void
    {
        $class = $class ?: TwitterTags::class;
        $this->seoService->setTwitterTags(app($class));
    }

    public function setRouteName($route_name = null): void
    {
        $route_name = $route_name ?: static::getRouteName();

        $this->seoService->setRouteName($route_name);
    }

    abstract static function getRouteName(): string;

}