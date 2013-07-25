<?php
	/**
	*
	* @author Ding_Mr_Ding
	*
	*
	*/
	class Articleb {
		private $sql;
		// private $id,$title,$author,$content,$addtime;
		// private $modtime,$addmember,$modmember,$wherefrom,$keyword;
		// 文章数组
		private $articles;
		private $limit;

		function __construct($geshu){
			$this->limit="LIMIT 0,".$geshu;
			// $this->limit="LIMIT 0,5";
			// echo $this->output();
		}

		function artTitle (){
			return "文章的1234567今天快七月了model类";
		}

		function cutStr(){

		}
    
/*
 * 字符串截取函数，只适用于英文
		private function textLimit($string, $length, $replacer = '...'){ 
		  	if(strlen($string) > $length) 
		  	return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer; 
		  
		  	return $string; 
		} 

*/
 		public function output(){
			$sql=new dataclass("localhost","study","123456","study");

			$sql="select * from article ORDER BY id ".$this->limit;
			$result=mysql_query($sql);

			if($result && mysql_num_rows($result)>0){
				$i=0;

				while(list($id,$title,$author,$wherefrom,$keyword,$sort,$content,
					$addtime,$modtime,$addmember,$modmember)
					  = mysql_fetch_row($result)){
					$this->articles[$i]=array("id"=>$id,
											  "title"=>$title,
											  "author"=>$author,
											  "content"=>$content,
											  "main"=>mb_substr($content,0,120,"utf-8"), // 中英混合不太准确
											  "addtime"=>mb_substr($addtime,2,14,"utf-8"),
											  "modtime"=>$modtime,
											  "addmember"=>$addmember,
											  "modmember"=>$modmember,
											  "wherefrom"=>$wherefrom,
											  "keyword"=>explode(" ",$keyword),
											  "sort"=>$sort);
					$i++;
				}
			}
			return $this->articles;
		}
	}
?>