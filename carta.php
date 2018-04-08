<html>
<head>
<Title>Перевод денежных средств</Title>
<style type="text/css">
body { background-color:
#fff; border-top: solid 10px #000;
color: #333; font-size: .85em;
margin: 20; padding: 20;
font-family: "Segoe UI",
Verdana, Helvetica, Sans-Serif;
}
h1, h2, h3,{ color: #000;
margin-bottom: 0; padding-bottom: 0; }
h1 { font-size: 2em; }
h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em;
text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em;
border: 0 none; }
</style>
</head>
<body>
<h1>Перевод денежных средств</h1>
<p>Fill in your name and
email address, then click <strong>Submit</strong>
to register.</p>
<form method="post" action="index.php" enctype="multipart/form-data" >
<input type ="text" name ="Ncard" id ="Ncard" placeholder ="Введите ваше имя">
<input type ="text" name ="Balance" id ="Balance" placeholder ="Ваша фамилия..">
  <input type ="text" name ="Phone" id ="Phone" placeholder ="Ваша фамилия..">
<select name="country">
<option value="">All</option>
<option value="Russia">Russia</option>
<option value="USA">USA</option>
<option value="Germany">Germany</option>
<option value="Japan">Japan</option>
<option value="China">China</option>
</select>
<input type ="submit" name ="submit" value ="Отправить">
<input type="submit" name="filter" value="Фильтр">
</form>
<?php 
try { 
$conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1"); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


for($i = 4;$i<10;$i++) 
{ 
$sql_in = 
"INSERT INTO Card (Ncard, Balance,Phone) 
VALUES (?,?,?)"; 
$stmt = $conn->prepare($sql_in); 
$stmt->bindValue(1, "427612345678910".$i); 
$stmt->bindValue(2, 10000); 
$stmt->bindValue(3, "8999999999".$i); 
$stmt->execute(); 
} 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
?>
