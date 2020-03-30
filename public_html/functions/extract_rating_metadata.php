<?php
function extractRatingMetadata($url) {
  $pageHTML = file_get_contents($url, false);

  $ratingRegex = '/<meta name="description" content=".*\((?P<rating>\d+.\d+)\)">/';
  preg_match($ratingRegex, $pageHTML, $ratingMatches, PREG_OFFSET_CAPTURE);

  $titleRegex = '/<title>(?P<title>.*)<\/title>/';
  preg_match($titleRegex, $pageHTML, $titleMatches, PREG_OFFSET_CAPTURE);

  return [
    "rating" => floatval($ratingMatches['rating'][0]),
    "title" => $titleMatches['title'][0]
  ];
}
