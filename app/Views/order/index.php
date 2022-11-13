<?php
echo view('header');
if(isset($_SESSION['msg'])){
    echo "<p class='text-info text-center'>".$_SESSION['msg']."</p>";
}
?>

<div style="display:grid">
    <h3 class="text-center">Daftar pesanan</h3>
    <form method="POST" action="<?= site_url('order'); ?>" style="margin:auto;text-align:center;">
        <?php foreach($products as $product): ?>
        <div class="card" style="width:400px;margin: 5px auto 5px auto;">
            <img class="card-img-top img-fluid" src="<?= site_url().'public/uploads/'.$product->picture; ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><?= ucwords($product->name); ?></h4>
                <p class="card-text"><?= ucfirst($product->description); ?></p>
                <p class="card-text">Harga: <?= $product->price; ?></p>
                <input type='hidden' name='price[]' value="<?= $product->price; ?>">
                <input type='hidden' name='product[]' value="<?= $product->name; ?>">  
                <input type='number' name='qty[]'>
            </div>
        </div>
        <?php endforeach; ?>
        <label>Tipe pesanan</label>
        <select name='order_type' class="form-control mb-3">
            <?php foreach($order_types as $type): ?>
                <option value="<?= $type->id; ?>"><?= $type->name; ?></option>
            <?php endforeach; ?>
        </select>

        <label>Metode pembayaran</label>
        <select name='payment_method' class="form-control mb-3">
            <?php foreach($payment_methods as $payment): ?>
                <option value="<?= $payment->id; ?>"><?= $payment->name; ?></option>
            <?php endforeach; ?>
        </select>
        
        <input type="submit" class="btn btn-primary btn-sm">
    </form>
</div>

<?php
echo view('footer');
?>