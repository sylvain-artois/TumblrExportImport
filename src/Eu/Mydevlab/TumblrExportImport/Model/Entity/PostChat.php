<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostChat
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 */
class PostChat extends Post
{
    /** @var string The optional title of the post */
    protected $title;

    /** @var string The full chat body */
    protected $body;

    /** @var array Dialogue vector */
    protected $dialogue;

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param array $dialogue
     */
    public function setDialogue($dialogue)
    {
        $this->dialogue = $dialogue;
    }

    /**
     * @return array
     */
    public function getDialogue()
    {
        return $this->dialogue;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
} 