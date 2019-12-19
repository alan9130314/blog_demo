<?php include('header.php') ?>
<?php include('data.php') ?>
<?php include('template.php') ?>

<div id="blog">
	<div id="nav" class="shadow-sm">

			<div class="nav-items d-flex justify-content-around">
				<div class="category"><a href="Tech.php">3C科技</a></div>
				<div class="category">娛樂遊戲</div>
				<div class="category">美食旅遊</div>
				<div class="category">時尚美妝</div>
				<div class="category">親子育兒</div>
				<div class="category">生活休閒</div>

				<div class="nav-item_write">
				新增文章
				</div>
			</div>
			

	</div>

	<div id="posts">
		<div class="posts container">
			<div class="breadcrumb">
				blog / 
			</div>
			<div class="board-title">
				<h1>Lastest Posts</h1>
			</div>
			<div class="board">
				


			</div>
		</div>
	</div>
</div>


<div id="post-panel" class="update">

	<div class="post-panel-header">
		<div class="close">x</div>
	</div>		
	<div class="post-panel-body">
		<form>
			<input type="hidden" name="id">
			<label>categories</label><br>
			<select class="dropdown-categories" name="category_id">

			　<option data-category-id="" value="1">3C科技</option>
			　<option data-category-id="" value="2">娛樂遊戲</option>
			　<option data-category-id="" value="3">美食旅遊</option>
			　<option data-category-id="" value="4">時尚美妝</option>
			　<option data-category-id="" value="5">親子育兒</option>
			　<option data-category-id="" value="6">生活休閒</option>
			　<option data-category-id="" value="7">金融理財</option>
			</select><br>
			
			<label>title</label><br>
			<input  class="title" type="text" name="title"><br>
	
			<label>content</label>			
			<textarea name="content"></textarea>			
			
		</form>
	</div>
	<div class="post-panel-footer">
		<div class="panel-buttons clearfix">
			<button class="create">post</button>
			<button class="update">update</button>
			<button class="cancel">cancel</button>
			<button class="delete">delete</button>		
		</div>
	</div>
</div>


<?php include('footer.php') ?>