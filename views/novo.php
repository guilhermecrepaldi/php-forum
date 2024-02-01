<?php if(!isset($_SESSION["user_id"])){header("Location: ?page=login");exit;}?>
<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Novo Topico</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#e9ecef}
header{background:#343a40;color:white;padding:15px 30px}header a{color:white;text-decoration:none}
.container{max-width:600px;margin:30px auto;padding:0 20px}
form{background:white;padding:30px;border-radius:6px;box-shadow:0 2px 5px rgba(0,0,0,0.1)}
input,textarea{width:100%;padding:10px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
textarea{height:200px}button{width:100%;padding:12px;background:#007bff;color:white;border:none;border-radius:4px;cursor:pointer}
h1{margin-bottom:15px}</style></head>
<body><header><a href="?page=home">&larr; Voltar</a></header>
<div class="container"><form method="POST" action="?page=novo">
<h1>Novo Topico</h1><input type="text" name="titulo" placeholder="Titulo" required>
<textarea name="conteudo" placeholder="Conteudo" required></textarea>
<button type="submit">Publicar</button></form></div></body></html>
