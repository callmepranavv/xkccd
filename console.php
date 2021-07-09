
<?php
$cmd = "php checkmail.php";
$outputPath = '/dev/null';
$cmd = "$cmd > $outputPath &";
$sleep = 300; //$input->getOption('sleep');
 
while (true) {
    exec($cmd);
    sleep($sleep);
}
?>
