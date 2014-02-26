<?php

/*
 * This file is part of the SnideScrutinizerBundle bundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\TravinizerBundle\Tests\Twig\Extension;

use Snide\Bundle\ScrutinizerBundle\Twig\Extension\ScrutinizerExtension;

/**
 * Class GithubExtensionTest
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class GithubExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ScrutinizerExtension
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ScrutinizerExtension();
    }

    /**
     * Test getColor
     */
    public function testColor()
    {
        $this->assertEquals(ScrutinizerExtension::GREEN, $this->object->getColor(8));
        $this->assertEquals(ScrutinizerExtension::GREEN, $this->object->getColor(9));
        $this->assertEquals(ScrutinizerExtension::GREEN, $this->object->getColor(10));

        $this->assertEquals(ScrutinizerExtension::YELLOW, $this->object->getColor(7));
        $this->assertEquals(ScrutinizerExtension::YELLOW, $this->object->getColor(6));

        $this->assertEquals(ScrutinizerExtension::SILVER, $this->object->getColor(5));
        $this->assertEquals(ScrutinizerExtension::SILVER, $this->object->getColor(4));

        $this->assertEquals(ScrutinizerExtension::RED, $this->object->getColor(3));
        $this->assertEquals(ScrutinizerExtension::RED, $this->object->getColor(2));
        $this->assertEquals(ScrutinizerExtension::RED, $this->object->getColor(1));
        $this->assertEquals(ScrutinizerExtension::RED, $this->object->getColor(0));
    }
}