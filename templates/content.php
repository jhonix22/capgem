<?php if(empty($_SESSION['user_id'])): ?>
    <div class="login-container">
        <div class="login-content">

            <form method="POST" action="?action=login" class="">
                <span class="frm-title">Login</span><br>
                <span class="text-danger"><?php echo (!empty($_SESSION['error'])) ? $_SESSION['error']: '';?></span>
                <div class="input-cnt">
                    <label>Username</label>
                    <input type="text" name="username" class="">
                </div>
                <div class="input-cnt">
                    <label>Password</label>
                    <input type="password" name="password" class="">
                    <input type="submit" class="submit-btn" value="Go">
                    <span class="signup">Don't have an account? Sign Up</span>
                </div>
            </form>

        </div>
    </div>
<?php endif; ?>
<div class="title">
	<h1>CAPGEM</h1>
</div>
<div class="col-md-12">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>