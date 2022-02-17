<div align="center">
	<div style="width:80%;">
		<div class="container" align="center">
			
			<table class="table table-dark">
				<thead class="thead-dark">
					<tr>
						<th colspan="2"><h5>Wallet Information</h5></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Address</td>
						<td><?php echo $_SESSION['wallet_address'];?></td>
					</tr>
					<tr>
						<td>Amount</td>
						<td>₱<?php echo number_format(wallet_fund(), 2, '.', ',');?></td>
					</tr>
					<tr>
						<td>Earn</td>
						<td>₱<?php echo number_format(wallet_earn(), 2, '.', ',');?></td>
					</tr>
				</tbody>
			</table>
			
			<form method="post" action="cgi/action.php">
				<label for="transcode" class="left">Claim Deposit</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Enter Transaction Code" name="transcode">
					<div class="input-group-append">
						<button class="btn btn-success" type="submit" name="action" value="claim_deposit" onclick="submit()">Claim</button> 
					</div>
				</div>
			</form>
			
			<table id="license_info_table" class="table table-dark table-striped table-hover" >
				<thead class="thead-dark">
					<tr>
						<th colspan="2"><h5>Transaction History</h5></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Date</td>
						<td>Description</td>
					</tr>
				</tbody>
		</table>
		</div>
	</div>
</div>
