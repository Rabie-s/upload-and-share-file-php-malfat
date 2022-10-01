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



function titleChanger($title)
{

    $output = ob_get_contents();
    if (ob_get_length() > 0) {
        ob_end_clean();
    }
    $patterns = array("/<title>(.*?)<\/title>/");
    $replacements = array("<title>$title</title>");
    $output = preg_replace($patterns, $replacements, $output);
    echo $output;
}
