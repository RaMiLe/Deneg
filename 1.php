<?php
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
