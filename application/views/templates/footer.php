
						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; Untitled. Crafted: <a href="http://designscrazed.org/">HTML5</a>.</p>
							</section>

					</section>

			</div>
			
		<!-- Scripts -->
			<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/skel.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo base_url();?>assets/js/main.js"></script>
			<script src="<?php echo base_url();?>assets/js/jquery.leanModal.min.js"></script>
			<!-- <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script> -->
			<!-- <script src="<?php echo base_url();?>assets/js/leanModal-modified-for-onload.js"></script> -->
			<script src="<?php echo base_url();?>assets/js/jBox.js"></script>
			<script src="<?php echo base_url();?>assets/js/jBox.min.js"></script>
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
			
			<script type="text/javascript">

						$("#modal_trigger").leanModal({top : 100, overlay : 0.6, closeButton: ".modal_close" });

						$(function(){
						// Calling Login Form
						$("#login_form").click(function(){
						$(".social_login").hide();
						$(".user_login").show();
						return false;
						});

						// Calling Register Form
						$("#register_form").click(function(){
						$(".social_login").hide();
						$(".user_register").show();
						$(".header_title").text('Register');
						return false;
						});

							// Going back to Social Forms
						$(".back_btn").click(function(){
						$(".user_login").hide();
						$(".user_register").hide();
						$(".social_login").show();
						$(".header_title").text('Login');
						return false;
						});

						})
			</script>
					
			<script>
						$(document).ready(function(){
						$("#submit").click(function(){
						var name = $('#demo-name').val();
						var email = $('#demo-email').val();
						var text = $('#demo-message').val();
						var robot = $('#demo-human').checked;
						var message = new jBox('Modal', {
					    attach: $('#submit'),
					    title: 'Message',
					    content: 'You have successfully added a comment'
						});
						if(text == '' && !robot ){
							$('#result_show').append("Invalid request: Robot must be checked, text field, name filed and email field can't be empty");
							return false;
						}
						$.ajax({
						type:"POST",
						url: "<?php echo base_url();?>"+ "Post/addComment",
						data:$("#myForm").serialize(),
						success: function (dataCheck) {
						//alert(dataCheck);
						message.open();
						$('#newCom').append(dataCheck);
						$("#myForm")[0].reset();

						//$('#result_show').append("You have successfully added a comment");
						//window.location.reload();},
						}
						});
						});
						});
			</script>

			<script>
						$(document).ready(function(){	
						$("#btnReset").click(function(){
						$( "#result_show" ).empty();
						});
						});
						</script>
						<script>
						$(document).ready(function(){
						$("#stars").click(function(event){
							event.preventDefault();
							var idPost = $('#tbIdPost').val();
							var message = new jBox('Modal', {
						    attach: $('#stars'),
						    title: 'Message',
						    content: 'You have successfully voted'
						});
						$.ajax({
						type:"POST",
						url: "<?php echo base_url();?>"+ "Post/rateStars",
						data:$("#myForm").serialize(),
						success: function (dataCheck) {
						//alert(dataCheck);
						message.open();
						$("#stars").empty();
						$('#stars').append(dataCheck);
						//$('#result').show();
						//$('#result').append("You have successfully voted");
						//setTimeout(function() {
						 // $("#result").fadeOut().empty();
						//}, 3000);
						//window.location.reload();},
						}
						});
						});
						});
			</script>
<!-- <script>
$(document).ready(function(){
$("#register").click(function(event){
	event.preventDefault();
	var message = new jBox('Modal', {
    attach: $('#register'),
    title: 'Message',
    content: 'You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!'
});
	
$.ajax({
type:"POST",
url: "<?php echo base_url();?>"+ "Login/register",
data:$("#RegisterForm").serialize(),
success: function (dataCheck) {
//alert(dataCheck);
message.open();
$("#RegisterForm").empty();

//$('#result_show').append("You have successfully added a comment");
//window.location.reload();},
}
});
});
});
</script> -->
				<script>
					$(document).ready(function(){
						var message = new jBox('Modal', {
				   			title: 'Message',
				    		content: $('.ispis')
						});

						if ($(".ispis").text().length > 1) {
							message.open();
						}
					});
				</script>
				<script>
					$(document).ready(function(){
						var message = new jBox('Modal', {
				   			title: 'Message',
				    		content: 'You logout from site!'
						});
					$("#logout").click(function(event){
					event.preventDefault();
					message.open();
					});
					});
				</script>