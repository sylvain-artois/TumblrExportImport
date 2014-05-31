<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity;

/**
 * Class PostAnswer
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity
 */
class PostAnswer extends Post
{
    /** @var String The blog name of the user asking the question */
    protected $asking_name;

    /** @var String The blog URL of the user asking the question */
    protected $asking_url;

    /** @var String The question being asked */
    protected $question;

    /** @var String	The answer given */
    protected $answer;

    /**
     * @param String $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return String
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param String $asking_name
     */
    public function setAskingName($asking_name)
    {
        $this->asking_name = $asking_name;
    }

    /**
     * @return String
     */
    public function getAskingName()
    {
        return $this->asking_name;
    }

    /**
     * @param String $asking_url
     */
    public function setAskingUrl($asking_url)
    {
        $this->asking_url = $asking_url;
    }

    /**
     * @return String
     */
    public function getAskingUrl()
    {
        return $this->asking_url;
    }

    /**
     * @param String $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return String
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
