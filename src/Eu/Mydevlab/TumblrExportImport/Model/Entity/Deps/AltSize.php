<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps;

/**
 * Class AltSize
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps;
 * @see http://www.tumblr.com/docs/en/api/v2#photo-posts
 */
class AltSize
{
    /** @var int width of the photo, in pixels */
    protected $width;

    /** @var int height of the photo, in pixels */
    protected $height;

    /** @var string Location of the photo file (either a JPG, GIF, or PNG) */
    protected $url;
} 