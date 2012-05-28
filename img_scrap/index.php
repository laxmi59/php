<?php /*?><?php
// get whole content
$ch = curl_init("http://in.yahoo.com/?p=us");
$html = curl_exec($ch);
echo $html;
?>
<script type="text/javascript">
$("document").ready(function() {
    $("#content").load("curl.php #noupesoc");
});
</script>
<h1>Smashing Community News</h1>
<div id="content"><img src="ajax-loader.gif" alt="Loading..." /></div><?php */?>

<?php
// get only images
class Spider {
	private $ch;
	private $content;
	private $binary;
	private $url;
	
	function __construct() {
		$this->content = '';
		$this->binary = false;
		$this->url = '';
	}
	
	function fetchPage($url) {
		$this->url = $url;
		if (isset($this->url)) {
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($this->ch, CURLOPT_URL, $this->url);
			curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($this->ch, CURLOPT_BINARYTRANSFER, $this->binary);
			$this->content = curl_exec($this->ch);
			curl_close($this->ch);
		}
	}
	
	function getContent() {
		return $this->content;
	}
}
$spider = new Spider();
$spider->fetchPage('http://www.casinoaffiliateprograms.com/');
$content = $spider->getContent();

// get Title
preg_match('/<title>(.*)<\/title>/i', $content, $title);
echo $title_out = $title[1];
echo "<br>";
// get Key Words
preg_match('/<meta name="keywords" content="(.*)" \/> /i', $content, $keywords);
echo $keywords_out = $keywords[1];
echo "<br>";
// get meta disciprion
preg_match('/<meta name="description" content="(.*)" \/> /i', $content, $description);
echo $description_out = $description[1];
echo "<br>";
// get Images
$regx = '/<img src="(.*?)"([^>]*)>/ims';
$img_src = array();
preg_match_all($regx, $content, $imgs, PREG_PATTERN_ORDER);
$img_src = $imgs[0]; 
foreach($img_src as $val){ 
echo $val;
echo "<br>";
}
?> 