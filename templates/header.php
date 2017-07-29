<!-- Sidebar -->
        <div id="sidebar-wrapper">
			<div class="logo">
				<a href="#">
					<img src="assets/img/logo.jpg"/>
				</a>
			</div>
            <ul class="sidebar-nav">
                <li>
                    <a href="<?php echo $url->site_url('');?>" class="<?= ($p == '') ? 'active':''; ?>">Home</a>
                </li>
                <li>
                     <?php
                        if(!empty($_SESSION['user_id'])):
                            ?>
                                <a href="<?php echo $url->site_url('?p=profile&user_id='.$_SESSION['user_id']);?>" class="<?= ($p == 'profile') ? 'active':''; ?>">Profile</a>
                            <?php
                        endif;
                    ?> 
                    
                </li>
                <?php
                    if(!empty($_SESSION['user_id']) && $_SESSION['access'] == "0"):
                ?>
                <li>
                    <a href="<?php echo $url->site_url('?p=members');?>" class="<?= ($p == 'members') ? 'active':''; ?>">Members</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('?p=employees');?>" class="<?= ($p == 'employees') ? 'active':''; ?>">Employees</a>
                </li>

                <?php
                    endif;

                    if (!empty($_SESSION['user_id'])):
                ?>
                <li>
                    <a href="<?php echo $url->site_url('?p=calendar');?>" class="<?= ($p == 'calendar') ? 'active':''; ?>">Calendar</a>
                </li>
                <?php
                    endif;

                    if(!empty($_SESSION['user_id']) && $_SESSION['access'] == '0'):
                 ?>
                <li>
                    <a href="<?php echo $url->site_url('?p=reports');?>" class="<?= ($p == 'reports') ? 'active':''; ?>">Reports</a>
                </li>
                <?php
                    endif;

                    if(empty($_SESSION['user_id'])):
                ?>
                <li>
                    <a href="<?php echo $url->site_url('?p=contacts');?>" class="<?= ($p == 'contacts') ? 'active':''; ?>">Contacts</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('?p=apply');?>" class="<?= ($p == 'apply') ? 'active':''; ?>">Apply Now</a>
                </li>
                <!--<li>
                    <a href="<?php echo $url->site_url('?p=register');?>" class="<?= ($p == 'register') ? 'active':''; ?>">Register Now</a>
                </li>-->
                <?php
                    endif;
                ?>
                <li>
                    <?php
                        if(!empty($_SESSION['user_id'])){
                            ?>
                                <a href="?action=logout" class="">Log Out</a>
                            <?php
                        }
                    ?> 
                </li>
            </ul>
			<div class="copyright">Capgem &copy; Copyright <?php echo date("Y");?></div>
        </div>
        <!-- /#sidebar-wrapper -->
		<header>
			<div class="topbar">
				<div class="user-label">
					<span>Welcome <?php echo (!empty($_SESSION['user_id'])) ? ($_SESSION['access'] == 0) ? 'Admin' : 'Clerk' : 'Guest'; ?></span>
				</div>
				<input type="text" placeholder="Search">
                <?php
                    if(!empty($_SESSION['user_id']) && $_SESSION['access'] == '1'):
                ?>
				<div class="<?= ($p == 'accounts') ? 'message-container-active':''; ?> message-container">
					<a href="<?php echo $url->site_url('?p=accounts');?>">
						<div class="message glyphicon glyphicon-envelope"></div>
					</a>
				</div>
                <?php endif; ?>
			</div>
		</header>