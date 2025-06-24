<!DOCTYPE html>
<html>
<head>
  <title>Form Absensi Murid</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 900px;
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

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #555;
    }

    input[type="date"] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 6px;
      width: 250px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    select {
      padding: 8px 10px;
      font-size: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 12px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-right: 10px;
    }

    button:hover {
      background-color: #3d8b40;
    }

    .navigation {
      margin-top: 20px;
    }

    .navigation a button {
      background-color: #6c757d;
    }

    .navigation a button:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Absensi Murid</h2>

    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert-success">
        <?php echo $this->session->flashdata('sukses'); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('murid/simpan_absen'); ?>">
      <label for="tanggal">Tanggal:</label>
      <input type="date" name="tanggal" required>

      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($murid as $m): ?>
            <tr>
              <td><?php echo $m->nama_murid; ?></td>
              <td><?php echo $m->kelas; ?></td>
              <td>
                <select name="status[<?php echo $m->id; ?>]">
                  <option value="Hadir">Hadir</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Alpa">Alpa</option>
                </select>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <button type="submit">Simpan Absensi</button>
    </form>

    <div class="navigation">
      <a href="<?php echo site_url('dashboard'); ?>">
        <button type="button">Kembali ke Dashboard</button>
      </a>
      <a href="<?php echo site_url('murid/rekap'); ?>">
        <button type="button">Lihat Rekap Absensi</button>
      </a>
    </div>
  </div>
</body>
</html>
