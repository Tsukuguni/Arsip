<?php  
	require_once 'header_template.php';

	$query_select = 'select * from tb_datasrt where id_surat = "'.$_GET['id'].'" ';
	$run_query_select = mysqli_query($conn, $query_select);
	$d = mysqli_fetch_object($run_query_select);

?>

<div class="content">
	<div class="container">

		<h3 class="page-title">EDIT DATA ARSIP SURAT</h3>

		<div class="card">

				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="input-group">
						<label>Nomor Surat</label>
						<input type="text" name="nomor" placeholder="Nomor Surat" class="input-control" autocomplete="off" value="<?= $d->nomor_surat ?>" required>
					</div>

					<div class="input-group">
						<label>Perihal</label>
						<input type="text" name="perihal" placeholder="Perihal" class="input-control" autocomplete="off" value="<?= $d->perihal_surat ?>" required>
					</div>

					<div class="input-group">
						<label>Asal Surat</label>
						<input type="text" name="asalsurat" placeholder="Asal Surat" class="input-control" autocomplete="off" value="<?= $d->asal_surat ?>" required>
					</div>

					<div class="input-group">
						<label>Deskripsi</label>
						<textarea class="input-control" name="desc" placeholder="Deskripsi"  value="<?= $d->deskripsi ?>"></textarea>
					</div>

					<div class="input-group">
						<label>Kategori</label>
						<select class="input-control" name="category">
							<option value="">Pilih</option>
							<option value="SPT" >SPT</option>
							<option value="SK" >SK</option>
							<option value="SP" >SP</option>
							<option value="SPK" >SPK</option>
							<option value="Undangan" >Undangan</option>
							<option value="TerkaitPendidikan" >Pendidikan</option>
							<option value="Kwitansi" >Kwitansi</option>
							<option value="SuratMasuk" >Surat Masuk</option>
							<option value="Permohonan" >Permohonan</option>
							<option value="SuratCuti" >Surat Cuti</option>
							<option value="Usulan" >Usulan</option>
						</select>
					</div>

					<div class="input-group">
						<label>Gambar</label>
						<input type="hidden" name="old_photo" value="<?= $d->foto ?>">
						<div>
							<img src="../uploads/product/<?= $d->foto ?>" width="200">
						</div>
						<input type="file" name="photo"> 
					</div>

					<h3>Tanggal Surat</h3>

					<table class="table">
						<thead>
							<tr>
								<th>Tanggal dan Bulan</th>
								<th>Tahun</th>
								<th width="100">HAPUS</th>
							</tr>
						</thead>
						<tbody id="tglsurat"></tbody>

						<?php 
							$query_select_tb_tglsurat = 'select * from tb_tglsurat where id_tgl = "'.$_GET['id'].'"';
							$run_query_select_tb_tglsurat = mysqli_query($conn, $query_select_tb_tglsurat);

							while($row = mysqli_fetch_array($run_query_select_tb_tglsurat)){

						?>

						<tr>
							<td><input type="text" name="tgl[]" class="input-control" value="<?= $row['tgl'] ?>" autocomplete="off" required></td>
							<td><input type="text" name="thn[]" class="input-control" value="<?= $row['thn'] ?>" autocomplete="off" required></td>
							<td align="center"><button type="button" class="btn" onclick="removeRow(this)"><i class="fa fa-times"></i></button></td>
						</tr>

						<?php } ?>
					</table>

					<div style="text-align: right; margin-top: 5px;">
						<button type="button" class="btn-submit" id="btnAdd">Ubah Tanggal</button>
					</div>

					<div class="input-group">
						<button type="button" onclick="window.location.href = 'product.php'" class="btn-back">Back</button>
						<button type="submit" name="submit" class="btn-submit">Save</button>
					</div>

				</form>

				<?php 

					if(isset($_POST['submit'])){

						// check the user uploaded the file or not //
						if($_FILES['photo']['error'] <> 4){
							// if the file is uploaded //

							//accommodate the data file to be uploaded //
							$name = $_FILES['photo']['name'];
							$tmp_name = $_FILES['photo']['tmp_name'];

							//file upload process //
							move_uploaded_file($tmp_name, '../uploads/product/' . $name);

							// delete the previous old file //
							if(file_exists('../uploads/product/' . $_POST['old_photo'])){
								unlink('../uploads/product/' . $_POST['old_photo']);
							}


						}else{
							// if the file is not uploaded //
							$name = $_POST['old_photo'];

						}


						// product data update process //
						$query_update = 'update tb_datasrt set 
						nomor_surat = "'.$_POST['nomor'].'",
						perihal_surat = "'.$_POST['perihal'].'",
						asal_surat ="'.$_POST['asalsurat'].'", 
						deskripsi = "'.$_POST['desc'].'", 
						kategori ="'.$_POST['category'].'", 
						foto ="'.$name.'"
						where id_surat = "'.$_GET['id'].'" ';

						$run_query_update = mysqli_query($conn, $query_update);

						if(!$run_query_update){
							echo 'Edit Data Failed' . mysqli_error($conn);
							exit();
						}

						// the process of deleting extra menu data based on the product id //
						$query_delete_tglsurat = 'delete from tb_tglsurat where id_tgl = "'.$_GET['id'].'"';
						$run_query_delete_tglsurat = mysqli_query($conn, $query_delete_tglsurat);


						// extra menu data insert process //
						$sql = [];
						if(isset($_POST['tgl'])){

							for($i=0; $i < count($_POST['tgl']); $i++){

								$sql[] = '("'.$_GET['id'].'", "'.$_POST['tgl'][$i].'", "'.$_POST['thn'][$i].'")'; 

							}

							$run_query_insert_tb_tglsurat = 'insert into tb_tglsurat
							(id_tgl, tgl, thn) values ' . implode(",", $sql);

							$run_query_insert_tb_tglsurat = mysqli_query($conn, $run_query_insert_tb_tglsurat);

							if(!$run_query_insert_tb_extramenu){
								echo 'Edit Data Failed' . mysqli_error($conn);
								exit();
						}

					}

						

						echo "<script>alert('Edit Data Successfully')</script>";
						echo "<script>window.location = 'product.php'</script>";
						
					}

				?>

		</div>

	</div>
</div>

<script type="text/javascript">
	
	var btnAdd = document.getElementById("btnAdd")
	var tglsurat = document.getElementById("tglsurat")

	btnAdd.addEventListener("click", function(e){
		e.preventDefault()

		var listItem = document.createElement('tr');

		listItem.innerHTML = `
			<tr>
				<td><input type="text" name="tgl[]" class="input-control" required></td>
				<td><input type="text" name="thn[]" class="input-control" required></td>
				<td align="center"><button type="button" class="btn" onclick="removeRow(this)"><i class="fa fa-times"></i></button></td>
			</tr>
		`;

		tglsurat.appendChild(listItem)

	})



	function removeRow(e){
		e.closest('tr').remove()
	}
</script>

<?php require_once 'footer_template.php'; ?>