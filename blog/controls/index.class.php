<?php 
	class Index {
		public $key;

		function __construct($x){
			$this->key=$x;
		}
	}

	// 顶部
	function top(){
		D("Top");
	}

	// 文章
	function article(){
		D("Article");
	}

	// 底部
	function bottom(){
		D("Bottom");
	}
 ?>