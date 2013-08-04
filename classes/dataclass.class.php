<?php 
	class dataClass {
		

		private $db; //私有属性 存储数据库资源

		private $query; //私有属性 查询资源

	    /**
	    * 构造函数 
	    * 构造一个类
	    * @param $host string 主机名称
	    * @param $user string 数据库用户名 
	    * @param $pass string 数据库用户密码
	    * @param $db   string 数据库名称
	    */
		function __construct ($host,$user,$pass,$db) { 
        	$this->db=mysql_pconnect($host,$user,$pass); 
        	mysql_select_db($db,$this->db); 
    	}

	    /** 
	    * 获取一个查询资源存储在属性中 
	    * @param $sql string 数据库请求 
	    * @return     void   空缺
	    */ 
	    function fetch($sql) { 
	        $this->query=mysql_unbuffered_query($sql,$this->db); // Perform query here 
	    }

	    /** 
	    * 返回请求的一行数据构成的数组 
	    * @return mixed  混合数据，array/bool
	    */ 
	    function getRow () { 
	        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) ) 
	            return $row; 
	        else 
	            return false; 
	    } 


	}
?>