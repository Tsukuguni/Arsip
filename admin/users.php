<?php  
	require_once 'header_template.php';

	$query_select = 'select * from tb_user';
	$run_query_select = mysqli_query($conn, $query_select);


	// check if there is a delete parameter //
	if(isset($_GET['delete'])){

		// process deleting data
		$query_delete = 'delete from tb_user where id_user = "'.$_GET['delete'].'" ';
		$run_query_delete = mysqli_query($conn, $query_delete);

		if($run_query_delete){
			echo "<script>window.location = 'users.php' </script>";
		}else{
			echo "<script>alert(Failed to Delete Data)</script";
		}
	}
?>

<div class="content">
	<div class="container">

		<h3 class="page-title">DAFTAR ADMIN</h3>

		<div class="card">
				<a href="users_add.php" class="btn" title="Add Data"><i class="fa fa-plus"></i></a>
			<table class=" table">
				<thead>
					<tr>
						<th width="50">NO</th>
						<th>NAMA</th>
						<th>USERNAME</th>
						<th width="100">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php if(mysqli_num_rows($run_query_select) > 0){ ?>

						<?php $nomor = 1; ?>
					<?php while($row = mysqli_fetch_array($run_query_select)){ ?>

					<tr>
						<td align="center"><?= $nomor++ ?></td>
						<td><?= $row['nama'] ?></td>
						<td><?= $row['username'] ?></td>
						<td align="center">
							<a href="users_edit.php?id=<?= $row['id_user'] ?>" class="btn" title="Edit Data"><i class="fa fa-edit"></i></a>
							<a href="?delete=<?= $row['id_user'] ?>" class="btn" onclick="return confirm('Are you sure want to Delete this User?')" title="Delete Data"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					
				<?php }}else{ ?><tr>
						<td colspan="4">No Data</td>
					</tr><?php } ?>
				</tbody>
			</table>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>