<?php

namespace Renus\LastTweetBundle\Entity;

/**
 * Tweet
 */
class Tweet
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $screen;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Tweet
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * return formated text with lin for hashtag, mention and link
     *
     * @param $text
     * @return mixed
     */
    public function getFormatText()
    {
        $text = $this->getText();
        $text = preg_replace('#http[s]://[a-z0-9._/-]+#i', '<a target="_blank" href="$0">$0</a>', $text);
        $text = preg_replace('#@([a-z0-9_]+)#i', '@<a target="_blank" href="http://twitter.com/$1">$1</a>', $text);
        return $text;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Tweet
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tweet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set screen
     *
     * @param string $screen
     *
     * @return Tweet
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;

        return $this;
    }

    /**
     * Get screen
     *
     * @return string
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * Set screen
     *
     * @param string $screen
     *
     * @return Tweet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get screen
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}

