<?


$filename = $_GET['board_url'];
$reail_filename = urldecode($_GET['real_filename']);
$file_dir = "../upload/" . $filename;

header('Content-Type: application/x-octetstream');
header('Content-Length: ' . filesize($file_dir));
header('Content-Disposition: attachment; filename=' . $reail_filename);
header('Content-Transfer-Encoding: binary');

$fp = fopen($file_dir, "r");
fpassthru($fp);
fclose($fp);

?>
