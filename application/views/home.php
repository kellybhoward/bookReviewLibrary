<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Books Home</title>
		<?php
		    $this->load->view('partials/meta.php');
		?>
		<link href="/assets/stylesheets/css/home.css" rel="stylesheet"/>
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
		          	<a class="navbar-brand" href="/users/user_profile/<?=$user_info['user_id']?>">Welcome <?=$user_info["first_name"]?></a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          	<a class="navbar-brand navbar-right" href="/users/logout">Logout</a>
		          	<a class="navbar-brand navbar-right" href="/authors/add">Add Book and Review</a>
		        </div><!--/.navbar-collapse -->
		    </div>
	    </nav>
		<div class="reviews-block">
		    <div class="container-fluid">
		    	<div class="row shade">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 col-xs-offset-1 col-xs-10 col-xs-offset-1">
								<h2>Most Recent Reviews</h2>
<?php 							foreach ($review_list as $review) {
?>									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="block-text rel zmin">
												<a title="" href="/books/book_profile/<?= $review['book_id'] ?>"><?= $review['title']?></a>
												<div class="mark">My rating: 
													<span class="rating-input">
<?php 												for($i = 0; $i < $review['rating']; $i++)
													{
?>														<span data-value="<?= $i ?>" class="glyphicon glyphicon-star"></span>
<?php 												}
?>							 						</span>
												</div>
												<p><a id="user" href="users/user_profile/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a> says: <?= $review['review'] ?></p>
												<p class="italics">Posted on <?= $review['created_at'] ?></p>
											</div>
										</div>
									</div>
<?php 					}?>
							</div>
							
			        
					        <div class="col-lg-offset-1 col-lg-4 col-lg-offset-1 col-md-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-offset-3 col-xs-6 col-xs-offset-3">
		            	    	<div class="row">
		            	    		<h2>Other Books</h2>
									<div class="col-md-12 col-sm-12 col-xs-12 list-group">
<?php 								
								foreach ($book_list as $book) 
								{?>
									<a href='/books/book_profile/<?= $book["book_id"] ?>' class="list-group-item"><?= $book['title'] ?></a>
<?php							}
?>									</div>
								</div>
					        </div>
				        </div>
			        </div>
				</div>
			</div>
	    </div>
	</body>
</html>