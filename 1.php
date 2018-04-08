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
echo "<h3>Не заполнены поля name и famil.</h3>";
}
else {
$sql_insert ="INSERT INTO registration_on (name, email, date, country) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $date);
$stmt->bindValue(4, $country);
$stmt->execute();
echo "<h3>Вы зарегистрировались!</h3>";
}
}
catch(Exception $e) {
die(var_dump($e));
}
}
$sql_select = "SELECT * FROM registration_on";
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
