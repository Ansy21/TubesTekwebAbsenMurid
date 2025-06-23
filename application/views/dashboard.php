<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Selamat datang, <?php echo $this->session->userdata('guru')->nama_guru; ?>!</h2>
  <a href="<?php echo site_url('murid/index'); ?>">📋 Daftar Murid</a> |
  <a href="<?php echo site_url('murid/tambah'); ?>">➕ Tambah Murid</a> | 
  <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>
</html>
