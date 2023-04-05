<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kondektur | Home</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
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
					<a class="nav-link" href="<?php echo base_url('index.php/Trans_controller/insert')?>">insert Trans UPN</a>

				</li>
			</ul>
		</div>
	</div>
	<div class="">
		<table class="table">
			<thead>
				<tr>
				<th scope="col">no</th>
				<th scope="col">id_trans_upn</th>
				<th scope="col">id_kondektur</th>
				<th scope="col">id_bus</th>
				<th scope="col">id_driver</th>
				<th scope="col">jumlah_km</th>
				<th scope="col">tanggal</th>
				<th scope="col">update</th>
				<th scope="col">delete</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($data_trans as $no => $row) : ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $row->id_trans_upn ?></td>
					<td><?= $row->id_kondektur ?></td>
					<td><?= $row->id_bus ?></td>
					<td><?= $row->id_driver ?></td>
					<td><?= $row->jumlah_km ?></td>
					<td><?= $row->tanggal ?></td>
					<td>
						<a href="<?php echo base_url('index.php/Trans_controller/update/'.$row->id_trans_upn)?>">update</a>
					</td>
					<td>
						<a href="<?php echo base_url('index.php/Trans_controller/delete/'.$row->id_trans_upn)?>">delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>
