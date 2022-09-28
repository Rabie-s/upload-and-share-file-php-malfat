<?php

require_once("dbConfig.php");

class user extends connect{
    
    public function userInsert($name,$email,$password){
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
        $stmt->execute();
    }
    //"admin@gmail.com"

    public function login($email,$password){
        //SELECT * FROM `users` WHERE name = ? AND password = ?
        $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$email);
        $stmt->bindValue(2,$password);
        $stmt->execute();
      
        $count = $stmt->rowCount();
        if($count > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
            } 
            return true;
        }
        return false;
        

    }
    

    //check if email exists 
    public function existsEmail($email){
        $sql = 'SELECT * FROM `users` WHERE email = ?';
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return true;
        }
        return false;
    }

        //check if email exists 
        public function existsUser($userId){
            $sql = 'SELECT * FROM `users` WHERE id = ?';
            $stmt = self::$db->prepare($sql);
            $stmt->bindValue(1,$userId);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return true;
            }
            return false;
        }


    public function updateVerifyCode($verifyCode,$email){
        //UPDATE `users` SET `verifyCode`='12123' WHERE email = 'admin@gmail.com';

        $sql = "UPDATE `users` SET `verifyCode`= ? WHERE email = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$verifyCode);
        $stmt->bindValue(2,$email);
        $stmt->execute();

    }


    public function checkVerifyCode($verifyCode,$email){
        $sql = 'SELECT * FROM `users` WHERE verifyCode = ? AND email = ?';
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$verifyCode);
        $stmt->bindValue(2,$email);
        $stmt->execute();
        
        if(!$stmt->rowCount() > 0){
            return false;
        }
        return true;
        
    }


    public function updatePassword($newPassword,$email){

        $sql = "UPDATE `users` SET `password`= ? WHERE email = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$newPassword);
        $stmt->bindValue(2,$email);
        $stmt->execute();

    }


    public function fetchUser($userId){
        $sql = "SELECT * FROM `users` WHERE id = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$userId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }



    


    

    

    



}