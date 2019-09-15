<?
print <<< ENDBAR
<div id="container">
ENDBAR;
if (!$username){
	echo '<div id="topnav" class="topnav"> <a href="register" class="register"><span>Register</span></a> <a href="login" class="signin"><span>Sign in</span></a></div>';
} else{
	print <<< ENDBAR
	<div id="topnav" class="topnav">
		Hello $username | <a href="logout.php">logout</a>
	</div>
ENDBAR;
}
print <<< ENDBAR
	<fieldset id="register_menu">
		<form id="register" action="register.php" method="POST">
			<p><label for="firstname">First Name: </label><input type="text" name="firstname"/>
			<p><label for="lastname">Last Name: </label><input type="text" name="lastname"/>
			<p><label for="email">Email: </label><input type="text" name="email"/>
			<p><label for="password">Password: </label><input type="password" name="password" onchange="verifyPW()"/>
			<p><label for="confirmpassword">Confirm Password: </label><input type="password" name="confirmpassword" onchange="verifyPW()">
			<p><label for="icon">Image/Avatar:</label><input type="file" name="icon" id="icon" />
			<p align="center">What type of user are you?
			<p align="center"><input type="radio" name="usertype"/ value="standard" checked onclick="setUserType('sta')"><label for="standardUser">Standard </label>
				 <input type="radio" name="usertype"/ value="pro" onclick="setUserType('pro')"><label for="proUser">Professional </label>
			<!--<p><label for="alternateemail">Alternate Email: </label><input type="text" name="alternateemail" id="ae" disabled/>-->
			<p><label for="affiliation">Affiliation: </label><input type="text" name="affiliation" id="af"/>
			<p><input type="button" name="register" value="register" onClick="validateInput()"/>
			<p id="warning"></p>
		</form>
	</fieldset>
  <fieldset id="signin_menu">
    <form id="signin" action="login.php" method="POST">
			<p><label for="email">Email: </label><input type="text" name="email" id="email" title="email"/>
			<p><label for="password">Password: </label><input type="password" name="password" id="password" title="password"/>
			<input type="hidden" name="referrer" value="index.php"/>
			<p><input type="submit" value="submit"\>
    </form>
  </fieldset>
</div>
<script type="text/javascript">
        $(document).ready(function() {
          $(".signin").click(function(e) {          
						e.preventDefault();
            $("fieldset#signin_menu").toggle();
						$(".signin").toggleClass("menu-open");
          });
					$(".register").click(function(e) {
						e.preventDefault();
						$("fieldset#register_menu").toggle();
						$(".register").toggleClass("menu-open");
					});
					$("fieldset#signin_menu").mouseup(function() {
						return false
					});
					$("fieldset#register_menu").mouseup(function() {
						return false
					});
					$(document).mouseup(function(e) {
						if($(e.target).parent("a.signin").length==0) {
							$(".signin").removeClass("menu-open");
							$("fieldset#signin_menu").hide();
						} 
						if($(e.target).parent("a.register").length==0) {
							$(".register").removeClass("menu-open");
							$("fieldset#register_menu").hide();
						}
					});			
        });
				
				var passwordsMatch;
	
		function validateInput(){
			verifyPW();
			if (passwordsMatch == false) {
			} else {
					document.forms["register"].submit();
			}
		}
		
		function verifyPW(){
			if (document.forms["register"]["password"].value == document.forms["register"]["confirmpassword"].value){
				passwordsMatch = true;
				document.getElementById("warning").innerHTML = "";
			} else {
				passwordsMatch = false;
				document.getElementById("warning").innerHTML = "Passwords don't match";
			}
		}
</script>
ENDBAR;
?>