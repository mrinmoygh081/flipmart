<?php
session_start();
ob_start();
require_once "include/db.php";
?>
<div class="signup-form">
    <form action="post/register.php" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="code" placeholder="Code" required="required"></div>
				
			</div>        	
        </div>
       
		<div class="form-group">
            <button type="submit" name = "btn_verify" class="btn btn-primary btn-lg">Verify</button>
        </div>
    </form>
	
</div>