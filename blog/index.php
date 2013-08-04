<?php
	require '../init.inc.php';

	$art=new Article(23);
	$art->outArticle();


	//设置模板的存放位置


	$xxxxxxx= new Index("主页类测试");
	echo '<a target="_blank" href="addarticle.php"'.'>添加文章</a>';
	echo $xxxxxxx->key;

?>