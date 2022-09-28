<?php
require_once("dbConfig.php");

class file extends connect{

    public function upload($file_name,$unique_name,$isPublic,$fileSize,$user_id){


        $sql = "INSERT INTO `files`(`file_name`, `unique_name`,`isPublic`,`fileSize`,`user_id`) VALUES (?,?,?,?,?)";

        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1, $file_name);
        $stmt->bindValue(2, $unique_name);
        $stmt->bindValue(3, $isPublic);
        $stmt->bindValue(4, $fileSize);
        $stmt->bindValue(5, $user_id);
        $stmt->execute();

    }
    

    public function deleteFile($file_id){
        $sql = "DELETE FROM `files` WHERE id = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$file_id);
        $stmt->execute();
    }


    public function fetchFiles($user_id){
        $sql = "SELECT * FROM `files` WHERE user_id = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function fetchUserStorage($user_id){
        $sql = "SELECT SUM(`fileSize`) FROM files WHERE user_id=?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        $userStorage = $stmt->fetchColumn();

        return $userStorage;
    }

    public function checkUserMaxStorage($user_id,$maxStorage){
        //SELECT SUM(`fileSize`) FROM files WHERE user_id=28; 
        $sql = "SELECT SUM(`fileSize`) FROM files WHERE user_id=?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        
        $userStorage = $stmt->fetchColumn();

        if($userStorage>$maxStorage){
            return false;
        }
        return true;


    }


    public function userStorage($user_id){
        //SELECT SUM(`fileSize`) FROM files WHERE user_id=28; 
        $sql = "SELECT SUM(`fileSize`) FROM files WHERE user_id=?";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        
        $userStorage = $stmt->fetchColumn();

        return $userStorage;


    }


    

}