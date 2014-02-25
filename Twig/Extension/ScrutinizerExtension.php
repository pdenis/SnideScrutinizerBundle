<?php

namespace Snide\Bundle\ScrutinizerBundle\Twig\Extension;

/**
 * Class ScrutinizerExtension
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class ScrutinizerExtension extends \Twig_Extension
{
    const GREEN = 'green';

    const LIGHT_GREEN = 'greenyellow';

    const YELLOW = 'yellow';

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
            return self::LIGHT_GREEN;
        }else if($value < 4) {
            return self::RED;
        }

        return self::YELLOW;
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