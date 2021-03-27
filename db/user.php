<?php 

class user{
        //private database object
        private $db;

        //constructor to initialize private varialbe to the database connection
        public function __construct($conn)
        {
            $this->db = $conn;
        }
        
        public function insertUser($userName,$password){
            try {
                $result=$this->getUserByUserName($userName);
                if($result['num']>0){
                    return false;
                }else{
                    $new_password = md5($password.$userName);
                        //define sql statement to be executed
                        $sql = "INSERT INTO users (userName,password) VALUES (:userName,:password)";
            
                        //prepare the sql statement for execution
                        $stmt = $this->db->prepare($sql);
            
                        //bind all placeholders to the actual values
            
                        $stmt->bindparam(':userName', $userName);
                        $stmt->bindparam(':password', $new_password);
            
                        //execute statement
                        $stmt->execute();
                        return true;
                     }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($userName,$password){
            try {
                $sql= "select * from users where userName = :userName and password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':userName', $userName);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
    
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
                
            }
        }


        public function getUserByUserName($userName){
            try {
                $sql= "select count(*) as num from users where userName = :userName";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':userName', $userName);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
    
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
                
            }
        }

}

?>