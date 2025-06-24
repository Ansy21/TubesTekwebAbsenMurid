<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Guru</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #333;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    header {
      background-color: #4CAF50;
      color: white;
      padding: 20px 0;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    h2 {
      margin: 0;
      font-weight: 600;
    }
    
    .nav-menu {
      display: flex;
      gap: 20px;
    }
    
    .nav-menu a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 8px 12px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .nav-menu a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }
    
    .welcome-section {
      background-color: white;
      border-radius: 8px;
      padding: 30px;
      margin: 30px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      text-align: center;
    }
    
    .welcome-message {
      font-size: 24px;
      margin-bottom: 20px;
      color: #2c3e50;
    }
    
    .quick-actions {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
      flex-wrap: wrap;
    }
    
    .action-card {
      background-color: white;
      border-radius: 8px;
      padding: 25px;
      width: 200px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .action-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .action-card a {
      text-decoration: none;
      color: #2c3e50;
      display: block;
    }
    
    .action-icon {
      font-size: 36px;
      margin-bottom: 15px;
      color: #4CAF50;
    }
    
    .action-title {
      font-weight: 600;
      margin-bottom: 10px;
    }
    
    footer {
      text-align: center;
      padding: 20px;
      color: #7f8c8d;
      font-size: 14px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <h2>Dashboard Guru</h2>
      <div class="nav-menu">
        <a href="<?php echo site_url('murid/index'); ?>">📋 Daftar Murid</a>
        <a href="<?php echo site_url('murid/tambah'); ?>">➕ Tambah Murid</a>
        <a href="<?php echo site_url('auth/logout'); ?>">🚪 Logout</a>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="welcome-section">
      <div class="welcome-message">
        Selamat datang, <strong><?php echo $this->session->userdata('guru')->nama_guru; ?></strong>!
      </div>
      <p>Anda login sebagai guru. Silahkan pilih menu di atas atau aksi cepat di bawah ini.</p>
      
      <div class="quick-actions">
        <div class="action-card">
          <a href="<?php echo site_url('murid/index'); ?>">
            <div class="action-icon">📋</div>
            <div class="action-title">Daftar Murid</div>
            <div class="action-desc">Lihat semua data murid</div>
          </a>
        </div>
        
        <div class="action-card">
          <a href="<?php echo site_url('murid/tambah'); ?>">
            <div class="action-icon">➕</div>
            <div class="action-title">Tambah Murid</div>
            <div class="action-desc">Tambah data murid baru</div>
          </a>
        </div>

        <div class="action-card">
            <a href="<?php echo site_url('murid/absen_form'); ?>">
            <div class="action-icon">📝</div>
            <div class="action-title">Absensi Murid</div>
            <div class="action-desc">Tambah data absensi murid</div>
          </a>
        </div>

        <div class="action-card">
          <a href="<?php echo site_url('murid/rekap'); ?>">
            <div class="action-icon">📊</div>
            <div class="action-title">Rekap Absensi</div>
            <div class="action-desc">Tampilkan rekapan</div>
          </a>
        </div>


      </div>
    </div>
  </div>

  <footer>
    Sistem Informasi Sekolah &copy; <?php echo date('Y'); ?>
  </footer>
</body>
</html>