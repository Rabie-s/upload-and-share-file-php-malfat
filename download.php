<?php

require_once('core/init.php');
//checkSession(BU."login.php");



if(isset($_GET['user_id']) and isset($_GET['is_public']) and isset($_GET['unique_name']) ){

    $userId = base64_decode($_GET['user_id']);
    $isPublic = base64_decode($_GET['is_public']);
    $file = base64_decode($_GET['unique_name']);
    $fileName = base64_decode($_GET['file_name']);

    if(!$isPublic==0){//
        download($file,'uploads',$fileName);//download from server
    }else{

        if(!isset($_SESSION['id'])){
            echo "You can't downland";
        }else{
            if($userId == $_SESSION['id']){
                download($file,'uploads',$fileName);//download from server 
            }else{
                echo"The file is privet";
            }
        }



    }
}








/* if(isset($_GET['unique_name']) and isset($_GET['user_id']) and isset($_GET['is_public'])){
    $userId = base64_decode($_GET['user_id']);
    $fileName = base64_decode($_GET['file_name']);
    $isPublic = base64_decode($_GET['is_public']);
    $file = base64_decode($_GET['unique_name']);

    if(!$isPublic==0){
        download($file,'uploads',$fileName);//download from server
    }else{
        if($userId == $_SESSION['id']){
            download($file,'uploads',$fileName);//download from server 
        }else{
            echo "fauk you";
        }
    }

    


    

} */


    /* if($userId == $_SESSION['id']){
        $file = base64_decode($_GET['unique_name']);

        download($file,'uploads',$fileName);//download from server 
    }else{
        echo "Fauk you";
    } */