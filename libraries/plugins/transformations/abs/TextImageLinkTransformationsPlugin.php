<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Abstract class for the image link transformations plugins
 *
 * @package    PhpMyAdmin-Transformations
 * @subpackage ImageLink
 */
namespace PMA\libraries\plugins\transformations\abs;

use PMA\libraries\plugins\TransformationsPlugin;

if (!defined('PHPMYADMIN')) {
    exit;
}

/**
 * Provides common methods for all of the image link transformations plugins.
 *
 * @package PhpMyAdmin
 */
abstract class TextImageLinkTransformationsPlugin extends TransformationsPlugin
{
    /**
     * Gets the transformation description of the specific plugin
     *
     * @return string
     */
    public static function getInfo()
    {
        return __(
            'Displays an image and a link; the column contains the filename. The'
            . ' first option is a URL prefix like "http://www.example.com/". The'
            . ' second and third options are the width and the height in pixels.'
        );
    }

    /**
     * Does the actual work of each specific transformations plugin.
     *
     * @param string $buffer  text to be transformed
     * @param array  $options transformation options
     * @param string $meta    meta information
     *
     * @return string
     */
    public function applyTransformation($buffer, $options = array(), $meta = '')
    {
        return '<a href="' . htmlspecialchars(isset($options[0]) ? $options[0] : '')
            . htmlspecialchars($buffer) . '" target="_blank"><img src="'
            . htmlspecialchars(isset($options[0]) ? $options[0] : '') . htmlspecialchars($buffer)
            . '" border="0" width="' . (isset($options[1]) ? $options[1] : 100)
            . '" height="' . (isset($options[2]) ? $options[2] : 50) . '" />'
            . htmlspecialchars($buffer) . '</a>';
    }


    /* ~~~~~~~~~~~~~~~~~~~~ Getters and Setters ~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Gets the transformation name of the specific plugin
     *
     * @return string
     */
    public static function getName()
    {
        return "Image Link";
    }
}
