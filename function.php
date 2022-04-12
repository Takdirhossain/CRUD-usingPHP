<?php
    Class CrudApp{
        private $conn;
        public function __construct(){
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'crudapp';
            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            if(!$this->conn){
                die ("DB Connection Error");
            }
        }
        public function add_data($data){
            $std_name = $data['sdt_name'];
            $std_roll = $data['sdt_roll'];
            $std_img  = $_FILES['std_img']['name'];
            $tmp_name = $_FILES['std_img']['tmp_name'];

            $query = "INSERT INTO students(std_name, std_roll, std_img)VALUE('$std_name', $std_roll, '$std_img')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'. $std_img);
                return "Data Submit Success";
            }
        }

        public function display_data(){
            $query = "SELECT * from students";
            if(mysqli_query($this->conn, $query)){
                $retundata = mysqli_query($this->conn, $query);
                return $retundata;

            }
        }

        public function display_data_by_id($id){
            $query = "SELECT * from students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                $retundata = mysqli_query($this->conn, $query);
                $retundata = mysqli_fetch_assoc($retundata);
                return $retundata;

            }
        }

        public function update_data($data){
            $std_name = $data['u_sdt_name'];
            $std_roll = $data['u_sdt_roll'];
            $idno = $data['std_id'];
            $std_img = $_FILES['u_std_img']['name'];
            $tmp_name = $_FILES['u_std_img']['tmp_name'];

            $query = "UPDATE students SET std_name='$std_name', std_roll='$std_roll', std_img='$std_img' WHERE id=$idno";
            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'. $std_img);
                return "Information Update successfully";
            }
        }
  
        public function delete_data($id){
            $query = "DELETE FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                return "Delete data successfully";
            }
            
        }
    }