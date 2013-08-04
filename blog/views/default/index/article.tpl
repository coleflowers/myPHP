				<{foreach $ddd as $article}>
				<div class="article" id="article1">
<<<<<<< HEAD
					<a target="_blank" href='./article.php?id=<{$article["id"]}>'><h3><{$article["title"]}></h3></a>
=======
					<h3><{$article["title"]}></h3>
>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b
					<div class="abouta">
						作者：<a target="_blank" href="#"><{$article["author"]}></a> | 
						时间：<{$article["addtime"]}> | 
						来源：<a target="_blank" href="#"><{$article["wherefrom"]}></a> | 
						分类：<a target="_blank" href="#"><{$article["sort"]}></a>
					</div>
					<div class="main">
						<p>
							<span class="fword">这</span><{$article["main"]}>……
							<!-- 控制字数 -->
						</p>
					</div>
					<div class="aboutb">
						<div class="keyword">
							<span>关键词：</span>
							<{foreach $article["keyword"] as $value}>
								<a target="_blank" href="#"><{$value}></a>
							<{/foreach}>
							<!-- 考虑关键词长度及总长度 -->
						</div>
						<div class="mored">
<<<<<<< HEAD
							<span class="more"><b><a target="_blank" href="./article.php?id=<{$article["id"]}>">查看全文</a></b></span>
=======
							<span class="more"><b><a target="_blank" href="#">查看全文</a></b></span>
>>>>>>> 9f11cafa3122f0eee8eb38002549ce78a5c4b07b
						</div>
					</div>
				</div>
				<{/foreach}>
				<div id="count">
					<span>本页总共有#0篇文章</span>
					<span>去下一页</span>
					<span>哎悲剧</span>
				</div>