<?php
$dataFile = 'data.txt';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $entry = "Имя: $name\nEmail: $email\nСообщение: $message\n\n";
    file_put_contents($dataFile, $entry, FILE_APPEND);
}

$messages = file_exists($dataFile) ? file($dataFile) : []; 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .message { background: #f9f9f9; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<h1>Гостевая книга</h1>

<form method="post">
    <input type="text" name="name" placeholder="Ваше имя" required><br>
    <input type="email" name="email" placeholder="Ваш email" required><br>
    <textarea name="message" placeholder="Ваше сообщение" required></textarea><br>
    <button type="submit">Отправить</button>
</form>

<h2>Сообщения:</h2>
<?php foreach ($messages as $msg): ?>
    <div class="message"><?php echo nl2br(htmlspecialchars($msg)); ?></div>
<?php endforeach; ?>

</body>
</html>