<?php
	$result = $obj->read("tbl_members",["*"],"user_id",$_SESSION['user_id']);
?>
<div class="profile-content">
	<div class="col-md-12">
		<div class="banner-holder">
			<div class="details-container">
				<div class="circular--landscape">
					<img src="assets/img/pic.png"/>
				</div>
				<div class="prof-details">
					<span>Position: 
						<?php 
							switch($_SESSION['access']):
								case '0': echo 'Admin'; break; case '1': echo 'Clerk'; break; case '2':  echo 'Member';break;
							endswitch;
						?>	
					</span>
				</div>
			</div>
			<div class="personal-info">
				<h1>Personal Information</h1>
				<div class="personal-details">
					<p>Name: <?php echo $result[0]['memName']; ?></p>
					<p>Gender: <?php echo ($result[0]['memGender'] == "M") ? 'Male' : 'Female' ;?></p>
					<!-- <p>Status: Single</p>
					<p>Occupation: None</p>
					<p>Contact #: 09123456789</p> -->
				</div>
			</div>
		</div>
	</div>
</div>