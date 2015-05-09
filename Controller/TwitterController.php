<?php

namespace Renus\LastTweetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TwitterController extends Controller
{
    public function lastAction($screen, $number)
    {
        $tweets = $this->get('renus.twitter')->getLastTweets($screen, $number, false, true);
        $template = $this->container->getParameter('tweet_template');

        return $this->render(
            empty($template) ? "RenusLastTweetBundle:Twitter:last.html.twig" : $template, [
            'tweets' => $tweets
        ]);
    }
}
