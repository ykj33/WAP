<?php

echo "넘어온 값" . $_GET['file'] . "\n";

$get_filename = $_GET['file'];
$set_filename = substr($get_filename, 17,-1);
echo "파일 이름" . $set_filename . "\n";
$target_dir = substr($get_filename, 4, 12);
echo "위치" . $target_dir . "\n";
$file = $_SERVER['DOCUMENT_ROOT'] . "\\" . $target_dir . "\\" . $set_filename;
echo "파일 주소" . $file . "\n";


if (is_file($file)) {

    echo "파일 다운로드";
    header('Content-Type: application/x-octetstream');
    header('Content-Length: ' . filesize($file));
    header("Content-Disposition: attachment; filename=$set_filename");
    header('Content-Transfer-Encoding: binary');
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: public");
    header("Expires: 0");

    $fp = fopen($file, "r");
    fpassthru($fp);
    fclose($fp);
} else {
    echo "파일이 없습니다.";
}
?>