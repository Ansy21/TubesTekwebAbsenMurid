<!DOCTYPE html>
<html>
<head>
  <title>Tambah Murid</title>
</head>
<body>
  <h2>Form Tambah Murid</h2>

  <?php if ($this->session->flashdata('sukses')): ?>
    <p style="color:green;"><?php echo $this->session->flashdata('sukses'); ?></p>
  <?php endif; ?>

  <form method="post" action="<?php echo site_url('murid/simpan'); ?>">
    <label>Nama Murid:</label><br>
    <input type="text" name="nama_murid" required><br><br>

    <label>NIS:</label><br>
    <input type="text" name="nis" required><br><br>

    <label>Kelas:</label><br>
    <select name="kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <?php foreach ($kelas as $k): ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php endforeach; ?>
        </select><br><br>

    <button type="submit">Simpan</button>
  </form>

  <br>
  <a href="<?php echo site_url('dashboard'); ?>">Kembali ke Dashboard</a>
</body>
</html>
