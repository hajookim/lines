<!-- <footer class="footer">
	<div class="container">
		<p>&copy; My Website 2016</p>
	</div>
	
</footer> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="loginModalTitle">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="alert alert-danger" id="loginAlert"></div>
	        <form>
	        	<input type="hidden" id="loginActive" name="loginActive" value="1">
				<fieldset class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Email address">
				</fieldset>
				<fieldset class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</fieldset>
				<fieldset class="form-group" id="usernameForm" style="display:none">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" placeholder="username">
				</fieldset>
			</form>
	      </div>
	      <div class="modal-footer">
	      	<a id="toggleLogin" href="#">Sign up</a>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script>
		$("#toggleLogin").click(function() {
			if ($("#loginActive").val() == "1") {
				$("#loginActive").val("0");
				$("#loginModalTitle").html("Sign Up");
				$("#loginSignupButton").html("Sign Up");
				$("#toggleLogin").html("Login"); 
				$("#usernameForm").show(); 
			} else {
				$("#loginActive").val("1");
				$("#loginModalTitle").html("Login");
				$("#loginSignupButton").html("Login");
				$("#toggleLogin").html("Sign Up"); 
				$("#usernameForm").hide(); 

			}
		});
		$("#loginSignupButton").click(function() {
			$.ajax({
				type: "POST",
				url: "actions.php?action=loginSignup", 
				data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&username=" + $("#username").val() + "&loginActive=" + $("#loginActive").val(),
				success: function(result) {
					if (result == "1") {
						window.location.assign("http://jadekim-com.stackstaging.com/");
					} else {
						//alert("what"); 
						$("#loginAlert").html(result).show(); 
					}
				}
			})
		});
		$(".toggleFollow").click(function() {
			var id = $(this).attr("data-userId");
			$.ajax({
				type: "POST",
				url: "actions.php?action=toggleFollow", 
				data: "userId=" + $(this).attr("data-userId"),
				success: function(result) {
					if (result == "1") {
						//unfollowed
						$("a[data-userId='" + id + "']").html("Follow"); 

					} else {
						$("a[data-userId='" + id + "']").html("Unfollow");
					}
				}
			})
		});
		$("#postTweetButton").click(function() {
			$.ajax({
				type: "POST",
				url: "actions.php?action=postTweet", 
				data: "tweetContent=" + $("#tweetContent").val() + "&postAnonymous=" + $("#postAno").prop('checked'), 
				success: function(result) {
					if (result == "1") {
						$("#tweetSuccess").show();
						$("#tweetFail").hide(); 
						$("#tweetContent").val(''); 
						window.location.assign("http://jadekim-com.stackstaging.com/");
					} else if (result != "") {
						$("#tweetFail").html("There was an error posting your line - please try again").show(); 
						$("#tweetSuccess").hide(); 
					}
				}
			})
		});
		$(".deleteTweet").click(function() {
			var id = $(this).attr("data-tweetId");
			$.ajax({
				type: "POST",
				url: "actions.php?action=deleteTweet", 
				data: "tweetId=" + $(this).attr("data-tweetId"),
				success: function(result) {
					$("div[data-tweetId='" + id + "']").hide(); 
				}
			})
		});
	</script>
  </body>
</html>