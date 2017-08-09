<?php
/*
Template Name: Radio Player
*/
?>
<!doctype HTML>
<head>
  <title>Listen live | Smoke Radio</title>
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/style.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta property="fb:app_id" content="1134129026651501" />
  <meta property="og:url" content="http://smokeradio.co.uk/"/>
  <meta property="og:title" content="Listen live | Smoke Radio" />
  <meta property="og:site_name" content="Smoke Radio" />
  <meta property="og:description" content="London's student sound." />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo plugin_dir_url( __FILE__ ) ?>poster-player.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Smoke_Radio">
  <meta name="twitter:creator" content="@Smoke_Radio">
  <meta name="twitter:title" content="Smoke Radio">
  <meta name="twitter:description" content="London's student sound.">
  <meta name="twitter:image" content="<?php echo plugin_dir_url( __FILE__ ) ?>poster-player.jpg" >

  <?php wp_head(); ?>
</head>
<body  style="background-image:url('<?php echo plugin_dir_url( __FILE__ ) ?>/pattern.png')">
  <audio id="radio-audio" preload="none">
    <source src="http://77.68.10.108:8080/listen" type="audio/aac"/>
    <source src="http://77.68.10.108:8080/mobile" type="audio/mpeg"/>
  </audio>

  <section class="branding">
    <img src="<?php echo plugin_dir_url( __FILE__ ) ?>/logo.png"/>
  </section>

  <section class="controls">
    <button id="radio-control" onclick="playPause()" class="fa fa-play fa-3x"></button>
  </section>

  <div class="group">
    <section class="data">
        <div class="show-image"></div>
        <aside>
          <h3></h3>
          <h2></h2>
          <p></p>
        </aside>
    </section>

    <section class="ad">
          <p>On mobile? There's a better way to listen...</p>
          <span>Get the app</span>
          <a href="http://smoke.media/app"></a>
    </section>
  </div>

  <section class="social">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1134129026651501";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-mention-button twitter-mention-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.3748f7cda49448f6c6f7854238570ba0.en.html#dnt=true&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fuwsu.com%2Fplayer%2Findex.php&amp;screen_name=Smoke_Radio&amp;size=m&amp;time=1482379632841&amp;type=mention" style="position: static; visibility: visible; width: 156px; height: 20px;" data-screen-name="Smoke_Radio"></iframe>
    <div class="fb-like" data-href="https://smokeradio.co.uk" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
  </section>

  <script src="<?php echo plugin_dir_url( __FILE__ ) . 'player.js' ?>"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80425128-1', 'auto');
    ga('send', 'pageview');

  </script>
</body>
</html>
