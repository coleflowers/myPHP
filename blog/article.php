<?php
	require '../framework.php';
	$sql=new dataclass("localhost","study","123456","study");

	// 时间
	$today = getdate();
	$time=$today["year"].'-'.$today["mon"].'-'.$today["mday"].' ';
	$time.=$today["hours"].':'.$today["minutes"].':'.$today["seconds"];

<<<<<<< HEAD
	$sql="select * from article where id={$_GET['id']}";
	$result=mysql_query($sql);


if($result && mysql_num_rows($result)>0){
	$i=0;
=======
	$sql="select * from article ORDER BY id";
	$result=mysql_query($sql);
	// echo '<pre><br />';
	// print_r(mysql_fetch_row($result));
	// echo '</pre><br />';

if($result && mysql_num_rows($result)>0){
	$i=0;
	// $cesssdsc=mysql_fetch_row($result);
	// while(list($key,$value)=each($cesssdsc)){
	// 	echo '$key:'.$key.';$value:'.$value.'<br />';
	// }
>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b

	while(list($id,$title,$author,$content,$addtime,$modtime,$addmember,$modmember,$wherefrom,$keyword)=mysql_fetch_row($result)){
		echo $title.'<br />'.$author.'<br />'.$content.'<br />'.$addtime
			 .'<br />'.$modtime.'<br />'.$addmember.'<br />'.$modmember
			 .'<br />'.$wherefrom.'<br />'.$keyword;
	}
}

<<<<<<< HEAD
=======

// $sqq='alter table article change wherefrom wherefrom VARCHAR(50) DEFAULT "原创"';
// $result=mysql_query($sqq);
// echo mysql_error();
/*
 * 修改wherefrom字段的默认值；
 */
// $title,$author,$content,$addtime,$modtime,$addmember,$modmember,$wherefrom,$keyword
	/**
	* addtime modtime :
	* YY-MM-DD hh:mm:ss
	*/
	// $sqla='insert into article(title,author,content,addtime,modtime,addmember,modmember,keyword)
	// 	values("原创的文章原创",
	// 		   "曹操",
	// 		   "这里是曹操的诗",
	// 		   "'.$time.'","'.$time.'","添加者","修改者","诗词-历史-人物")';

	// $result=mysql_query($sqla);
	

	// // echo var_dump($total);
	// if($result && mysql_affected_rows()>0){
	// 	echo "插入一条记录"."<br />";
	// }else{
	// 	echo "数据插入失败";
	// }


>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b
 ?>