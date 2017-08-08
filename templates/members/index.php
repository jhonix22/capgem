<?php
$getUser = array("*");
$viewUser = $obj->read("tbl_user", $getUser, "access", "2");
?>
<div class="profile-content">
	<div class="col-md-12">
		<div class="banner-holder">
			<div class="members-container">
				<?php
					if(isset($_GET["u"])){
						$listMember = array("*");
						$viewListMem = $obj->read("tbl_members", $listMember, "user_id", json_decode( base64_decode($_GET["u"])));
							foreach($viewListMem as $key=>$value){
							?>
								<div class="circular--landscape">
									<img src="assets/img/<?=$value["memPicture"];?>"/>
								</div>
								<div class="personal-info">
									<h2>Personal Information</h2>
										<div class="members-details">
											<p>Full Name: <?=ucfirst($value["memName"]);?></p>
											<p>Gender: <?=strtoupper($value["memGender"]);?></p>
											<p>Address: <?=$value["memAddress"];?></p>
											<p>Birth Date: <?=date("M d, Y",strtotime($value["memBirtdate"]));?></p>
											<p>Spouse: <?=ucfirst($value["memSpouse"]);?></p>
											<p>Email: <?=$value["memEmail"];?></p>
										</div>
								</div>
							<?php
							}
					}else{
				?>
					<div class="circular--landscape">
						<img src="assets/img/avatar.png"/>
					</div>
					<div class="personal-info">
						<h2>Personal Information</h2>
							<div class="members-details">
								<p>First Name: --</p>
								<p>Last Name: --</p>
								<p>Gender: --</p>
								<p>Status: --</p>
								<p>Occupation: --</p>
								<p>Contact #: --</p>
							</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="members-list-container">
		<div class="list-content">
			<h1>Member List</h1>
			<ul>
			<?php
			foreach($viewUser as $idKey=>$idValue){
			$getMember = array("*");
			$viewMem = $obj->read("tbl_members", $getMember, "user_id", $idValue["user_id"]);
				foreach($viewMem as $key=>$value){
				?>
					<li class="<?= (isset($_GET["u"]) && json_decode( base64_decode($_GET["u"])) == $idValue["user_id"]) ? 'active-list' : ''; ?>"><a href="<?php echo $url->site_url('?p=members&u='.base64_encode( json_encode($idValue["user_id"])));?>"><?=ucfirst($value["memName"]);?></a></li>
				<?php
				}
			}
			?>
			</ul>
		</div>
	</div>
	<div class="loan-info">
		<div class="loan-info-details">
			<h1>Loan Information</h1>
			<div class="loan-info-logs">
				<ul class="info-label">
					<li>
						Installment Loan
						<p>Account Name</p>
					</li>
					<li>
						&#8369; 0.00
						<p>Past due as of <span>03/24/17</span></p>
					</li>
					<li>
						&#8369; 25,000.00
						<p>Original Load Amount</p>
					</li>
				</ul>
				<ul class="info-label">
					<li>
						02/25/2017
						<p>Account Name</p>
					</li>
					<li>
						&#8369; 239.68
						<p>Next payment due <span>03/24/17</span></p>
					</li>
					<li>
						8.0000%
						<p>Interest Rate</p>
					</li>
				</ul>
				<ul class="info-label">
					<li>
						&nbsp;
						<p>&nbsp;</p>
					</li>
					<li>
						&#8369; 239.68
						<p>Last payment on <span>02/24/17</span></p>
					</li>
					<li>
						&#8369; 864.47
						<p>Interest Paid (YTD)</p>
					</li>
				</ul>
				<ul class="info-label">
					<li>
						&nbsp;
						<p>&nbsp;</p>
					</li>
					<li>
						&nbsp;
						<p>&nbsp;</p>
					</li>
					<li>
						&#8369; 1084.08
						<p>Interest Paid (Previous Year)</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>