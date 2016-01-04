<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Book Profile</title>
		<?php
		    $this->load->view('partials/meta.php');
		?>
		<link href="/assets/stylesheets/css/book_profile.css" rel="stylesheet"/>
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
		          	<a class="navbar-brand navbar-right" href="/">Home</a>
		        </div><!--/.navbar-collapse -->
		    </div>
	    </nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h2><?=$book_info['title']?></h2>
					<p>Author: <?=$book_info['name']?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-12 white-box">
					<h3 class="black">Reviews:</h3>
<?php 					foreach ($book_reviews as $review) 
						{
?>							<hr>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="block-text">
										<div><h3 class="inline">My rating:</h3> 
											<span class="rating-input">
<?php 										for($i = 0; $i < $review['rating']; $i++)
											{
?>												<span data-value="<?= $i ?>" class="glyphicon glyphicon-star"></span>
<?php 										}
?>							 				</span>
										</div>
										<h4><a id="user" href="/users/user_profile/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a> says: </h4><h4 class="italicize"><?= $review['review'] ?></h4>
										<p class="italicize">- Posted on <?= $review['created_at'] ?></p>
									</div>
								</div>
							</div>
<?php 						if($review['user_id'] == $this->session->userdata['user_id'])
							{
?>								<h4 id="delete"><a href="/reviews/delete_review/<?= $review['review_id'] ?>/<?= $book_info['book_id'] ?>" onclick="return confirm('Are you sure you want to delete?')">Delete Review</a></h4>
<?php							}
						}
?>
				</div>
				<div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-12 white-box">
					<form id="add_review_to_book" action="/reviews/add_review_to_book" method="post">
						<label>Add a Review:</label>
						<div class="form-group row">
					    	<label for="inputReview" class="col-sm-2 form-control-label">Review:</label>
					    	<div class="col-sm-10">
					    		<textarea class="form-control" name="review"></textarea>
					    	</div>
					    </div>
					    <div class="form-group row">
					    	<label for="inputRating" class="col-sm-2 form-control-label col-xs-2">Rating:</label>
					    	<div class="col-sm-3 col-xs-3">
							    <select name="rating" class="form-control">
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
								    <option value="5">5</option>
								</select>
							</div>
							<p class="black">stars.</p>
						</div>
						<div class="form-group row">
						    <div class="col-sm-offset-6 col-sm-2 col-xs-offset-6 col-xs-2">
						    	<input type="hidden" name="book_id" value="<?= $book_info['book_id'] ?>"/>
						        <button type="submit" class="btn btn-secondary">Submit Review</button>
					    	</div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>