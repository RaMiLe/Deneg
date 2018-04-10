<?
if($curret=file_get_contents('money')){$curret=(integer)$curret;}else{$curret=0;}
if(isset($_POST['money']) and (integer)$_POST['money'])
{
    if($file=fopen('money','w'))
    {
        fwrite($file,$curret+(integer)$_POST['money']);
        fclose($file);
    }
}
?>

<?if($curret){?><div>Ваш баланс: <?echo $curret;?></div><?}?> 
