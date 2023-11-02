<?php  
	require_once 'header_template.php';

	$query_select = 'select * from tb_user where id_user = "'.$_GET['id'].'" ';
	$run_query_select = mysqli_query($conn, $query_select);
	$d = mysqli_fetch_object($run_query_select);

?>

<div class="content">
	<div class="container">

		<h3 class="page-title">EDIT DATA ADMIN</h3>

		<div class="card">


				<form action="" method="post">
					
					<div class="input-group">
						<label>Nama Lengkap</label>
						<input type="text" name="name" placeholder="Nama Lengkap" class="input-control" value="<?= $d->nama?>" required>
					</div>

					<div class="input-group">
						<label>Username</label>
						<input type="text" name="user" placeholder="Username" class="input-control" value="<?= $d->username?>" required>
					</div>

					<div class="input-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password" class="input-control"> 
					</div>

					<div class="input-group">
						<button type="button" onclick="window.location.href = 'users.php'" class="btn-back">Kembali</button>
						<button type="submit" name="submit" class="btn-submit">Simpan</button>
					</div>

				</form>

				<?php 

					if(isset($_POST['submit'])){

						$password = '';

						if($_POST['pass'] != ''){
							$password = md5($_POST['pass']);
						}else{
							$password = $d->password;
						}

						// data update proccess //
						$query_update = 'update tb_user set 
						nama = "'.$_POST['name'].'",
						username ="'.$_POST['user'].'", 
						password = "'.$password.'" 
						where id_user = "'.$_GET['id'].'" ';

						$run_query_update = mysqli_query($conn, $query_update);

						if($run_query_update){
							echo "<script>alert('Edit Data Successfully')</script>";
							echo "<script>window.location = 'users.php'</script>";
						}else{
							echo "Edit Data Failed" . mysqli_error($conn);
						}
						
					}

				?>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>