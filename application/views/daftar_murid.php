<!DOCTYPE html>
<html>
<head>
  <title>Daftar Murid</title>
</head>
<body>

  <h2><?php echo $judul; ?></h2>

  <!-- Navigasi Kelas -->
  <p><strong>Lihat berdasarkan kelas:</strong></p>
  <?php foreach ($kelas as $k): ?>
    <a href="<?php echo site_url('murid/index/'.$k); ?>" style="margin-right:10px;">
      [<?php echo $k; ?>]
    </a>
  <?php endforeach; ?>
  <a href="<?php echo site_url('murid'); ?>">[Semua]</a>

  <br><br>

  <!-- Pesan Sukses -->
  <?php if ($this->session->flashdata('sukses')): ?>
    <p style="color:green;"><?php echo $this->session->flashdata('sukses'); ?></p>
  <?php endif; ?>

  <!-- Tabel Murid -->
  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NIS</th>
      <th>Kelas</th>
      <th>Aksi</th>
    </tr>
    <?php if (!empty($murid)): ?>
      <?php $no = 1; foreach ($murid as $m): ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $m->nama_murid; ?></td>
          <td><?php echo $m->nis; ?></td>
          <td><?php echo $m->kelas; ?></td>
          <td>
            <a href="<?php echo site_url('murid/edit/'.$m->id); ?>">✏️ Edit</a> |
            <a href="<?php echo site_url('murid/hapus/'.$m->id); ?>" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" style="text-align:center;">Tidak ada data murid.</td>
      </tr>
    <?php endif; ?>
  </table>

  <br>
  <a href="<?php echo site_url('murid/tambah'); ?>">➕ Tambah Murid</a> |
  <a href="<?php echo site_url('dashboard'); ?>">🏠 Kembali ke Dashboard</a>

</body>
</html>
