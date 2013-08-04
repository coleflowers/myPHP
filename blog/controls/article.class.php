<?php
	/**
	* file:article 文章列表
	* @param 
	* @author  
	*/
	class Article {
		var $title;
		var $pdc;
		private $geshu;
		private $momdel;
		public $articles;


		function __construct($geshu){
			$this->geshu=$geshu;
			$this->model= new articleb($this->geshu);
			$this->articles = $this->model->output();
			// echo var_dump($this->articles);
		}

		public function outArticle(){
			$smarty = new Smarty();
		    $smarty ->setCompileDir(ROOT.'templates_c/')	//设置所有编译过的模板文件存放的目录
		            ->setPluginsDir(ROOT.'plugins/')		//设置为模板扩充插件存放的目录
		            ->setCacheDir(ROOT.'cache/')			//设置缓存文件存放的目录
		            ->setConfigDir(ROOT.'configs');			//设置模板配置文件存放的目录

			$smarty->setTemplateDir(TPL_PATH);
			$smarty->left_delimiter = '<{';
			$smarty->right_delimiter = '}>';

			$smarty->assign("ddd",$this->articles);
			$smarty->display("index/index.tpl");

		}
	}


?>