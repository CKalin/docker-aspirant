<?php include('../functions/extract_rating_metadata.php');

$url = "https://www.trustedshops.de/bewertung/info_XCD7B06A865895BD55F9B86C6BE099CC7.html";
$metadata = extractRatingMetadata($url);

echo "<ul>
  <li>". $metadata['title'] ."</li>
  <li>". $metadata['rating'] ."</li>
</ul>
"
?>
