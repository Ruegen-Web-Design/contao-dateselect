<?php

declare(strict_types=1);

namespace RuegenWebDesign\DateselectBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\SkeletonBundle\ContaoSkeletonBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            (new BundleConfig(RuegenWebDesignDateselectBundle::class))->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
