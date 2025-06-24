<!DOCTYPE html>
<html>
<head>
  <title>Login Guru</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .container {
      background-color: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 380px;
      max-width: 90%;
      transition: transform 0.3s ease;
    }
    
    .container:hover {
      transform: translateY(-5px);
    }
    
    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
      font-size: 28px;
      font-weight: 600;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
      font-weight: 500;
    }
    
    input {
      width: 100%;
      padding: 12px 15px;
      border-radius: 6px;
      border: 1px solid #ddd;
      font-size: 16px;
      transition: border 0.3s ease;
      box-sizing: border-box;
    }
    
    input:focus {
      border-color: #4CAF50;
      outline: none;
      box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }
    
    button {
      width: 100%;
      padding: 14px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      margin-top: 10px;
    }
    
    button:hover {
      background-color: #3d8b40;
      transform: translateY(-2px);
    }
    
    button:active {
      transform: translateY(0);
    }
    
    .error {
      color: #e74c3c;
      text-align: center;
      margin-bottom: 20px;
      padding: 10px;
      background-color: #fde8e8;
      border-radius: 6px;
      font-size: 14px;
    }
    
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #7f8c8d;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Guru</h2>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('auth/login'); ?>">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username">
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password">
      </div>
      
      <button type="submit">Login</button>
      
      <div class="footer">
        For authorized personnel only
      </div>
    </form>
  </div>
</body>
</html>