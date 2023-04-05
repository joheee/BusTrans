<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Driver | Income</title>	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>

	<style>
		.absolute-center {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
	</style>

	<body style="width: 100vw; height: 100vh;">
		<div class="card text-center mb-5">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/Bus_controller')?>">bus page</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/Kondektur_controller')?>">kondektur page</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/Driver_controller')?>">driver page</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/Trans_controller')?>">Trans UPN</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="absolute-center">
			<div class="card">
				<div class="card-header">
					Current driver income <?Php echo $id_driver?>
				</div>
				<div class="card-body">
					<form action="<?Php Echo Base_url('index.php/Driver_controller/filterByMonth/'.$id_driver) ?>" method="post">

							<div class="form-group">
								<label for="exampleInputEmail1">Enter selected month</label>
								<input type="number" class="form-control" id="" name='filterMonth' placeholder="Enter selected month">
							</div>
	
							<button type="submit" class="btn btn-primary">filter</button>
					</form>

					<table class="table mt-5">
						<thead>
							<tr>
							<th scope="col">no</th>
							<th scope="col">Total income</th>
							<th scope="col">Total KM</th>
							<th scope="col">Date</th>

							</tr>
						</thead>
						<tbody>
						<?php foreach ($driver_income as $no => $row) : ?>
							<tr>
								<td><?= $no+1 ?></td>
								<td><?= $row->total_harga ?></td>
								<td><?= $row->jumlah_km ?></td>
								<td><?= $row->tanggal ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
