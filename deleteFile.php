<?php
require_once('core/init.php');
$file = new file();

checkSession(BU."login.php");


/*
First check if (file_id),(unique_name) and (user_id) are set in url or not.
if (file_id),(unique_name) and (user_id) are set,will store they in variables and decode it;
*/

if (isset($_GET['file_id']) and isset($_GET['unique_name']) and isset($_GET['user_id'])) {
    
    $userId = base64_decode($_GET['user_id']);

    /* 
        compare between user id from url and user id in session.
        if both are same it will delete the file
    */
     if($userId == $_SESSION['id']){
        $fileId = base64_decode($_GET['file_id']);
        $fileUniqueName = base64_decode($_GET['unique_name']);
    
        $file->deleteFile($fileId);//delete file from data base.
        unlink("uploads/".$fileUniqueName);//delete file from uploads directory.
        redirect('myFiles.php');
    }else{
        echo "Fauk you";
    } 

    

    

}
