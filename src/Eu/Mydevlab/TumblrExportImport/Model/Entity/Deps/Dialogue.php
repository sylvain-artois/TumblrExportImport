<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps;

/**
 * Class Dialogue
 *
 * @package Eu\Mydevlab\TumblrExportImport\Model\Entity\Deps
 * @author Sylvain Artois <sylvain.artois@gmail.com>
 */
class Dialogue
{
    /** @var string Name of the speaker */
    protected $name;

    /** @var string Label of the speaker */
    protected $label;

    /** @var string Text */
    protected $phrase;

    /**
     * @param string $name
     * @param string $label
     * @param string $phrase
     */
    public function __construct($name, $label, $phrase)
    {
        $this->label = $label;
        $this->name = $name;
        $this->phrase = $phrase;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $phrase
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;
    }

    /**
     * @return string
     */
    public function getPhrase()
    {
        return $this->phrase;
    }
}
 