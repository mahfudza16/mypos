<?php
echo view('header');
?>
<div class="container pt-5">
<div class="d-flex justify-content-center">
<div class="border rounded p-5">
<?php
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	echo "<p class='text-info'>$msg</p>";
}
?>
<h2 class="text-center">Inventory 1455</h2>

<form action="<?php echo site_url('daftar'); ?>" method="POST">
	<input type="text" placeholder="Username" name="username" class="form-control mb-3" required>
	<input type="password" placeholder="Password" name="password" class="form-control mb-3" required>
	<input type="text" placeholder="Nama Lengkap" name="nama_lengkap" class="form-control mb-3" required>
	<input type="email" placeholder="Email" name="email" class="form-control mb-3" required>
	<button type="submit" name="submit_user" class="btn btn-primary form-control">Daftar</button>
</form>
<a href="login" class="btn btn-link text-center mx-auto" style="width:100%;">Ke halaman login</a>
</div>
</div>
</div>
<?php
echo view('footer');
?>