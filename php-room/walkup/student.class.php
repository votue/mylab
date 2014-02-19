<h1>__wakeup magic methods...</h1>
<h2> Auto call when use function serialize (sleep) and unserialize(walkup)
<?php
//student.class.php
class Student{
    private $full_name = '';
    private $score = 0;
    private $grades = array();
   
    public function __construct($full_name, $score, $grades)
    {
        $this->full_name = $full_name;
        $this->grades = $grades;
        $this->score = $score;
    }
   
    public function show()
    {
        echo $this->full_name;
    }
   
    function __sleep()
    {
        //call after init
        echo 'Going to sleep...';
        return array('full_name', 'grades', 'score');
    }
   
    function __wakeup()
    {
        // call before init
        echo 'Waking up...';
    }
}
?>
