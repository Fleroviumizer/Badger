<?php

declare(strict_types=1);

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Tests\Badger\Render;

use AltThree\Badger\Badge;
use AltThree\Badger\Calculator\GDTextSizeCalculator;
use AltThree\Badger\Render\FlatSquareRender;
use GrahamCampbell\TestBench\AbstractTestCase;

/**
 * This is the flat square render test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class FlatSquareRenderTest extends AbstractTestCase
{
    public function testGetSupportedFormats()
    {
        $svgRender = $this->getSvgRenderer();

        $this->assertSame(['flat-square'], $svgRender->getSupportedFormats());
    }

    public function testRenderAltThreeAwesomeBrightGreen()
    {
        $svgRender = $this->getSvgRenderer();
        $badge = new Badge('Alt Three', 'Awesome', 'brightgreen', 'svg');
        $badgeImage = $svgRender->render($badge);

        $this->assertSame($this->getStubFile('alt-three-awesome-brightgreen-flat-square.svg'), (string) $badgeImage);
        $this->assertSame('svg', $badgeImage->getFormat());
    }

    public function testRenderAltThreeDeadRed()
    {
        $svgRender = $this->getSvgRenderer();
        $badge = new Badge('Alt Three', 'Dead', 'red', 'svg');
        $badgeImage = $svgRender->render($badge);

        $this->assertSame($this->getStubFile('alt-three-dead-red-flat-square.svg'), (string) $badgeImage);
        $this->assertSame('svg', $badgeImage->getFormat());
    }

    protected function getSvgRenderer()
    {
        $base = __DIR__.'/../../resources/';

        $calculator = new GDTextSizeCalculator(realpath($base.'fonts/DejaVuSans.ttf'));
        $path = $base.'templates';

        return new FlatSquareRender($calculator, realpath($path));
    }

    protected function getStubFile($file)
    {
        $path = realpath(__DIR__.'/stubs');

        return file_get_contents($path.'/'.$file);
    }
}
