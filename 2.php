<?
if($curret=file_get_contents('money')){$curret=(integer)$curret;}else{$curret=0;}
if(isset($_POST['money']) and (integer)$_POST['money'])
{
    if($file=fopen('money','w'))
    {
        fwrite($file,$curret-(integer)$_POST['money']);
        fclose($file);
    }
}
?>

<form action="" method="post">
    <input type="text" name="money" /> <input type="submit" value="добавить нажмите 2 раза" />
    </form>
 <input type="button" value="Далее" name="buttonreg" onClick="but1()" />
		       
	<script>
function but1()
{
     window.location = "ostbal.php"
}
</script>		
</form>

</form>
<?if($curret){?><div>Ваш баланс: <?echo $curret;?></div><?}?> 
