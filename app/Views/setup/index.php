<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info'>".$_SESSION['msg']."</p>";
}

echo view('footer');
?>