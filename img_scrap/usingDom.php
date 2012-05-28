<?php
error_reporting(0);
function getArticleImage($article_url){
	$title="";
	$description="";
	$imageurl="";
	$c = file_get_contents($article_url);
	$d = new DomDocument();
	$d->loadHTML($c);
	$xp = new domxpath($d);
	$tags = get_meta_tags($article_url);
	//$title = $tags['title'];
	$description = $tags['description'];

	$html = file_get_contents($article_url);
	preg_match_all('/<img[^>]+>/i',$html, $result); 
	$arrResult=array();
	foreach( $result as $img_tag){
		foreach( $img_tag as $img_tag1){
			$subject = $img_tag1;
			$doc = new DOMDocument;
			$doc->loadHTML($subject);
			$imgs = $doc->getElementsByTagName('img');
			if ($imgs->length > 0) {
				$img_src = $imgs->item(0)->getAttribute('src');
				list($width, $height) = @getimagesize($img_src);
				$val = $width*$height;
				$arrResult[$val]=$img_src;
			}
		}
	}
	krsort($arrResult);
	$x=0;
	foreach ($arrResult as $key => $val) {
		if($x == 0)
			$imageurl= $val;
			$x++;
	}
	//array_push($arrResult, $title, $description);
	return $arrResult;
}
$res= getArticleImage('http://www.casinoaffiliateprograms.com/');
print_r($res);