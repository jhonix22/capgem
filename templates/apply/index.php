<div class="profile-content">
	<div class="col-md-12">
		<div class="app-content-header">
			<h1 class="application-label">Application Form</h1>
			<div class="app-form">
				<div class="dl-form">
					<p class="no-margin"><span class="label-gray">Click to</span> Download Forms <a href="?p=apply&dl=1"><span class="glyphicon glyphicon-download"></span></a></p>
					<p><span class="label-gray">Attach File </span><span class="glyphicon glyphicon-paperclip"></span></p>
				</div>
			</div>
		</div>
		<div class="app-form-container">
			<h1 class="orange-label">Personal Information</h1>
			<div class="app-form-details pull-left">
				<form method="POST" action="">
					<div class="details-label">
						<label>Firstname: </label>
						<label>Lastname: </label>
						<label>Gender: </label>
						<label>Status: </label>
						<label>Occupation: </label>
						<label>Contact #: </label>
					</div>
					<div class="details-input">
						<input type="text" name="fname"/>
						<input type="text" name="lname"/>
						<span class="gender">
							<select name="gender">
								<option>M</option>
								<option>F</option>
							</select>
						</span>
						<span class="age">
							<label>Age: </label>
							<input type="text" maxlength="2" style="width:50px;" name="age">
						</span>
						<input type="text" name="status"/>
						<input type="text" name="occupation"/>
						<input type="text" name="cnt_num"/>
					</div>
					<div class="container-btn">
						<button class="submit-btn">Submit</button>
					</div>
				</form>
			</div>
			<?php
				if(!empty($_GET['dl'])):
					?>
						<div class="pull-right">
							<h2>Forms</h2>
							<ul>
								<li>
									<a href="downloadables/Application-for-Membership.docx">Application-for-Membership</a>
								</li>
								<li>
									<a href="downloadables/CAPGEM-Community-Multi.docx">CAPGEM-Community-Multi</a>
								</li>
								<li>
									<a href="downloadables/E-Cash-Loan-Form.docx">E-Cash-Loan-Form</a>
								</li>
								<li>
									<a href="downloadables/Membership-and-Subscription-Agreement.docx">Membership-and-Subscription-Agreement</a>
								</li>		
							</ul>
						</div>
					<?php
				endif;
			?>
		</div>
	</div>
</div>