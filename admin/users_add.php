<?php  
	require_once 'header_template.php';
?>

<div class="content">
	<div class="container">

		<h3 class="page-title">TAMBAH ADMIN</h3>

		<div class="card">
				
				<form action="" method="post">
					
					<div class="input-group">
						<label>Nama Lengkap</label>
						<input type="text" name="name" placeholder="Nama Lengkap" class="input-control" required>
					</div>

					<div class="input-group">
						<label>Username</label>
						<input type="text" name="user" placeholder="Username" class="input-control" required>
					</div>

					<div class="input-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password" class="input-control" required> 
					</div>

					<div class="input-group">
						<button type="button" onclick="window.location.href = 'users.php'" class="btn-back">Kembali</button>
						<button type="submit" name="submit" class="btn-submit">Simpan</button>
					</div>

				</form>

				<?php 

					if(isset($_POST['submit'])){

						// data entry proccess //
						$query_insert = 'insert into tb_user (nama, username, password) value
						("'.$_POST['name'].'", "'.$_POST['user'].'", "'.md5($_POST['pass']).'")';

						$run_query_insert = mysqli_query($conn, $query_insert);

						if($run_query_insert){
							echo '<script type ="text/JavaScript">';  
      						echo 'alert("Save Data Successfull")';  
						    echo '</script>'; 
						}else{
							echo '<script type ="text/JavaScript">';  
      						echo 'alert("Save Data Failed")';  
						    echo '</script>'; 
						}

					}

				?>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>