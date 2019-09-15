<?
print <<< ENDBAR
<div id="container">
ENDBAR;
if (!$username){
	echo '<div id="topnav" class="topnav"> <a href="register.php">Register</a> <a href="login" class="signin"><span>Sign in</span></a></div>';
} else{
	print <<< ENDBAR
	<div id="topnav" class="topnav">
		Hello $username | <a href="logout.php">logout</a>
	</div>
ENDBAR;
}
print <<< ENDBAR
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
					$("fieldset#signin_menu").mouseup(function() {
						return false
					});
					$(document).mouseup(function(e) {
						if($(e.target).parent("a.signin").length==0) {
							$(".signin").removeClass("menu-open");
							$("fieldset#signin_menu").hide();
						}
					});			
        });
</script>
ENDBAR;
?>