<?php 
$dsn = ""; 
$login = ""; 
$pass = ""; 
try { 
try {
    $conn = new PDO("sqlsrv:server = tcp:asus19.database.windows.net,1433; Database = dengi", "ram", "Rosbank20");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE ИмяТвоейТаблицы( 
id INT NOT NULL IDENTITY(1,1), 
PRIMARY KEY(id), 
name VARCHAR(50))"; /* описываеш свои переменные и какой тип у них */ 
$conn->query($sql); 

echo '<div style = "color: blue; text-align: center;">Таблица создана!</div><hr>'; 
} 
catch (PDOException $e) { 
print("Ошибка подключения к SQL Server."); 
die(print_r($e)); 
} 
?>
