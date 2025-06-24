<!DOCTYPE html>
<html>
<head>
  <title>Edit Murid</title>
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
      transition: all 0.3s ease;
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
    
    .action-links {
      margin-top: 25px;
      text-align: center;
    }
    
    .back-link {
      display: inline-block;
      padding: 10px 20px;
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
    
    .hidden-id {
      opacity: 0.6;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Data Murid</h2>

    <form method="post" action="<?php echo site_url('murid/update'); ?>">
      <input type="hidden" name="id" value="<?php echo $murid->id; ?>">
      <div class="hidden-id">ID Murid: <?php echo $murid->id; ?></div>

      <div class="form-group">
        <label class="required-field">Nama Murid</label>
        <input type="text" name="nama_murid" value="<?php echo htmlspecialchars($murid->nama_murid); ?>" required placeholder="Nama lengkap murid">
      </div>

      <div class="form-group">
        <label class="required-field">NIS</label>
        <input type="text" name="nis" value="<?php echo htmlspecialchars($murid->nis); ?>" required placeholder="Nomor Induk Siswa">
      </div>

      <div class="form-group">
        <label class="required-field">Kelas</label>
        <select name="kelas" required>
          <?php foreach ($kelas as $k): ?>
            <option value="<?php echo $k; ?>" <?php echo ($k == $murid->kelas) ? 'selected' : ''; ?>>
              <?php echo $k; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit">Simpan Perubahan</button>
    </form>

    <div class="action-links">
      <a href="<?php echo site_url('murid/index'); ?>" class="back-link">← Kembali ke Daftar Murid</a>
    </div>
  </div>

  <script>
    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
      const requiredFields = document.querySelectorAll('[required]');
      let isValid = true;
      
      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          field.style.borderColor = '#e74c3c';
          isValid = false;
        } else {
          field.style.borderColor = '#ddd';
        }
      });
      
      if (!isValid) {
        e.preventDefault();
        alert('Harap lengkapi semua field yang wajib diisi!');
      }
    });

    // Show saved values in console for debugging
    console.log('Editing student:', {
      id: <?php echo $murid->id; ?>,
      nama: '<?php echo $murid->nama_murid; ?>',
      nis: '<?php echo $murid->nis; ?>',
      kelas: '<?php echo $murid->kelas; ?>'
    });
  </script>
</body>
</html>