<?php
$patterns="g78t3@ETG@E@QgG@EJGDUG&@780jbkfsjdhkjndxbzkjvshvfsa,kihfe";
$lenth=strlen($patterns);
$password=[];
for ($i=0; $i<8 ; $i++) { 
	$random=rand(0,$lenth);
	$password[]=$patterns[$random];
}
echo implode($password);
?>