<?php
function redirect($page)
{
    header("Location: " . $page);
    exit();
}

function download($file, $path, $realName)
{
    //$filename = basename($_GET['file']);
    $filename = basename($file);
    $filepath = $path . '/' . $filename;
    if (!empty($filename) && file_exists($filepath)) {

        //Define Headers
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=$realName");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filepath);
        exit;
    }
}




/* function download($file, $path,$realName){
    //$filename = basename($_GET['file']);
    $filename = basename($file);
    $filepath = $path . '/' . $filename;
    if (!empty($filename) && file_exists($filepath)) {

        //Define Headers
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$realName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filepath);
        exit;
    }
} */
