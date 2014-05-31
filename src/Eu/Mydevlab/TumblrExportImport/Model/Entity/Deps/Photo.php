<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps;

/**
 * Class Photo
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps;
 * @see http://www.tumblr.com/docs/en/api/v2#photo-posts
 */
class Photo
{
    /** @var string user supplied caption for the individual photo (Photosets only) */
    protected $caption;

    /** @var  array AltSize vector */
    protected $alt_sizes;
}
