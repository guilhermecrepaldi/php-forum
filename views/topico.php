<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title><?=htmlspecialchars($topico["titulo"])?></title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#e9ecef}
header{background:#343a40;color:white;padding:15px 30px}header a{color:white;text-decoration:none}
.container{max-width:800px;margin:20px auto;padding:0 20px}
.post{border:1px solid #dee2e6;border-radius:6px;margin-bottom:15px;display:flex}
.post-side{background:#f8f9fa;padding:15px;width:150px;text-align:center;border-right:1px solid #dee2e6;border-radius:6px 0 0 6px}
.post-side strong{display:block;margin-bottom:5px}.post-side small{color:#999}
.post-body{flex:1;padding:15px;background:white;border-radius:0 6px 6px 0;line-height:1.6}
.post-body .data{color:#999;font-size:0.85em;margin-bottom:10px}
form{background:white;padding:20px;border-radius:6px;border:1px solid #dee2e6;margin-top:20px}
textarea,input[type=text]{width:100%;padding:10px;margin:5px 0;border:1px solid #ddd;border-radius:4px}
textarea{height:120px}button{background:#007bff;color:white;border:none;padding:10px 20px;border-radius:4px;cursor:pointer}
h1{font-size:1.4em;margin-bottom:15px}a{color:#007bff}</style></head>
<body><header><a href="?page=home">&larr; Forum</a></header>
<div class="container"><div class="post">
<div class="post-side"><strong><?=htmlspecialchars($topico["nome"])?></strong></div>
<div class="post-body"><div class="data"><?=date("d/m/Y H:i",strtotime($topico["criado_em"]))?></div>
<?=nl2br(htmlspecialchars($topico["conteudo"]))?></div></div>
<?php foreach($respostas as $r):?><div class="post">
<div class="post-side"><strong><?=htmlspecialchars($r["nome"])?></strong></div>
<div class="post-body"><div class="data"><?=date("d/m/Y H:i",strtotime($r["criado_em"]))?></div>
<?=nl2br(htmlspecialchars($r["conteudo"]))?></div></div>
<?php endforeach;?>
<?php if(isset($_SESSION["user_id"])):?><form method="POST" action="?page=responder&id=<?=$id?>">
<h3>Responder</h3><textarea name="conteudo" required></textarea><button type="submit">Enviar</button></form>
<?php else:?><p style="text-align:center;padding:20px;color:#999"><a href="?page=login">Entre</a> para responder</p>
<?php endif;?></div></body></html>
