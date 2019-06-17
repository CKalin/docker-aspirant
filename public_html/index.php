<?php include('./functions/get-reviews-api-url.php'); ?>
<html>
  <head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="/assets/style.css" />
  </head>
  <body>
    <header class="sticky">
      <a id="header-backlink" href="https://localhost:9980/">
        <div class="logo-wrapper">
          <div class="logo"></div>
        </div>
      </a>
      <div  class="speechbubble-end"></div>
    </header>
    <main>
      <div class="main-box">
        <h1>You did it!</h1>
        <h2>You successfully set up your docker environment \o/</h2>
        This is a blank page! But you can use the public_html folder to serve static files like single-page apps or whatever else you want.

        <p>
          You are calling from IP Address: <?php echo $_SERVER['REMOTE_ADDR'] ?>
        </p>
        <p>
          The Reviews API is hosted at:
          <ul>
            <li>When calling within PHP-Script: <a target="_blank" href="<?php echo get_reviews_api_url(); ?>"><?php echo get_reviews_api_url(); ?></a> or </li>
            <li>When calling from your browser: <a target="_blank" href="http://localhost:9980/api/reviews.json">http://localhost:9980/api/reviews.json</a>
        </p>
      </div>
      <div class="main-box">
        <h1>Reviews List</h2>
        You can use this box for Task 2!

        <!-- insert PHP code here -->
      </div>
    </main>
  </body>
</html>