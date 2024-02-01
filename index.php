<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=forum;charset=utf8","root","",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$page = $_GET["page"] ?? "home";
$id = (int)($_GET["id"] ?? 0);

if ($page === "topico" && $id) {
    $stmt = $pdo->prepare("SELECT t.*, u.nome FROM topicos t JOIN usuarios u ON t.user_id=u.id WHERE t.id=?");
    $stmt->execute([$id]); $topico = $stmt->fetch();
    $respostas = $pdo->prepare("SELECT r.*, u.nome FROM respostas r JOIN usuarios u ON r.user_id=u.id WHERE r.topico_id=? ORDER BY r.criado_em");
    $respostas->execute([$id]); $respostas = $respostas->fetchAll();
    require "views/topico.php";
} elseif ($page === "novo" && $_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["titulo"],$_POST["conteudo"])) {
    if (!isset($_SESSION["user_id"])) { header("Location: ?page=login"); exit; }
    $stmt = $pdo->prepare("INSERT INTO topicos (titulo, conteudo, user_id) VALUES (?,?,?)");
    $stmt->execute([$_POST["titulo"], $_POST["conteudo"], $_SESSION["user_id"]]);
    header("Location: ?page=topico&id=".$pdo->lastInsertId());
} elseif ($page === "responder" && $_POST && $id && isset($_POST["conteudo"])) {
    if (!isset($_SESSION["user_id"])) { header("Location: ?page=login"); exit; }
    $stmt = $pdo->prepare("INSERT INTO respostas (topico_id, conteudo, user_id) VALUES (?,?,?)");
    $stmt->execute([$id, $_POST["conteudo"], $_SESSION["user_id"]]);
    header("Location: ?page=topico&id=$id");
} elseif ($page === "login" && $_SERVER["REQUEST_METHOD"]==="POST") {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email=?");
    $stmt->execute([$_POST["email"]]); $user = $stmt->fetch();
    if ($user && password_verify($_POST["senha"], $user["senha"])) {
        $_SESSION["user_id"] = $user["id"]; $_SESSION["user_nome"] = $user["nome"];
        header("Location: ?page=home");
    } else $erro = "Credenciais invalidas";
} elseif ($page === "registrar" && $_SERVER["REQUEST_METHOD"]==="POST") {
    if ($_POST["senha"] !== $_POST["confirmar"]) { $erro = "Senhas nao conferem"; }
    else {
        $hash = password_hash($_POST["senha"], PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)");
        $stmt->execute([$_POST["nome"], $_POST["email"], $hash]);
        $_SESSION["user_id"] = $pdo->lastInsertId(); $_SESSION["user_nome"] = $_POST["nome"];
        header("Location: ?page=home");
    }
} elseif ($page === "logout") { session_destroy(); header("Location: ?page=home"); }
if (!in_array($page, ["topico", "novo", "responder", "login", "registrar", "logout", "home"])) $page = "404";
if ($page === "home") {
    $page_n = max(1, (int)($_GET["p"] ?? 1));
    $total = $pdo->query("SELECT COUNT(*) FROM topicos")->fetchColumn();
    $offset = ($page_n - 1) * 15;
    $topicos = $pdo->query("SELECT t.*, u.nome, (SELECT COUNT(*) FROM respostas WHERE topico_id=t.id) as resp FROM topicos t JOIN usuarios u ON t.user_id=u.id ORDER BY t.criado_em DESC LIMIT 15 OFFSET $offset")->fetchAll();
}
require "views/$page.php";
