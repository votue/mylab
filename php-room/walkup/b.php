<?php
//b.php
include 'student.class.php';

$s = implode('', file("./uploads/session.txt"));
echo $s ."<br />\n";
$a = unserialize($s);
$a->show();
?>