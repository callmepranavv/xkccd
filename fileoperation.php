<?php
if(isset($_POST['create_file']))
{
 $create_file = fopen("stop.txt");
 fclose($create_file);
}

if(isset($_POST['delete_file']))
{
    if(file_exists('stop.txt'))
    {
         unlink("stop.txt");
    }
}
?>