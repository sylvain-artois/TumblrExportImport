<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostPhoto
 *
 * Multi-photo Photo posts, called **Photosets**,
 * will send return multiple photo objects in the photos array.
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 * @see http://www.tumblr.com/docs/en/api/v2#photo-posts
 */
class PostPhoto extends Post
{
    /** @var array Photo vector */
    protected $photos;

    /** @var string user supplied caption for the individual photo */
    protected $caption;

    /** @var int The width of the photo or photoset */
    protected $width;

    /** @var int The height of the photo or photoset */
    protected $height;

    /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param array $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * @return array
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }


} 