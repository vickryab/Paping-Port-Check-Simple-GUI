<?php
$hostname = $_POST['hostname'];
$port = $_POST['port'];
//$hostname = "127.0.0.1";
//$port = "80";
$count = $_POST['count'];
$command = "paping $hostname -p $port -c $count";

$output = shell_exec($command);
echo json_encode(array(
    "hostname" => $hostname,
    "port" => $port,
    "result" => $output
));
?>
