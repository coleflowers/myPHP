<?php
	require '../framework.php';
	$sql=new dataclass("localhost","study","123456","study");

	// 时间
	$today = getdate();
	$time=$today["year"].'-'.$today["mon"].'-'.$today["mday"].' ';
	$time.=$today["hours"].':'.$today["minutes"].':'.$today["seconds"];

	$sql="select * from article where id={$_GET['id']}";
	$result=mysql_query($sql);


if($result && mysql_num_rows($result)>0){
	$i=0;

	while(list($id,$title,$author,$content,$addtime,$modtime,$addmember,$modmember,$wherefrom,$keyword)=mysql_fetch_row($result)){
		echo $title.'<br />'.$author.'<br />'.$content.'<br />'.$addtime
			 .'<br />'.$modtime.'<br />'.$addmember.'<br />'.$modmember
			 .'<br />'.$wherefrom.'<br />'.$keyword;
	}
}

 ?>