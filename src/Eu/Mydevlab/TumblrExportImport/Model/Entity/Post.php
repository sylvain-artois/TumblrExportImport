<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class Post
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 * @see http://www.tumblr.com/docs/en/api/v2#m-posts-responses
 */
abstract class Post
{
    /** @var string The short name used to uniquely identify a blog */
    protected $blog_name;

    /** @var int The post's unique ID */
    protected $id;

    /** @var string The location of the post */
    protected $post_url;

    /** @var string The type of the post, one of text, quote, link, answer, video, audio, photo, chat */
    protected $type;

    /** @var int The time of the post, in seconds since the epoch */
    protected $timestamp;

    /** @var string The GMT date and time of the post */
    protected $date;

    /** @var string The post format: html or markdown */
    protected $format;

    /** @var string The key used to reblog this post */
    protected $reblog_key;

    /** @var array Tags applied to the post */
    protected $tags;

    /** @var bool Indicates whether the post was created via the Tumblr bookmarklet	Exists only if true */
    protected $bookmarklet;

    /** @var bool Indicates whether the post was created via mobile/email publishing. Exists only if true */
    protected $mobile;

    /** @var string The URL for the source of the content (for quotes, reblogs, etc.). Exists only if there's a content source */
    protected $source_url;

    /** @var string The title of the source site. Exists only if there's a content source */
    protected $source_title;

    /** @var bool Indicates if a user has already liked a post or not. Exists only if the request is fully authenticated with OAuth. */
    protected $liked;

    /** @var string Indicates the current state of the post. States are published, queued, draft and private */
    protected $state;

    /** @var int The total number of post available for this request, useful for paginating through results */
    protected $total_posts;

    /**
     * @param string $blog_name
     */
    public function setBlogName($blog_name)
    {
        $this->blog_name = $blog_name;
    }

    /**
     * @return string
     */
    public function getBlogName()
    {
        return $this->blog_name;
    }

    /**
     * @param boolean $bookmarklet
     */
    public function setBookmarklet($bookmarklet)
    {
        $this->bookmarklet = $bookmarklet;
    }

    /**
     * @return boolean
     */
    public function getBookmarklet()
    {
        return $this->bookmarklet;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param boolean $liked
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;
    }

    /**
     * @return boolean
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * @param boolean $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return boolean
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $post_url
     */
    public function setPostUrl($post_url)
    {
        $this->post_url = $post_url;
    }

    /**
     * @return string
     */
    public function getPostUrl()
    {
        return $this->post_url;
    }

    /**
     * @param string $reblog_key
     */
    public function setReblogKey($reblog_key)
    {
        $this->reblog_key = $reblog_key;
    }

    /**
     * @return string
     */
    public function getReblogKey()
    {
        return $this->reblog_key;
    }

    /**
     * @param string $source_title
     */
    public function setSourceTitle($source_title)
    {
        $this->source_title = $source_title;
    }

    /**
     * @return string
     */
    public function getSourceTitle()
    {
        return $this->source_title;
    }

    /**
     * @param string $source_url
     */
    public function setSourceUrl($source_url)
    {
        $this->source_url = $source_url;
    }

    /**
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $total_posts
     */
    public function setTotalPosts($total_posts)
    {
        $this->total_posts = $total_posts;
    }

    /**
     * @return int
     */
    public function getTotalPosts()
    {
        return $this->total_posts;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


} 