<?php
class Courses {
    //Database
    //Properties
    private $db;
    private $id;
    private $code;
    private $name;
    private $progression;
    private $syllabus;

    //Constructor
    function __construct(){
        //Connect
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0){
            die("Fel vid anslutning: " . $this->db->connect_error);
        } 

    }
  
    //Read/show/view courses
   function viewCourse(){
        $sql = "SELECT * FROM kurser";  

        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    //Create course
    function createCourse($code, $name, $progression, $syllabus){
        $sql = "INSERT INTO kurser (code, name, progression, syllabus) 
        VALUES('$code', '$name', '$progression', '$syllabus')";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;
    }



    //Update course
    function updateCourse($code, $name, $progression, $syllabus, $id){
        $sql = "UPDATE kurser SET code = '$code', name = '$name', 
        progression = '$progression', syllabus = '$syllabus'
        WHERE ID = $id";
        $result = mysqli_query($this->db, $sql) or die('Fel vid SQL-fråga');
        return $result;

    }


    //Delete Course

    function deleteCourse($id){
        $sql = "DELETE FROM kurser WHERE id = $id";
        return $this->db->query($sql);
               

    }

    
}
