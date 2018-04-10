<html>
<head>
<Title>Данные отправителя</Title>
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
<h1>Данные отправителя</h1>
<form method="post" action="index.php" enctype="multipart/form-data" >
	<input type ="text" name ="email" id ="email" placeholder ="Ваша фамилия..">
<input type ="text" name ="name" id ="name" placeholder ="Введите ваше имя">
<input type ="text" name ="country" id ="country" placeholder ="Ваша отчество..">
  <input type ="submit" name ="submit" value ="Проверка данных">
<input type="button" value="Далее" name="buttonreg" onClick="but1()" />
		       
	<script>
function but1()
{
     window.location = "per.php"
}
</script>		
</form>

<?php
$dsn = "sqlsrv:server = tcp:asus19.database.windows.net,1433; Database = dengi";
$username = "ram";
$password = "Rosbank20";
try {
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Ошибка подключения к SQL Server.");
die(print_r($e));
}
if(!empty($_POST)) {
try {
$name = $_POST['name'];
$email = $_POST['email'];
$date = date("Y-m-d");
$country = $_POST['country'];
if ($name == "" || $email == "" || $country == "") {
echo "<h3>Не заполнены поля имя и фамилия и отчество.</h3>";
}
else {
$sql_insert ="INSERT INTO registration_on (name, email, date, country) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $date);
$stmt->bindValue(4, $country);
$stmt->execute();
echo "<h3>Нажмите далее!</h3>";
}
}
catch(Exception $e) {
die(var_dump($e));
}
}
$sql_select = "SELECT *registration_on";
$stmt = $conn->query($sql_select);
$stmt->execute();
if(isset($_POST['filter'])) {
$gender = $_POST['country'];
$sql_select = "SELECT * FROM registration_on WHERE country like :country";
$stmt = $conn->prepare($sql_select);
$stmt->execute(array(':country'=>$country.'%'));
}
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>Люди, которые оставили заявки на перевод денег.:</h2>";
echo "<table>";
echo "<tr><th>Name</th>";
echo "<th>famil</th>";
echo "<th>Country</th>";
echo "<th>Date</th></tr>";
foreach($registrants as $registrant) {
echo "<td>".$registrant['name']."</td>";
echo "<td>".$registrant['email']."</td>";
echo "<td>".$registrant['country']."</td>";
echo "<td>".$registrant['date']."</td></tr>";
}
echo "</table>";
}
else {
echo "<h3>В настоящее время никто не оставил заявку.</h3>";
}
?>


