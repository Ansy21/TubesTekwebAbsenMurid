<!DOCTYPE html>
<html>
<head>
  <title>Tambah Murid</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #333;
    }
    
    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 20px rgba(0,0,0,0.1);
      padding: 30px;
    }
    
    h2 {
      color: #2c3e50;
      margin-top: 0;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
      text-align: center;
    }
    
    .alert-success {
      padding: 12px 15px;
      background-color: #d4edda;
      color: #155724;
      border-radius: 4px;
      margin-bottom: 20px;
      border-left: 4px solid #28a745;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #555;
    }
    
    input[type="text"],
    select {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
      transition: border 0.3s ease;
      box-sizing: border-box;
    }
    
    input[type="text"]:focus,
    select:focus {
      border-color: #4CAF50;
      outline: none;
      box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }
    
    button[type="submit"] {
      width: 100%;
      padding: 14px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }
    
    button[type="submit"]:hover {
      background-color: #3d8b40;
    }
    
    .back-link {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 15px;
      background-color: #6c757d;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .back-link:hover {
      background-color: #5a6268;
    }
    
    .required-field::after {
      content: " *";
      color: #e74c3c;
    }
    
    .form-footer {
      text-align: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Tambah Murid</h2>

    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert-success">
        <?php echo $this->session->flashdata('sukses'); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('murid/simpan'); ?>">
      <div class="form-group">
        <label class="required-field">Nama Murid</label>
        <input type="text" name="nama_murid" required placeholder="Masukkan nama lengkap murid">
      </div>

      <div class="form-group">
        <label class="required-field">NIS</label>
        <input type="text" name="nis" required placeholder="Masukkan Nomor Induk Siswa">
      </div>

      <div class="form-group">
        <label class="required-field">Kelas</label>
        <select name="kelas" required>
          <option value="">-- Pilih Kelas --</option>
          <?php foreach ($kelas as $k): ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit">Simpan Data Murid</button>
    </form>

    <div class="form-footer">
      <a href="<?php echo site_url('murid/index'); ?>" class="back-link">← Kembali ke Daftar Murid</a>
    </div>
  </div>

  <script>
    // Simple form validation feedback
    document.querySelector('form').addEventListener('submit', function(e) {
      const inputs = document.querySelectorAll('input[required], select[required]');
      let isValid = true;
      
      inputs.forEach(input => {
        if (!input.value.trim()) {
          input.style.borderColor = '#e74c3c';
          isValid = false;
        } else {
          input.style.borderColor = '#ddd';
        }
      });
      
      if (!isValid) {
        e.preventDefault();
        alert('Harap lengkapi semua field yang wajib diisi!');
      }
    });
  </script>
</body>
</html>