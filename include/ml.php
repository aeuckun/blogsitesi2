<?php 
 $command = escapeshellcmd('python C:\xampp\htdocs\blogsitesi2\importfeedparser.py');
    $output = shell_exec($command);
    echo $output;
 
 $targetUrl = "http://localhost/blogsitesi2/";


 header("Location: " . $targetUrl);
 exit;
 ?>
 