<?php include('./functions/get-reviews-api-url.php'); ?>
<html>
  <head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="/assets/style.css" />
  </head>
  <body>
    <header class="sticky">
      <a id="header-backlink" href="https://my.trustedshops.com/">
        <div class="logo-wrapper">
          <div class="logo"></div>
        </div>
      </a>
      <div  class="speechbubble-end"></div>
    </header>
    This is a blank page! But you can use the public_html folder to serve static files like single-page apps or whatever else you want.

    <p>
      You are calling from IP Address: <?php echo $_SERVER['REMOTE_ADDR'] ?>
    </p>
    <p>
      The Reviews API is hosted at:
      <?php echo get_reviews_api_url(); ?>
    </p>
  </body>
</html>