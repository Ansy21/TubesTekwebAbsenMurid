<!DOCTYPE html>
<html>
<head>
  <title>Rekap Absensi</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 1000px;
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

    form {
      margin-bottom: 30px;
    }

    label {
      font-weight: 500;
      margin-right: 10px;
    }

    select,
    input[type="date"] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-right: 15px;
    }

    button {
      padding: 10px 18px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-right: 10px;
    }

    button:hover {
      background-color: #3d8b40;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th {
      background-color: #f0f0f0;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    .navigation {
      margin-top: 30px;
      text-align: center;
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
    <h2>Rekap Absensi Murid</h2>

    <form method="get">
      <label for="kelas">Kelas:</label>
      <select name="kelas">
        <option value="">-- Semua Kelas --</option>
        <?php foreach ($kelas as $k): ?>
          <option value="<?php echo $k; ?>" <?php echo ($k == $kelas_aktif) ? 'selected' : ''; ?>>
            <?php echo $k; ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label for="tanggal">Tanggal (opsional):</label>
      <input type="date" name="tanggal" value="<?php echo $tanggal; ?>">

      <button type="submit">Tampilkan</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Nama Murid</th>
          <th>Kelas</th>
          <th>Hadir</th>
          <th>Sakit</th>
          <th>Izin</th>
          <th>Alpa</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rekap as $r): ?>
          <tr>
            <td><?php echo $r->nama_murid; ?></td>
            <td><?php echo $r->kelas; ?></td>
            <td><?php echo $r->hadir; ?></td>
            <td><?php echo $r->sakit; ?></td>
            <td><?php echo $r->izin; ?></td>
            <td><?php echo $r->alpa; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="navigation">
      <a href="<?php echo site_url('dashboard'); ?>">
        <button type="button">Kembali ke Dashboard</button>
      </a>
      <a href="<?php echo site_url('murid/absen'); ?>">
        <button type="button">Tambah Absensi</button>
      </a>
    </div>
  </div>
</body>
</html>
