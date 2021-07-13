<?php

// DB 연결 정보
$db_user = "rikarsong";
$db_pass = "rikar0217@@";
$db_host = "localhost";
$db_name = "rikarsong";
$db_type = "mysql";
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
    // DB 연결
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    print "접속하였습니다.";
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}

// DB에 데이터 입력

try {
// record_id의 현재 최대값을 가져와 +1을 한 뒤 앞으로 입력할 기록에 할당
// identifier는 record_id에 WP_를 붙여 사용
    $sql = "SELECT record_id FROM rikarsong.record";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $biggest_record_id = $stmh->rowCount();
    $record_id = $biggest_record_id + 1;
    $identifier = "WP_" . $record_id;

    // 파일 업로드
    // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
    // 원격 웹 호스팅 환경
    $upload_file_dir = '../upload/';

    // 파일이 이동할 경로
    $upload_file_path = $upload_file_dir . $identifier . '_' . $_FILES["uploadfile"]["name"];


    // 파일 이동
    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $upload_file_path)) {
        $file_dir = "upload/";
        $file_path = $file_dir . $_FILES["uploadfile"]["name"];
        $size = filesize($upload_file_path);


    }
//    print "등록이 완료되었습니다." . $upload_file_path;
    if ($_FILES['uploadfile']['name'] == null) {
        $upload_file_path = null;
    }

    // 트랜잭션 시작
    $pdo->beginTransaction();
    $sql = "INSERT INTO rikarsong.record (identifier, record_id, title, creator, collector, date_from, date_to, extent, medium, scope, type, description, level_of_description, url)
            VALUES (:identifier, :record_id, :title, :creator, :collector, :date_from, :date_to, :extent, :medium, :scope, :type, :description, 'item', :url)";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':identifier', $identifier, PDO::PARAM_STR);
    $stmh->bindValue(':record_id', $record_id, PDO::PARAM_STR);
    $stmh->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
    $stmh->bindValue(':creator', $_POST['creator'], PDO::PARAM_STR);
    $stmh->bindValue(':collector', $_POST['collector'], PDO::PARAM_STR);
    $stmh->bindValue(':date_from', $_POST['date_from'], PDO::PARAM_STR);
    $stmh->bindValue(':date_to', $_POST['date_to'], PDO::PARAM_STR);
    $stmh->bindValue(':extent', $_POST['extent'], PDO::PARAM_STR);
    $stmh->bindValue(':medium', $_POST['medium'], PDO::PARAM_STR);
    $stmh->bindValue(':scope', $_POST['scope'], PDO::PARAM_STR);
    $stmh->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
    $stmh->bindValue(':description', $_POST['record_description'], PDO::PARAM_STR);
    $stmh->bindValue(':url', $upload_file_path, PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();

    $afterAction = $_POST['afterAction'];
    if ($afterAction == "more_regist") {
        Header("Location:https://rikarsong.cafe24.com/wap/register.html");
    } else {
        Header("Location:https://rikarsong.cafe24.com/wap/index.html");
    }
} catch (Exception $exception) {
    $pdo->rollBack();
    print "오류: " . $exception->getMessage();
}
