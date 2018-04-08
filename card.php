<?php 
try { 
  $conn = new PDO("sqlsrv:server = tcp:asus19.database.windows.net,1433; Database = dengi", "ram", "Rosbank20");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE Card ( 
id INT NOT NULL IDENTITY(1,1) 
PRIMARY KEY (Ncard), 
Ncard varchar(30) NOT NULL, 
Balance INT NOT NULL, 
Phone varchar(30) NOT NULL 

)"; 

$sql1 = "ALTER TABLE Card ADD CONSTRAINT Card_fk0 FOREIGN KEY (id) REFERENCES Klient(id)"; 
$conn->query($sql); 
$conn->query($sql1); 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
?>
