<?php
if(isset($_SESSION['username'])){
    echo "<div class='mt-5'>";
    echo "<a href='".site_url('logout')."'>Logout</a>";
    echo "</div>";
}
if(isset($_SESSION['msg'])){
    unset($_SESSION['msg']);
}
?>
<br>
<div class="text-center">
<em>&copy; 2021</em>
</div>
</div>
</body>
</html>