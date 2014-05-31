<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class TextPost
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 * @see http://www.tumblr.com/docs/en/api/v2#text-posts
 */
class TextPost extends Post
{
    /** @var String The optional title of the post */
    protected $title;

    /** @var String The full post body */
    protected $body;

    /**
     * @param String $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return String
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param String $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }
} 