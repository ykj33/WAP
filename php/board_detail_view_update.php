<?php

include 'db_connect.php';

// DB에 데이터 입력
//$file_count = count($_FILES['uploadfile']['name']);
//if ($file_count <= 2 && $_FILES['uploadfile']['name'][1] == null) {
try {

// board_id의 현재 최대값을 가져와 +1을 한 뒤 앞으로 입력할 기록에 할당

//        $identifier = $_POST['exampleRadios'] . "_" . $_POST["date_from"] . "_" . $_POST['title'] . "_" . $record_id;

//        // 파일 업로드
//        // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
//        // 원격 웹 호스팅 환경
//        $upload_file_dir = '../upload/';
//
//        // 파일이 이동할 경로
//        $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'][0];
//
//
//        // 파일 이동
//        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"][0], $upload_file_path)) {
//            $file_dir = "upload/";
//            $file_path = $file_dir . $_FILES["uploadfile"]["name"][0];
////            $size = filesize($upload_file_path);
//        }

//    print "등록이 완료되었습니다." . $upload_file_path;
    if ($_FILES['uploadfile']['name'] == null) {
        $upload_file_path = null;
    }

    // 트랜잭션 시작
    $pdo->beginTransaction();
    $sql = "UPDATE rikarsong.board SET board_title = :board_title, board_content = :board_content WHERE board_id = :board_id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':board_title', $_POST['board_title'], PDO::PARAM_STR);
    $stmh->bindValue(':board_content', $_POST['board_content'], PDO::PARAM_STR);
    $stmh->bindValue(':board_id', $_POST['board_id'], PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    echo "<script>window.location.replace('../board_list_view.html')</script>";

} catch (Exception $exception) {
    $pdo->rollBack();
    print "오류: " . $exception->getMessage();
}