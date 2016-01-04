<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Add Book and Review</title>
		<?php
		    $this->load->view('partials/meta.php');
		?>
		<link href="/assets/stylesheets/css/add.css" rel="stylesheet"/>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 white-box">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h2>Add a New Book with Review</h2>
						</div>
					</div>
					<form id="add_book_and_review" action="/reviews/add_review" method="post">
					    <div class="form-group row">
						    <label for="inputTitle" class="col-sm-3 form-control-label">Book Title:</label>
						    <div class="col-sm-9">
						        <input type="text" name ="book_title" class="form-control" id="inputTitle"/>
						    </div>
					    </div>
					    <div class="form-group row">
					    	<label for="inputAuthor" class="col-sm-2 form-control-label">Author:</label>
					    	<div class="col-sm-10">
							    <select name="author_id" class="form-control">
<?php 								foreach ($author_list as $author) 
									{?>
										<option value="<?= $author['author_id'] ?>"><?= $author['name'] ?></option>
<?php								}
								
?>								</select>
								<?php
								    $this->load->view('partials/flash_messages.php');
								?>
							</div>
					    </div>
					    <div class="form-group row">
					    	<label for="inputCustomAuthor" class="col-sm-4 col-sm-offset-2 form-control-label">(Or add a new author)</label>
					    	<div class="col-sm-6">
							    <input type="text" name="custom_author_name" class="form-control" id="inputTitle"/>
							</div>
					    </div>
					    <div class="form-group row">
					    	<label for="inputReview" class="col-sm-2 form-control-label">Review:</label>
					    	<div class="col-sm-10">
					    		<textarea class="form-control" name="review"></textarea>
					    	</div>
					    </div>
					    <div class="form-group row">
					    	<label for="inputRating" class="col-sm-2 form-control-label col-xs-2">Rating:</label>
					    	<div class="col-sm-2 col-xs-3">
							    <select name="rating" class="form-control">
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
								    <option value="5">5</option>
								</select>
							</div>
							<p>stars.</p>
						</div>
					    <div class="form-group row">
						    <div class="col-sm-offset-6 col-sm-2 col-xs-offset-6 col-xs-2">
						        <button type="submit" class="btn btn-secondary">Add Book and Review</button>
					    	</div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>