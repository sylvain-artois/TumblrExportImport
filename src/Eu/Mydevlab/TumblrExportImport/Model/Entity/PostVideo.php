<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostVideo
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 */
class PostVideo extends Post
{
    /** @var String The user-supplied caption */
    protected $caption;

    /** @var array Player vector */
    protected $player;

    /**
     * @param String $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return String
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param array $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return array
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
