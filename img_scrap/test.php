<?php
$target_url = "http://www.affiliateprograms.com/blog/";
$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';

// make the cURL request to $target_url
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$html= curl_exec($ch);
if (!$html) {
	echo "<br />cURL error number:" .curl_errno($ch);
	echo "<br />cURL error:" . curl_error($ch);
	exit;
}

// parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);

// grab all the on the page
$xpath = new DOMXPath($dom);

$titles = $dom->getElementsByTagName('title');
foreach ($titles as $book) {
    echo $book->nodeValue, PHP_EOL;
}
/*
// get all links
$hrefs = $xpath->evaluate("/html/body//a");
for ($i = 0; $i < $hrefs->length; $i++) {
	$href = $hrefs->item($i);
	$url = $href->getAttribute('href');
	//storeLink($url,$target_url);
	echo "<br />Link stored: $url";
}
// get all images
$srcs = $xpath->evaluate("/html/body//img");
for ($i = 0; $i < $srcs->length; $i++) {
	$src = $srcs->item($i);
	$url = $src->getAttribute('src');
	//storeLink($url,$target_url);
	echo "<br />Link stored: $url";
}
// get all meta tags
$srcs = $xpath->evaluate("/html/head//meta");
for ($i = 0; $i < $srcs->length; $i++) {
	$src = $srcs->item($i);
	$url = $src->getAttribute('name');
	$url = $src->getAttribute('content');
	//storeLink($url,$target_url);
	echo "<br />Link stored: $url";
}*/
// get all meta tags

?>