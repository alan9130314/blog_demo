<?php include('header.php') ?>
<?php include('data.php') ?>
<?php include('template.php') ?>

<div id="blog">
	<div id="nav" class="shadow-sm">

			<div class="nav-items d-flex justify-content-around">
				<div class="index">BLOG</div>
				<div class="category" data-category_id="1">3CTech</div>
				<div class="category" data-category_id="2">Gaming</div>
				<div class="category" data-category_id="3">Foods</div>
				<div class="category" data-category_id="4">Fashion</div>
				<div class="category" data-category_id="5">Family</div>
				<div class="category" data-category_id="6">Life</div>
				<div class="category" data-category_id="7">Financial</div>

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

			　<option data-category-id="1" value="1">3C Tech</option>
			　<option data-category-id="2" value="2">Gaming</option>
			　<option data-category-id="3" value="3">Foods</option>
			　<option data-category-id="4" value="4">Fashion</option>
			　<option data-category-id="5" value="5">Family</option>
			　<option data-category-id="6" value="6">Life</option>
			　<option data-category-id="7" value="7">Financial</option>
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