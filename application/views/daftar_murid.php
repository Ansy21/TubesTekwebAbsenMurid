<!DOCTYPE html>
<html>
<head>
  <title>Daftar Murid</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 20px;
      color: #333;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 30px;
    }
    
    h2 {
      color: #2c3e50;
      margin-top: 0;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }
    
    .class-navigation {
      margin-bottom: 25px;
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 6px;
    }
    
    .class-navigation p {
      margin: 0 0 10px 0;
      font-weight: 500;
      color: #555;
    }
    
    .class-link {
      display: inline-block;
      padding: 8px 15px;
      margin-right: 8px;
      margin-bottom: 8px;
      background-color: #e9ecef;
      color: #495057;
      text-decoration: none;
      border-radius: 20px;
      transition: all 0.3s ease;
      font-size: 14px;
    }
    
    .class-link:hover, .class-link.active {
      background-color: #4CAF50;
      color: white;
    }
    
    .alert-success {
      padding: 12px 15px;
      background-color: #d4edda;
      color: #155724;
      border-radius: 4px;
      margin-bottom: 20px;
      border-left: 4px solid #28a745;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    
    th {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      text-align: left;
    }
    
    td {
      padding: 12px;
      border-bottom: 1px solid #eee;
    }
    
    tr:hover {
      background-color: #f8f9fa;
    }
    
    .action-links a {
      color: #4CAF50;
      text-decoration: none;
      margin-right: 10px;
      padding: 5px 8px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .action-links a:hover {
      background-color: #e8f5e9;
    }
    
    .action-links a.delete {
      color: #e74c3c;
    }
    
    .action-links a.delete:hover {
      background-color: #fde8e8;
    }
    
    .no-data {
      text-align: center;
      padding: 30px;
      color: #7f8c8d;
    }
    
    .bottom-links {
      margin-top: 25px;
      padding-top: 15px;
      border-top: 1px solid #eee;
    }
    
    .bottom-links a {
      display: inline-block;
      padding: 10px 15px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-right: 10px;
      transition: background-color 0.3s ease;
    }
    
    .bottom-links a:hover {
      background-color: #3d8b40;
    }
    
    .bottom-links a.secondary {
      background-color: #6c757d;
    }
    
    .bottom-links a.secondary:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2><?php echo $judul; ?></h2>

    <!-- Navigasi Kelas -->
    <div class="class-navigation">
      <p><strong>Lihat berdasarkan kelas:</strong></p>
      <?php foreach ($kelas as $k): ?>
        <a href="<?php echo site_url('murid/index/'.$k); ?>" class="class-link <?php echo (isset($current_class) && $current_class == $k) ? 'active' : ''; ?>">
          <?php echo $k; ?>
        </a>
      <?php endforeach; ?>
      <a href="<?php echo site_url('murid'); ?>" class="class-link <?php echo (!isset($current_class)) ? 'active' : ''; ?>">
        Semua
      </a>
    </div>

    <!-- Pesan Sukses -->
    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert-success">
        <?php echo $this->session->flashdata('sukses'); ?>
      </div>
    <?php endif; ?>

    <!-- Tabel Murid -->
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIS</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($murid)): ?>
          <?php $no = 1; foreach ($murid as $m): ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $m->nama_murid; ?></td>
              <td><?php echo $m->nis; ?></td>
              <td><?php echo $m->kelas; ?></td>
              <td class="action-links">
                <a href="<?php echo site_url('murid/edit/'.$m->id); ?>">✏️ Edit</a>
                <a href="<?php echo site_url('murid/hapus/'.$m->id); ?>" class="delete" onclick="return confirm('Yakin ingin menghapus data murid ini?')">🗑️ Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="no-data">Tidak ada data murid.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="bottom-links">
      <a href="<?php echo site_url('murid/tambah'); ?>">➕ Tambah Murid</a>
      <a href="<?php echo site_url('dashboard'); ?>" class="secondary">🏠 Kembali ke Dashboard</a>
    </div>
  </div>

  <script>
    // Confirm before deleting
    document.querySelectorAll('.delete').forEach(link => {
      link.addEventListener('click', function(e) {
        if(!confirm('Yakin ingin menghapus data murid ini?')) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>
</html>