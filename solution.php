<?php

class person {
    protected $firstName, $lastName, $id;
    
    public function __construct($first_name, $last_name, $identification) {
        $this->firstName = $first_name;
        $this->lastName = $last_name;
        $this->id = $identification;
    }
    
    function printPerson() {
        print("Name: {$this->lastName}, {$this->firstName}\n");
        print("ID: {$this->id}\n");
    }
}
class Student extends person {
    private $testScores;
  
    /*	
    *   Class Constructor
    *   
    *   Parameters:
    *   firstName - A string denoting the Person's first name.
    *   lastName - A string denoting the Person's last name.
    *   id - An integer denoting the Person's ID number.
    *   scores - An array of integers denoting the Person's test scores.
    */
    // Write your constructor here
    public function __construct($firstname, $lastname, $id, $scores)
    {
        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->id = $id;
        $this->testScores = $scores;
    }
    /*	
    *   Function Name: calculate
    *   Return: A character denoting the grade.
    */
    // Write your function here
    public function calculate()
    {
        $i=0;$grade="";$tot=0.0;
       foreach ($this->testScores as $value)
       {
           $tot = $tot +$value;
           $i++;
       } 
       $tot = $tot/$i;
       $tot = number_format($tot,0);
       $value = $tot;
       if($value>=90 && $value<=100){
           $grade = "O";
       }elseif($value>=80 && $value<90){
           $grade = "E";
       }elseif($value>=70 && $value<80){
           $grade = "A";
       }elseif($value>=55 && $value<70){
           $grade = "P";
       }elseif($value>=40 && $value<55){
           $grade = "D";
       }elseif($value<40){
           $grade = "T";
       }else{
           $grade = "hi";
       }
        return $grade;
    }
}


$file = fopen("php://stdin", "r");

$name_id = explode(' ', fgets($file));

$first_name = $name_id[0];
$last_name = $name_id[1];
$id = (int)$name_id[2];

fgets($file);

$scores = array_map(intval, explode(' ', fgets($file)));

$student = new Student($first_name, $last_name, $id, $scores);

$student->printPerson();

print("Grade: {$student->calculate()}");
