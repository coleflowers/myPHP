<?php

/**
* 实例化同目录下models目录下的model类
* @param 
* @author
*
*/


function f($name){
			include APP.'models/'.$name.'.class.php';
			$xx= new $name();
			return $xx;
		}


#############################copy from ?################################
function model($className, $app){
	$driver="D".DRIVER; //父类名
	$path=PROJECT_PATH."runtime/models/".TMPPATH;
	if($app==""){
		$src=APP."models/".strtolower($className).".class.php";
		$psrc=APP."models/___.class.php";
		$className=ucfirst($className).'Model';
		$parentClass='___model';
		$to=$path.strtolower($className).".class.php";
		$pto=$path.$parentClass.".class.php";
		
	}else{
		$src=PROJECT_PATH.$app."/models/".strtolower($className).".class.php";
		$psrc=PROJECT_PATH.$app."/models/___.class.php";
		$className=ucfirst($app).ucfirst($className).'Model';
		$parentClass=ucfirst($app).'___model';
		$to=$path.strtolower($className).".class.php";
		$pto=$path.$parentClass.".class.php";
	}

	
	//如果有原model存在
	if(file_exists($src)) {	
		$classContent=file_get_contents($src);
		$super='/extends\s+(.+?)\s*{/i'; 
		//如果已经有父类
		if(preg_match($super,$classContent, $arr)) {
			$psrc=str_replace("___", strtolower($arr[1]), $psrc);
			$pto=str_replace("___", strtolower($arr[1]), $pto);
			
			if(file_exists($psrc)){
				if(!file_exists($pto) || filemtime($psrc) > filemtime($pto)){
					$pclassContent=file_get_contents($psrc);
					$pclassContent=preg_replace('/class\s+(.+?)\s*{/i','class '.$arr[1].'Model {',$pclassContent,1);
					// $pclassContent=preg_replace('/class\s+(.+?)\s*{/i','class '.$arr[1].'Model extends '.$driver.' {',$pclassContent,1);
		
					file_put_contents($pto, $pclassContent);
		
				}
		
			}else{
				echo '文件'.$psrc.'不存在';
				// Debug::addmsg("<font color='red'>文件{$psrc}不存在!</font>");
			} 
			$driver=$arr[1]."Model";
			include_once $pto;
		}
		if(!file_exists($to) || filemtime($src) > filemtime($to) ) {	
			$classContent=preg_replace('/class\s+(.+?)\s*{/i','class '.$className.' {',$classContent,1);
			// $classContent=preg_replace('/class\s+(.+?)\s*{/i','class '.$className.' extends '.$driver.' {',$classContent,1);
			//生成model
			file_put_contents($to,$classContent);
		}	
	}else{
		if(!file_exists($to)){
			$classContent="<?php\n\tclass {$className} {\n\t}";
			// $classContent="<?php\n\tclass {$className} extends {$driver}{\n\t}";
			//生成model
			file_put_contents($to,$classContent);	
		}	
	}

	include_once $to;
	return $className;
}


function D($className=null,$app=""){
	$db=null;	
	//如果没有传表名或类名，则直接创建DB对象，但不能对表进行操作
	if(is_null($className)){
		$class="D".DRIVER;

		$db=new $class;
	}else{
		$className=strtolower($className);
		$model=model($className, $app);	
		$model=new $model();

		//如果表结构不存在，则获取表结构
		$model->setTable($className);		


		$db=$model;
	}
	if($app=="")
		$db->path=APP;
	else
		$db->path=PROJECT_PATH.strtolower($app).'/';
	return $db;
}
?>