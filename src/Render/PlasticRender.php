<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger\Render;

use AltThree\Badger\Badge;
use AltThree\Badger\BadgeImage;
use AltThree\Badger\Calculator\TextSizeCalculatorInterface;
use AltThree\Badger\Calculator\GDTextSizeCalculator;

/**
 * This is the plastic render class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class PlasticRender extends AbstractRender implements RenderInterface
{
    /**
     * Return a list of supported formats by the render.
     *
     * @return string[]
     */
    public function getSupportedFormats()
    {
        return ['plastic'];
    }

    /**
     * Returns the template contents.
     *
     * @return string
     */
    protected function getTemplate()
    {
        return file_get_contents(__DIR__.'/templates/plastic.svg');
    }
}
