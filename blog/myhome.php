<?php 
	require '../init.inc.php';
	//设置模板的存放位置
	$smarty->setTemplateDir(TPL_PATH);
	$smarty->display("myhome/index.tpl");
?>