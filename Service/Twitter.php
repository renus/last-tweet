<?php
/**
 * Created by renus
 * Date: 06/05/15
 */

namespace Renus\LastTweetBundle\Service;

use Abraham\TwitterOAuth\TwitterOAuth;
use Renus\LastTweetBundle\Entity\Tweet;

class Twitter
{
    /**
     * @var String
     */
    private $consumerKey;

    /**
     * @var String
     */
    private $consumerSecret;

    /**
     * @var String
     */
    private $token;

    /**
     * @var String
     */
    private $tokenSecret;

    /**
     * @var TwitterOAuth
     */
    private $twitter;

    /**
     * Construct
     *
     * @param $consumerKey
     * @param $consumerSecret
     * @param $token
     * @param $tokenSecret
     */
    public function __construct($consumerKey, $consumerSecret, $token, $tokenSecret)
    {
        $this->consumerKey    = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->token          = $token;
        $this->tokenSecret    = $tokenSecret;
        $this->twitter        = new TwitterOAuth($consumerKey, $consumerSecret, $token, $tokenSecret);

        $this->twitter ->ssl_verifypeer = false;
    }

    /**
     * return the (xà last tweet(s) for an screenname
     *
     * @param $username
     * @param $count
     * @param bool $replies
     * @param bool $rts
     * @return array
     */
    public function getLastTweets($username, $count, $replies = false, $rts = false)
    {
        $tweets = $this->twitter->get('statuses/user_timeline', [
            'screen_name'     => $username,
            'exclude_replies' => ! $replies,
            'include_rts'     => $rts,
            'count'           => $count
        ]);

        $response = [];
        foreach($tweets as $tweet) {
            $t = new Tweet();
            $t->setText($tweet->text);
            $t->setSource($tweet->source);
            $t->setName($tweet->user->name);
            $t->setScreen($tweet->user->screen_name);
            $t->setDate($tweet->created_at);
            $response[] = $t;
        }

        return $response;
    }
}