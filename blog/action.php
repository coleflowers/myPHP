<?php 

	require '../framework.php';
	$sql=new dataclass("localhost","study","123456","study");

	// 获得表单输入信息  echo var_dump($_POST);	
	header('content-type:text/html;charset:"utf-8"');

	// 时间
	$today = getdate();
	$time=$today["year"].'-'.$today["mon"].'-'.$today["mday"].' ';
	$time.=$today["hours"].':'.$today["minutes"].':'.$today["seconds"];

	$sql='insert into article(title,author,content,sort,wherefrom,addtime,modtime,addmember,modmember,keyword)
		  values("';
	$sql.=$_POST["title"].'","'.$_POST["author"].'","'.$_POST["content"].'","';
	$sql.=$_POST["sort"].'","'.$_POST["wherefrom"].'","';
	$sql.=$time.'","'.$time.'","张三","李四","'.$_POST["keyword"].'")';

	if(!empty($sql)){
		$result=mysql_query($sql);		
	}

	if($result && mysql_affected_rows()>0){
		// echo var_dump($sql);
		echo "如果你看到这个说明页面禁止了javascript<br >";
		echo "但保存文章成功";
		echo "<script>location.href='gowhere.php'</script>";


	} else {
		echo '######################################################<br />';
		echo "请联系网站管理员，可能出什么问题了，文章保存失败";
		echo error_log("4444444444444444444s");
		echo var_dump($sql);
	}


?>