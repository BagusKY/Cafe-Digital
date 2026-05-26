<?php
include '../config/database.php';
$data = mysqli_query($conn, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container py-5">

<h1 class="mb-4">Dashboard Admin</h1>

<table class="table table-dark table-striped">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Kategori</th>
</tr>
</thead>

<tbody>

<?php $no = 1; ?>
<?php while($menu = mysqli_fetch_assoc($data)) : ?>

<tr>
<td><?= $no++; ?></td>
<td><?= $menu['nama']; ?></td>
<td><?= $menu['harga']; ?></td>
<td><?= $menu['kategori']; ?></td>
</tr>

<?php endwhile; ?>

</tbody>
</table>

</div>

</body>
</html>
