<?php include('../functions/load_sorted_reviews.php'); ?>
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"></link>
    <meta charset="utf-8">
    <title>Review Table PHP</title>
  </head>
  <body>
    <h1 style="margin-top: 3em;" class="ui center aligned header">Review Table</h1>
    <div class="ui container">
      <table class="ui table">
        <thead>
        <tr>
          <th>Mark Description</th>
          <th>Comment</th>
          <th>Creation Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
          $reviews = loadSortedReviews();
          foreach ($reviews as $review) {
          echo "<tr>
              <td>$review->markDescription</td>
              <td>$review->comment</td>
              <td>$review->creationDate</td>
            </tr>";
          }
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
