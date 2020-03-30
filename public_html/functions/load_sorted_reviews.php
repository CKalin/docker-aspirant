<?php
function loadSortedReviews() {
  // https://localhost:9980/api/reviews.json seems not to be working
  $jsonurl = "../api/reviews.json";
  $response = json_decode(file_get_contents($jsonurl));
  $reviews = $response->response->data->shop->reviews;
  usort($reviews, 'compareMarksDesc');
  return $reviews;
}

function compareMarksDesc($a, $b) {
    return $a->mark < $b->mark;
}
