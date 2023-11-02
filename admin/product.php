<?php  
	require_once 'header_template.php';

	$query_select = 'select * from tb_datasrt';
	$run_query_select = mysqli_query($conn, $query_select);


	// check if there is a delete parameter //
	if(isset($_GET['delete'])){

		$query_select_foto = 'select foto from tb_datasrt where id_surat = "'.$_GET['delete'].'"';
		$run_query_select_foto = mysqli_query($conn, $query_select_foto);
		$d = mysqli_fetch_object($run_query_select_foto);

		if(file_exists('../uploads/product/' . $d->foto)){
			unlink('../uploads/product/' . $d->foto);
		}

		// process deleting data
		$query_delete = 'delete from tb_datasrt where id_surat = "'.$_GET['delete'].'" ';
		$run_query_delete = mysqli_query($conn, $query_delete);

		// process deleting data extra menu //
		$query_delete_extra = 'delete from tb_extramenu where id_tgl = "'.$_GET['delete'].'" ';
		$run_query_delete_extra = mysqli_query($conn, $query_delete_extra);


		if($run_query_delete){
			echo "<script>window.location = 'product.php' </script>";
		}else{
			echo "<script>alert(Failed to Delete Data)</script";
		}
	}
?>

<div class="content">
	<div class="container">

		<h3 class="page-title">DATA ARSIP SURAT</h3>

		<div class="card">
				<a href="product_add.php" class="btn" title="Add Data"><i class="fa fa-plus"></i></a>
			<table class=" table">
				<thead>
					<tr>
						<th width="50">NO</th>
						<th>FOTO SURAT</th>
						<th>NO SURAT</th>
						<th>PERIHAL</th>
						<th>ASAL</th>
						<th>JENIS</th>
						<th>DESKRIPSI</th>
						<th width="100">AKSI</th>
					</tr>
				</thead>
				<tbody>

					<?php if(mysqli_num_rows($run_query_select) > 0){ ?>

						<?php $nomor = 1 ?>
					<?php while($row = mysqli_fetch_array($run_query_select)){ ?>

					<tr>
						<td align="center"><?= $nomor++ ?></td>
						<td><img src="../uploads/product/<?= $row['foto']?>" width="80px"></td>
						<td><?= $row['nomor_surat'] ?></td>
						<td><?= $row['perihal_surat'] ?></td>
						<td><?= $row['asal_surat'] ?></td>
						<td><?= $row['kategori'] ?></td>
						<td><?= $row['deskripsi'] ?></td>
						<td align="center">
							<a href="product_edit.php?id=<?= $row['id_surat'] ?>" class="btn" title="Edit Data"><i class="fa fa-edit"></i></a>
							<a href="?delete=<?= $row['id_surat'] ?>" class="btn" onclick="return confirm(
							'Are you sure want to Delete this User?')" title="Delete Data"><i class="fa fa-times"></i></a>

						</td>
					</tr>
					
				<?php }}else{ ?><tr>
						<td colspan="7">No Data</td>
					</tr><?php } ?>
				</tbody>
			</table>	

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>