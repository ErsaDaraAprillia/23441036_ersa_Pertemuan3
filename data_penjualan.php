<?php
session_start();


if (!isset($_SESSION['array_data_penjualan'])) {
    $_SESSION['array_data_penjualan'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    array_push(
        $_SESSION['array_data_penjualan'],
        array(
            "nama_produk" => $_POST['nama_produk'],
            "harga_produk" => $_POST['harga_produk'],
            "jumlah_terjual" => $_POST['jumlah_terjual'],
            "total" => $_POST['harga_produk'] * $_POST['jumlah_terjual'] 
        )
    );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Data Penjualan</title>
</head>
<style>
    table, th ,td{
        border: 1px solid black;
    }
</style>
<body>
    <h1>Sistem Pencatatan Data Penjualan</h1>

    <form action="" method="post">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk"></input>
        <br>
        <label>Harga Produk:</label>
        <input type="number" name="harga_produk"></input>
        <br>
        <label>Jumlah Terjual:</label>
        <input type="number" name="jumlah_terjual"></input>
        <br>
        <label>Total:</label>
        <input type="number" name="total"></input>
        <br>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga Per Produk</th>
            <th>Jumlah Terjual</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Produk A</td>
            <td>10000</td>
            <td>5</td>
            <td>50000</td>
        </tr>
        <tr>
            <td>Produk B</td>
            <td>7500</td>
            <td>10</td>
            <td>75000</td>
        </tr>
        <tr>
            <td>Produk C</td>
            <td>10000</td>
            <td>5</td>
            <td>50000</td>
        </tr>
        <?php foreach ($_SESSION['array_data_penjualan'] as $data) { ?>
        <tr>
            <td><?php echo htmlspecialchars($data["nama_produk"]); ?></td>
            <td><?php echo htmlspecialchars($data["harga_produk"]); ?></td>
            <td><?php echo htmlspecialchars($data["jumlah_terjual"]); ?></td>
            <td><?php echo htmlspecialchars($data["total"]); ?></td> 
        </tr>

        <?php } ?>
        
        
    </table>
</body>
</html>