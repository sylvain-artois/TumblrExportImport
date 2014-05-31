<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostQuote
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 */
class PostQuote extends Post
{
    /** @var string The text of the quote (can be modified by the user when posting) */
    protected $text;

    /** @var string Full HTML for the source of the quote */
    protected $source;

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
} 