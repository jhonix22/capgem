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
                    <a href="<?php echo $url->site_url('index.php?p=profile');?>" class="<?= ($p == 'profile') ? 'active':''; ?>">Profile</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=members');?>" class="<?= ($p == 'members') ? 'active':''; ?>">Members</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=employees');?>" class="<?= ($p == 'employees') ? 'active':''; ?>">Employees</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=calendar');?>" class="<?= ($p == 'calendar') ? 'active':''; ?>">Calendar</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=reports');?>" class="<?= ($p == 'reports') ? 'active':''; ?>">Reports</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=contacts');?>" class="<?= ($p == 'contacts') ? 'active':''; ?>">Contacts</a>
                </li>
                <li>
                    <a href="<?php echo $url->site_url('index.php?p=apply');?>" class="<?= ($p == 'contacts') ? 'active':''; ?>">Apply Now</a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="">Log Out</a>
                </li>
            </ul>
			<div class="copyright">Capgem &copy; Copyright <?php echo date("Y");?></div>
        </div>
        <!-- /#sidebar-wrapper -->
		<header>
			<div class="topbar">
			<?php
				if($p != ''){
			?>
				<div class="user-label">
					<span>Welcome Admin</span>
				</div>
			<?php
				}
			?>
				<input type="text" placeholder="Search">
			</div>
		</header>