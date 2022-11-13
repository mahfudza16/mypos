<?php
echo view('header');
?>
<div class="container pt-5">
    <div class="d-flex justify-content-center">
        <div class="border rounded p-5">
        <?php
        if(isset($_GET['msg'])){
            echo "<p class='text-info text-center'>$_GET[msg]</p>";
        }
        ?>
        <h2 class="text-center">MyPOS 1455</h2>
        <form action="<?php echo site_url('login') ?>" method="POST">
            <input type="text" placeholder="Username" name="username" class="form-control mb-3" required>
            <input type="password" placeholder="Password" name="password" class="form-control mb-3" required>
            <button type="submit" class="btn btn-primary form-control">Login</button>
        </form>
        <a href="<?php echo site_url('daftar');?>" class="btn btn-link text-center mx-auto" style="width:100%;">Daftar</a>
        </div>
    </div>
</div>
<?php
echo view('footer');
?>


