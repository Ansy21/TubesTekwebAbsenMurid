<!DOCTYPE html>
<html>
<head>
  <title>Edit Murid</title>
</head>
<body>
  <h2>Edit Data Murid</h2>

  <form method="post" action="<?php echo site_url('murid/update'); ?>">
    <input type="hidden" name="id" value="<?php echo $murid->id; ?>">

    <label>Nama Murid:</label><br>
    <input type="text" name="nama_murid" value="<?php echo $murid->nama_murid; ?>" required><br><br>

    <label>NIS:</label><br>
    <input type="text" name="nis" value="<?php echo $murid->nis; ?>" required><br><br>

    <label>Kelas:</label><br>
    <input type="text" name="kelas" value="<?php echo $murid->kelas; ?>" required><br><br>

    <button type="submit">Simpan Perubahan</button>
  </form>

  <br>
  <a href="<?php echo site_url('murid/index'); ?>">Kembali ke Daftar Murid</a>
</body>
</html>
