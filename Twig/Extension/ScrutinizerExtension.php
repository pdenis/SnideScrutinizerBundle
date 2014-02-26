<?php

/*
 * This file is part of the SnideScrutinizerBundle bundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\ScrutinizerBundle\Twig\Extension;

/**
 * Class ScrutinizerExtension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ScrutinizerExtension extends \Twig_Extension
{
    const GREEN = 'green';

    const YELLOW = 'yellow';

    const SILVER = 'silver';

    const RED = 'red';

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getFunctions()
    {
        return array(
            'snide_scrutinizer_color'  => new \Twig_Function_Method(
                $this,
                'getColor',
                array('is_safe'=> array('html'))
            ),
        );
    }

    /**
     * Get a specific color for a value
     * @param int $value a value between 0 and 100
     */
    public function getColor($value)
    {
        if($value >= 8) {
            return self::GREEN;
        }else if($value < 8 && $value >= 6) {
            return self::YELLOW;
        }else if($value < 4) {
            return self::RED;
        }

        return self::SILVER;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'snide_scrutinizer';
    }
}