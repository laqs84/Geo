<?php include ("header.php") ;?>

<div id="siteframe">
	<div id="content">
            <div class="content-padding">
<?php



//$ch = curl_init("");
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile('http://www.crremates.com/home/index.php');
$data = $dom->getElementById("tabs-1");
echo $dom->saveHTML();
?>
            </div>
        </div>
</div>
 <?php include ("footer.php") ;?>