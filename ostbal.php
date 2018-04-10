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
   <h3>Вы успешно перевели деньги.</h3>
<?if($curret){?><div>Ваш остаток баланса: <?echo $curret;?></div><?}?> 
  
