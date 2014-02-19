<?php
//a.php
include 'student.class.php';

$student = new Student('bla bla', 'a', array('a' => 90, 'b' => 100));
$student->show();
echo "<br />\n";
$s = serialize($student);
echo $s ."<br />\n";
$fp = fopen('./uploads/session.txt', 'w');
fwrite($fp, $s);
fclose($fp);
?>
