<?php

declare(strict_types=1);

namespace RuegenWebDesign\DateselectBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RuegenWebDesignDateselectBundle extends Bundle
{
	public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
