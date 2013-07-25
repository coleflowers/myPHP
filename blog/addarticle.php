<?php 
	require '../init.inc.php';
	$smarty->setTemplateDir(TPL_PATH.'/myhome/');
	$smarty->assign("action","action.php");


	$smarty->display("addarticle.tpl");

 ?>