<?php

for($i =0 ; $i<count($_REQUEST['contact']); $i++)
{
    if($i == count($_REQUEST['contact'])-1)
    {
    $ToMail .= $_REQUEST['contact'][$i];    
    }else{
        $ToMail .= $_REQUEST['contact'][$i].',';
    }
    
}
echo $ToMail;
?>