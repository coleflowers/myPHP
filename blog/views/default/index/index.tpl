<html>
	<head>
		<title>博客主页</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../blog/views/default/resource/css/index.css">
		<script type="text/javascript"></script>
	</head>
	<body>
		<div id="content">
<{include "public/header.tpl" }>
			<div id="left">
				<div id="logo">

					<div id="logoimg">
						<img src="data:image/png;base64,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" />
					</div>

					<div id="logoword">
						<h1>某某某的博客</h1>
						<p>　　这是一个落魄的人，这是一些落魄的文字</p>
					</div>
				</div>
				<div id="col">
					<div id="search">
						<input type="text" />
						<input type="button" name="" value="搜索文章" />
					</div>
					<!--左边栏目-->
					<div id="atlist">
						<span class="title"><b>文章里表</b></span>
						<li>技术文章</li>
						<li>生活娱乐</li>
						<li>经典文章</li>
						<li>美食指南</li>
					</div>
					<div id="atlist">
						<span class="title"><b>文章里表</b></span>
						<li>技术文章</li>
						<li>生活娱乐</li>
						<li>经典文章</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
<<<<<<< HEAD
=======
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
						<li>美食指南</li>
>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b
					</div>
					<div id="atlist">
						<span class="title"><b>文章里表</b></span>
						<li>技术文章</li>
						<li>生活娱乐</li>
						<li>经典文章</li>
						<li>美食指南</li>
					</div>
					<div id="atlist">
						<span class="title"><b>文章里表</b></span>
						<li>技术文章</li>
						<li>生活娱乐</li>
						<li>经典文章</li>
						<li>美食指南</li>
					</div>
					<div></div>
				</div>
			</div>
			<div id="right">
				<div id="public">123456789000000000000000000000000000000</div>
				<!--文章一-->
<{include file="index/article.tpl" }>
<<<<<<< HEAD
=======
				<!--测试文章-->
<!-- 				<div class="article" id="article1">
					<h3>文章22222222222222222222222222222222222222222222</h3>
					<div class="abouta">
						作者：马六 | 时间：2013-06-12 | 来源：原创 | 分类：娱乐生活
					</div>
					<div class="main">
						<p>
							<span class="fword">这</span>是文章一的内容，最是那一低头的温柔，像水莲花不胜凉风的娇羞；这是文章一的内容，最是那一低头的温柔，像水莲花不胜凉风的娇羞；这是文章一的内容，最是那一低头的温柔，像水莲花不胜凉风的娇羞；这是文章一的内容，最是那一低头的温柔，像水莲花不胜凉风的娇羞；这是文章一的内容，最是那一低头的温柔，像水莲花不胜凉风的娇羞；这是文章一的内容，最是那一低头的温柔……
						</p>
					</div>
					<div class="aboutb">
						关键词：文学；梦想；理想；人生；
						<span class="more"><b>查看全文</b></span>
					</div>
				</div> -->
>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b

			</div>
<{include file="public/footer.tpl" }>
		</div>
		<!--背景填充-->
		<div id="bg1"><span></span></div>
		<div id="bg2"><span></span></div>

		<div id="empty"></div>
	</body>
</html>