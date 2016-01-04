<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>User Reviews</title>
		<?php
		    $this->load->view('partials/meta.php');
		?>
		<link href="/assets/stylesheets/css/user_reviews.css" rel="stylesheet"/>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      	<div class="container">
		        <div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          	<a class="navbar-brand navbar-right" href="/users/logout">Logout</a>
		          	<a class="navbar-brand navbar-right" href="/authors/add">Add Book and Review</a>
		          	<a class="navbar-brand navbar-right" href="/">Home</a>
		        </div><!--/.navbar-collapse -->
		    </div>
	    </nav>
		<div class="container white-box">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div id="user_info">
						<h2>User Alias: <?=$user_info['first_name']?></h2>
						<h4>Name: <?=$user_info['first_name']?> <?=$user_info['last_name']?></h4>
						<h4>Email: <?=$user_info['email']?></h4>
						<h4>Total Reviews: <?=$user_info['review_count']?></h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					<div id="user_book_reviews">
					<h3>Posted Reviews on the following books:</h3>
<?php 				foreach ($book_list as $book) {
?>						<p><a href="/books/book_profile/<?=$book['book_id']?>"><?=$book['title']?></a></p>
<?php					}
?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>