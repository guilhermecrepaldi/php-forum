<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Registro</title>
<style>body{font-family:Arial;display:flex;justify-content:center;align-items:center;height:100vh;background:#e9ecef}
.card{background:white;padding:40px;border-radius:8px;width:360px;box-shadow:0 2px 10px rgba(0,0,0,0.1)}
h1{text-align:center}input{width:100%;padding:12px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
button{width:100%;padding:12px;background:#28a745;color:white;border:none;border-radius:4px;cursor:pointer}
p{text-align:center;margin-top:15px}a{color:#007bff}.erro{color:#dc3545;text-align:center}</style></head>
<body><div class="card"><h1>Criar Conta</h1>
<?php if(isset($erro)):?><div class="erro"><?=$erro?></div><?php endif;?>
<form method="POST"><input type="text" name="nome" placeholder="Nome" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<input type="password" name="confirmar" placeholder="Confirmar senha" required>
<button type="submit">Registrar</button></form><p><a href="?page=login">Ja tem conta?</a></p></div></body></html>
