<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加文章</title>
	<style>
		.left {
			float: left;
		}
		.rigth {
			float: right;
		}
	</style>
</head>
<body>
	<div id="d"><h1>请填写文章信息</h1></div>
	<div id="form">
		<form action="<{$action}>" method="post" >
			<!-- 标题 -->
			<div class="left">标&nbsp;&nbsp;题：</div>
			<div class="right">
				<input type="text" name="title" id="title" size="90">
			</div>
			<!-- 内容 -->
			<div class="left">内&nbsp;&nbsp;容：</div>
			<div class="right">
				<textarea name="content" id="content" cols="80" rows="20"></textarea>
			</div>
			<!-- 关键词及分类 -->
			<div class="left">关键词：</div>
			<div class="right">
				<input type="text" name="keyword" id="keyword">
				<div id="" class="">
					<div class="left">分&nbsp;&nbsp;类：</div>
					<select name="sort" size="1">
						<option value="sort" selected="selected">没有分类</option>
						<option >闲情逸致</option>
						<option >娱乐生活</option>
						<option >心灵鸡汤</option>
						<option >添加分类</option>
					</select>
				</div>
			</div>
			<!-- z作者信息以及来源 -->
			<div class="left">作&nbsp;&nbsp;者：</div>
			<div class="right">
				<input type="text" name="author" placeholder="">
				<input type="text" name="wherefrom" placeholder="">
				<span>*来自哪里，默认原创</span>
			</div>
			<div class="left" style="width:100px"> </div>
			<div class="right">
				<input type="submit" value="提交">
				<input type="reset" name="reset" value="重写" placeholder="">
			</div>
		</form>
	</div>
</body>
</html>