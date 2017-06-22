	<footer>
		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="widget-body">
							<p class="simplenav">
								<a href="http://www.xaexia.com" id="bottom-link" title="developers" target="_blank">Developers</a> |
								<a href="http://www.xaexia.com/contact-xaexia.php" id="bottom-link" target="_blank">Contact</a> |
								<a href="http://www.xaexia.com/contact-xaexia.php" id="bottom-link" target="_blank">FAQs</a> |
								<a href="http://www.xaexia.com/contact-xaexia.php" id="bottom-link" target="_blank">Help</a> |
								<b><a href="signup.php" id="bottom-link">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6">
						<div class="widget-body">
							<p>
								Copyright &copy; 2016 skoolynk All rights reserved. Developed by <a href="http://www.xaexia.com/" target="_blank" title="xaexia"><font color="#fff">XAEXIA</font></a>
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/activeLink.js"></script>
<script type="text/javascript">
$('document').ready(function(){
	$('#searchField').keyup(function(){
		var user_search = $('#searchField').val();
		if(user_search.length==0){
			$('#autoFill').hide();
		}else{
		$('#autoFill').show();
		$.ajax({ type: 'GET', url: 'searchIn.php', data:{result: user_search}, success: function(info){
				$('#autoFill').html("<ul class='nav'>"+info+"</ul>");
				$('#autoFill').addClass('animated fadeIn');
				$('#error_search').addClass('animated tada');
		}
		});
	}
	});

	$('#sendMessage').on('click',function(e){
		e.preventDefault();
		var sender = $('#senderName').val();
		var sendMessage = false;
		var email = $('#senderEmail').val();
		var message = $('#message').val();
		var emailReg  = /\S+@\S+\.\S+/;

        if($("#email").val()=="" || $("#senderEmail").val()=="" || $("#message").val()=="")
            {
              $("#error").html("<p class='animated bounceIn' style='color:red; font-weight:bold; padding:5px;'>All fields are required</p>"); 
            }
            else if(!emailReg.test($("#senderEmail").val())) 
            {
              $("#error").html("<p class='animated bounceIn' style='color:red; font-weight:bold; padding:5px;'>please check you email should be like email@example.com</p>");
            } else 
            {
              sendMessage = true; 
            }
            
        if(sendMessage)
        {
        	var formData = $('#sendMessageForm').serialize();
            $.ajax({url:"sendMessageToSchool.php", type:"post", data:formData, dataType:'text' ,success: function(info){
              if(info==1)
              {
                $('#error').html('Your message was successfully sent, a reply will be sent to your email');
              }
              else{
                $('#error').html('a problem occured while sending your message, please try again later ');
              }
            }});
        }	
	});

});
</script>
</body>
</html>