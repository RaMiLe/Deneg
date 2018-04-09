<html> 
<head> 
<meta charset="itf-8"> 
Привяу 

</head> 
<body> 
<form method="POST"> 
<input type="submit" name="nazvanie_knopki" value="Нажмите" /> 
</form> 
</body> 
</html> 

<?php 
if( isset( $_POST['nazvanie_knopki'] ) ) 
{ 

echo 'Кнопка нажата!'; 
} 

?>
