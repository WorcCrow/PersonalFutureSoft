<div align="center">
	<div style="width:80%;">
		<div class="container">
			<h2 class="left">Basic Info</h2>
			<form action="/cgi/account.php" method="POST">
				<div class="input-group mb-3 input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">Name</span>
					</div>
					<input name="firstname" type="text" class="form-control" placeholder="<?php echo $_SESSION['firstname']?>" disabled>
					<input name="middlename" type="text" class="form-control" placeholder="<?php echo $_SESSION['middlename']?>" disabled>
					<input name="lastname" type="text" class="form-control" placeholder="<?php echo $_SESSION['lastname']?>" disabled>
				</div>

				<div class="input-group mb-3 input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">Address</span>
					</div>
					<input name="address" type="text" class="form-control" placeholder="<?php echo $_SESSION['address']?>">
				</div>

				<div class="input-group mb-3 input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">Contact Details</span>
					</div>
					<input name="contact" type="number" class="form-control" placeholder="<?php echo $_SESSION['contact']?>">
					<input name="email" type="email" class="form-control" placeholder="<?php echo $_SESSION['email']?>" disabled>
				</div>
				
				<div align="right">
					<input name="action" type="hidden" value="update_personal_info">
					<button type="button" class="btn btn-primary" onclick="submit()">Update</button>
				</div>
			</form>
			
			<hr>
			<h2 class="left">Security</h2>
			<form action="/cgi/account.php" method="POST">
				<div class="input-group mb-3 input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">Old Password</span>
					</div>
					<input name="old_password" type="password" class="form-control" placeholder="Old Password">
				</div>

				<div class="input-group mb-3 input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">New Password</span>
					</div>
					<input name="new_password" type="password" class="form-control" placeholder="New Password">
					<input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password">
				</div>
				
				<div align="right">
					<input name="action" type="hidden" value="change_password">
					<button type="button" class="btn btn-primary" onclick="submit()">Change</button>
				</div>
			</form>
		</div>
	</div>
</div>
