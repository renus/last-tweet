# lastTweet
Symfony 2 bundle to add quickly last tweets on your website, you can choose and change the screen name, 
override template and use your own template, this bundle reqiure dependency on abraham/twitteroauth bundle

# Installation

## prerequisites
when you install RenusLastTweetBundle for symfony, this dependency will be add :
    
    https://github.com/abraham/twitteroauth

## installation
    
1. Add this bundle to your project in composer.json:
    
<pre>
{
    "require": {
        "renus/lastTweet": "1.*",
    }
}
</pre>

2. Install with composer

<pre>
composer.phar require renus/lastTweet dev-master
</pre>

3. Register the bundle


```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new \Renus\LastTweetBundle\RenusLastTweetBundle(),
    );
    // ...
}
```

#configuration 

##application twitter

first you must create an twitter application  on https://apps.twitter.com/ ,and create a token (read permission)

##parameters

you must add your twitter api parameters in app/config/config.yml, the required parameters must be added like this :

```yml
# app/config/config.yml
renus_last_tweet:
    twitter:
        consumer_key: "your_application_key"
        consumer_secret: "your_application_secret_key"
        token: "your_application_token"
        token_secret: "your_application_token_secret"
```


#Usage

##twig usage 

just add this render command in your twig template (in this example we display the last 3 tweets 
from the @renus_net account) :
<pre>
{% render path('renus_last_tweet', {screen: 'renus_net', number: 3}) %}
</pre>

##controller usage:

you can get the last tweets in an entity Array from the controller with this code: 

```php
<?php
// src/controller/someController.php
public function someAction()
{
    $tweets = $this->get('renus.twitter')->getLastTweets($screen, $number);
    // ...
    
    //if you want retweets and mention 
    $tweets = $this->get('renus.twitter')->getLastTweets($screen, $number, false, true);
}
```

#Override template

if you want to custom the render in a twig template usage, you cans specify the path of your 
override template in the app/config/config.yml :

##config
<pre>
```yml
# app/config/config.yml
renus_last_tweet:
    twitter:
        consumer_key: "your_application_key"
        consumer_secret: "your_application_secret_key"
        token: "your_application_token"
        token_secret: "your_application_token_secret"
    template:
        path: "path/of/custom/template/tweet.html.twig"
```
</pre>

##template

you can use the "tweets" entitties Array like this :

<pre>
{% for tweet in tweets %}
    <dl>
        <dt>{{ tweet.getDate() }}</dt>
        <dd>{{ tweet.getFormatText() | raw }}</dd>
    </dl>
{% endfor %}
</pre>

to see all the 'tweet' parameters open the Entity/Tweet.php
