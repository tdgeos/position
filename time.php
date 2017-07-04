<?php
echo gmmktime()."<br/>";
echo time()."<br/>";
$dateflag=gmdate('Ymd',gmmktime()+8*3600); 
echo $dateflag;
?>