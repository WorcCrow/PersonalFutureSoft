<div align="center">
	<div class="container">
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th colspan="3" style="text-align:center"><h2>License Manager</h2></th>
				</tr>
			</thead>
			<thead >
				<tr>
					<th>Software</th>
					<th>License Code</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result= GetRowData("SELECT * FROM owned_license WHERE user_id='" . $_SESSION['id'] . "'");
					$license_collection = array();
					$index = 0;
					if(count($result) > 0){
						foreach($result as $row){
							$days_left = DaysLeft($row['expiration_date']);
							if($days_left > 0){
								if($row['machine_id'] != ""){
									$status_class = "status_active";
									$status = "Active";
								}else{
									$status_class = "status_unused";
									$status = "Unused";
								}
							}else{
								$status_class = "status_expired";
								$status = "Expired";
							}
							
							$collection = array("id"=>$row['id'],"software"=>$row['software'],"purchase_date"=>$row['purchase_date'],"expiration_date"=>$row['expiration_date'],"days_left"=>$days_left,"machine_id"=>$row['machine_id'],"new_machine_id"=>$row['new_machine_id'],"license_code"=>$row['license_code'],"status"=>$status);
							array_push($license_collection,$collection);
							
							$software = $row['software'];
							$license_code = $row['license_code'];
							include("owned_license_template.php");
							
							$index++;
						}	
					}
				?>
			</tbody>
		</table>
		
		<table id="license_info_table" class="table table-dark table-striped table-hover" hidden>
			<thead class="thead-dark">
				<tr>
					<th colspan="2"><h5>License Information</h5></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="bold">Software</td>
					<td class="right" id="license_software"></td>
				</tr>
				<tr>
					<td class="bold">License Code</td>
					<td class="right" id="license_code"></td>
				</tr>
				<tr>
					<td class="bold">Used By</td>
					<td class="right" id="license_user"></td>
				</tr>
				<tr>
					<td class="bold">Purchase Date</td>
					<td class="right" id="license_purchase_date"></td>
				</tr>
				<tr>
					<td class="bold">Expiration Date</td>
					<td class="right" id="license_expiration_date"></td>
				</tr>
				<tr>
					<td class="bold">Days Left</td>
					<td class="right" id="license_days_left"></td>
				</tr>
				<tr>
					<td class=" bold">Machine ID</td>
					<td class="right" id="license_machine_id"></td>
				</tr>
				<tr>
					<td class="bold">Status</td>
					<td class="right" id="license_status"></td>
				</tr>
				<tr>
					<td>
					</td>
					<td class="right">
						<button type="button" class="btn btn-warning">Renew</button>
						<button type="button" class="btn btn-danger" onclick="hide_lit()">Close</button>
					</td>
				</tr>
			</tbody>
		</table>
		<script>
			const license_collection = <?php echo json_encode($license_collection)?>
		</script>
	</div>
</div>

 <!-- Trigger the modal with a button -->
  
