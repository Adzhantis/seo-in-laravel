<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.18
 * Time: 16:11
 */

namespace App\Services\UserSide\Seo\Abstracts;


use App\Entities\Seo;
use App\Entities\SeoLocale;

abstract class AbstractMeta
{
    const SITE_NAME = 'Stripo.email';

    /**
     * @var Seo
     */
    protected $seo;

    /**
     * @var SeoLocale
     */
    protected $locale;

    /**
     * @param Seo $seo
     */
    public function setSeo(Seo $seo): void
    {
        $this->seo = $seo;
    }

    /**
     * @param SeoLocale $locale
     */
    public function setLocale(SeoLocale $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    protected static function concatSiteName(): string
    {
        return ' - ' . static::SITE_NAME;
    }
}