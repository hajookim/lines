 <div class="container mainContainer">

 <div class="row">
 	<div class="col-md-8">
 		<h2>Your tweets</h2>
 		<?php if ($_SESSION['id']) displayTweets('yourtweets'); 
 			  else {
 			  	echo "Login first to see your tweets!"; 
 			  }

 		?>
 	</div>
  	<div class="col-md-4">
  		<?php displaySearch(); ?>
  		<hr>
  		<?php displayTweetBox(); ?>
  	</div>
</div>
</div>