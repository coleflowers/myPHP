<?php
	
	date_default_timezone_set("PRC"); // 设置时区（中国）
	define("FRAMEWORK", str_replace("\\", "/", dirname(__FILE__)).'/');     //框架的路径
	define("APP",str_replace("\\", "/", dirname(__FILE__)).'/blog/');
	define("PROJECT_PATH", str_replace("\\","/",dirname(FRAMEWORK).'/')); 
	// 项目的根路径，也就是框架所在的目录

	define("TMPPATH","candelete/");
	define("HOST", "localhost");			  //数据库主机
	define("USER", "study");                  //数据库用户名
	define("PASS", "123456");                 //数据库密码
	define("DBNAME", "study");			      //数据库名
	define("TABPREFIX", "bro_");              //数据表前缀

	//设置包含目录（类所在的全部目录）,  PATH_SEPARATOR 分隔符号 Linux(:) Windows(;)
	$include_path=get_include_path();                       //原基目录
	$include_path.=PATH_SEPARATOR.FRAMEWORK."bases/";       //框架中基类所在的目录
	$include_path.=PATH_SEPARATOR.FRAMEWORK."classes/" ;    //框架中扩展类的目录
	$include_path.=PATH_SEPARATOR.FRAMEWORK."libs/" ;       //模板Smarty所在的目录
	$include_path.=PATH_SEPARATOR.FRAMEWORK."libs/sysplugins/";
	$include_path.=PATH_SEPARATOR.FRAMEWORK."classes/";    //项目中用的到的工具类
	$include_path.=PATH_SEPARATOR.APP."controls/";         //项目中的类
	$include_path.=PATH_SEPARATOR.APP."models/";          //项目中的类
	$include_path.=PATH_SEPARATOR.APP."views/";           //项目中的类
	
	//设置include包含文件所在的所有目录	
	set_include_path($include_path);


	//包含框架中的函数库文件
	include FRAMEWORK.'commons/func.inc.php';
	
	/**
	* 实现类的自动加载
	* @param  $className string 类名称
	* @return void
	*/
	function __autoload($className){

		if($className == "memcache"){
			// 系统的Memcache类不包含
			return;
		} else if ($className == "Smarty"){
			// Smarty模板引擎类直接包含
			include 'Smarty.class.php';
		} else if (file_exists(FRAMEWORK.'libs/sysplugins/'.strtolower($className).'.php')){
			// Smarty模板引擎内部类直接包含
			include strtolower($className).'.php';
		} else {
			// 基础类从特定目录包含
			include strtolower($className).'.class.php';
		}
	}

?>