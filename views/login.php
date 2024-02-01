<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Login</title>
<style>body{font-family:Arial;display:flex;justify-content:center;align-items:center;height:100vh;background:#e9ecef}
.card{background:white;padding:40px;border-radius:8px;width:360px;box-shadow:0 2px 10px rgba(0,0,0,0.1)}
h1{text-align:center;margin-bottom:20px}input{width:100%;padding:12px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
button{width:100%;padding:12px;background:#007bff;color:white;border:none;border-radius:4px;cursor:pointer}
p{text-align:center;margin-top:15px}a{color:#007bff}.erro{color:#dc3545;text-align:center}</style></head>
<body><div class="card"><h1>Login</h1>
<?php if(isset($erro)):?><div class="erro"><?=$erro?></div><?php endif;?>
<form method="POST"><input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit">Entrar</button></form><p><a href="?page=registrar">Criar conta</a></p></div></body></html>
