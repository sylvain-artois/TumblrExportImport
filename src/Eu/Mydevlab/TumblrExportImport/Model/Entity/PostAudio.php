<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostAudio
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 */
class PostAudio extends Post
{
    /** @var String The user-supplied caption */
    protected $caption;

    /** @var String HTML for embedding the audio player */
    protected $player;

    /** @var int Number of times the audio post has been played */
    protected $plays;

    /** @var String Location of the audio file's ID3 album art image */
    protected $album_art;

    /** @var String The audio file's ID3 artist value */
    protected $artist;

    /** @var String The audio file's ID3 album value */
    protected $album;

    /** @var String The audio file's ID3 title value */
    protected $track_name;

    /** @var int The audio file's ID3 track value*/
    protected $track_number;

    /** @var int The audio file's ID3 year value */
    protected $year;

    /**
     * @param String $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return String
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param String $album_art
     */
    public function setAlbumArt($album_art)
    {
        $this->album_art = $album_art;
    }

    /**
     * @return String
     */
    public function getAlbumArt()
    {
        return $this->album_art;
    }

    /**
     * @param String $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return String
     */
    public function getArtist()
    {
        return $this->artist;
    }

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
     * @param String $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return String
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param int $plays
     */
    public function setPlays($plays)
    {
        $this->plays = $plays;
    }

    /**
     * @return int
     */
    public function getPlays()
    {
        return $this->plays;
    }

    /**
     * @param String $track_name
     */
    public function setTrackName($track_name)
    {
        $this->track_name = $track_name;
    }

    /**
     * @return String
     */
    public function getTrackName()
    {
        return $this->track_name;
    }

    /**
     * @param int $track_number
     */
    public function setTrackNumber($track_number)
    {
        $this->track_number = $track_number;
    }

    /**
     * @return int
     */
    public function getTrackNumber()
    {
        return $this->track_number;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
} 