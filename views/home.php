<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Forum PHP</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#e9ecef;color:#333}
header{background:#343a40;color:white;padding:15px 30px;display:flex;justify-content:space-between;align-items:center}
header h1{font-size:1.3em}header a{color:white;text-decoration:none;margin-left:15px}
.container{max-width:800px;margin:20px auto;padding:0 20px}
.novo-btn{display:inline-block;background:#007bff;color:white;padding:10px 20px;border-radius:4px;text-decoration:none;margin-bottom:20px}
.topico{background:white;padding:15px;margin-bottom:10px;border-radius:6px;box-shadow:0 1px 2px rgba(0,0,0,0.05);display:flex;justify-content:space-between;align-items:center}
.topico .info h3 a{color:#343a40;text-decoration:none;font-size:1.05em}
.topico .info .meta{color:#999;font-size:0.85em;margin-top:5px}
.topico .stats{text-align:center;min-width:60px;padding:5px;background:#f8f9fa;border-radius:4px}
.topico .stats span{display:block;font-weight:bold;color:#007bff}
.paginacao{text-align:center;margin:20px 0}.paginacao a{display:inline-block;padding:8px 12px;margin:0 3px;background:white;border:1px solid #ddd;border-radius:4px;text-decoration:none;color:#333}
.paginacao .ativo{background:#007bff;color:white;border-color:#007bff}
footer{text-align:center;padding:20px;color:#999}</style></head>
<body><header><a href="?page=home"><h1>Forum PHP</h1></a>
<div><?php if(isset($_SESSION["user_nome"])):?><span><?=$_SESSION["user_nome"]?></span><a href="?page=logout">Sair</a>
<?php else:?><a href="?page=login">Entrar</a><a href="?page=registrar">Cadastrar</a><?php endif;?></div></header>
<div class="container"><a class="novo-btn" href="?page=novo">+ Novo Topico</a>
<?php foreach($topicos as $t):?><div class="topico">
<div class="info"><h3><a href="?page=topico&id=<?=$t["id"]?>"><?=htmlspecialchars($t["titulo"])?></a></h3>
<div class="meta"><?=htmlspecialchars($t["nome"])?> - <?=date("d/m/Y",strtotime($t["criado_em"]))?></div></div>
<div class="stats"><span><?=$t["resp"]?></span>respostas</div></div>
<?php endforeach;?>
<div class="paginacao"><?php $tp=ceil($total/15);for($i=1;$i<=$tp;$i++):?><a href="?page=home&p=<?=$i?>" class="<?=$i==$page_n?'ativo':''?>"><?=$i?></a><?php endfor;?></div>
</div><footer>&copy; 2024 Forum PHP</footer></body></html>
