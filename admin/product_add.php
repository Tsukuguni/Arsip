<?php  
	require_once 'header_template.php';
?>

<div class="content">
	<div class="container">

		<h3 class="page-title">TAMBAH ARSIP SURAT</h3>

		<div class="card">
				
				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="input-group">
						<label>Nomor Surat</label>
						<input type="text" name="nomor" placeholder="Nomor Surat" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Perihal</label>
						<input type="text" name="perihal" placeholder="Perihal" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Asal Surat</label>
						<input type="text" name="asalsurat" placeholder="Asal Surat" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Deskripsi</label>
						<textarea class="input-control" name="desc" placeholder="Deskripsi"></textarea>
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
						<label>Foto Surat</label>
						<input type="file" name="photo"> 
					</div>

					<h3>Tanggal Surat</h3>

					<table class="table">
						<thead>
							<tr>
								<th>TANGGAL DAN BULAN</th>
								<th>TAHUN</th>
								<th width="100">HAPUS</th>
							</tr>
						</thead>
						<tbody id="tglsurat"></tbody>
					</table>

					<div style="text-align: right; margin-top: 5px;">
						<button type="button" class="btn-submit" id="btnAdd">Isi Tanggal</button>
					</div>

					<div class="input-group">
						<button type="button" onclick="window.location.href = 'product.php'" class="btn-back">Kembali</button>
						<button type="submit" name="submit" class="btn-submit">Simpan</button>
					</div>

				</form>

				<?php 

					if(isset($_POST['submit'])){

						// product data insert proccess //


						//accommodate the data file to be uploaded //
						$name = $_FILES['photo']['name'];
						$tmp_name = $_FILES['photo']['tmp_name'];

						$typefile = pathinfo($name, PATHINFO_EXTENSION);
						$renamefile = time() . '.' . $typefile;

						//file upload process //
						move_uploaded_file($tmp_name, '../uploads/product/' . $renamefile);

						//insert process //
						$query_insert = 'insert into tb_datasrt
						(nomor_surat, perihal_surat, asal_surat, deskripsi, foto, kategori) value (
						"'.$_POST['nomor'].'",
						"'.$_POST['perihal'].'",
						"'.$_POST['asalsurat'].'",
						"'.$_POST['desc'].'",
						"'.$renamefile.'",
						"'.$_POST['category'].'"
						)';

						$run_query_insert = mysqli_query($conn, $query_insert);
						$id_tgl = mysqli_insert_id($conn);

						if(!$run_query_insert){
							echo 'Save Data Failed' . mysqli_error($conn);
							exit();
						}


						// extra menu data insert proccess //
						$sql = [];
						if(isset($_POST['tgl'])){

							for($i=0; $i < count($_POST['tgl']); $i++){

								$sql[] = '("'.$id_tgl.'", "'.$_POST['tgl'][$i].'", "'.$_POST['thn'][$i].'")'; 

							}


							$run_query_insert_tb_tglsurat = 'insert into tb_tglsurat
						(id_tgl, tgl, thn) values ' . implode(",", $sql);

						$run_query_insert_tb_tglsurat = mysqli_query($conn, $run_query_insert_tb_tglsurat);


						if(!$run_query_insert_tb_tglsurat){
							echo 'Save Data Failed' . mysqli_error($conn);
							exit();
						}

					}

						
						
						echo 'Save Data Successfull';

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
				<td><input type="text" name="tgl[]" class="input-control" autocomplete="off" required></td>
				<td><input type="text" name="thn[]" class="input-control" autocomplete="off" required></td>
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