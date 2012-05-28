<?php
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
<div id="content"><img src="ajax-loader.gif" alt="Loading..." /></div>

