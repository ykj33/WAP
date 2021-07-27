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

$file_count = count($_FILES['uploadfile']['name']);
if ($file_count <= 2 && $_FILES['uploadfile']['name'][1] == null) {
    try {
        $identifier = $_POST['identifier'];

        // 파일 업로드
        // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
        // 원격 웹 호스팅 환경
        $upload_file_dir = '../upload/';

        // 파일이 이동할 경로
        $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'][0];


        // 파일 이동
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"][0], $upload_file_path)) {
            $file_dir = "upload/";
            $file_path = $file_dir . $_FILES["uploadfile"]["name"][0];
//            $size = filesize($upload_file_path);
        }

//    print "등록이 완료되었습니다." . $upload_file_path;
        if ($_FILES['uploadfile']['name'] == null) {
            $upload_file_path = null;
        }

        $pdo->beginTransaction();
        $sql = "UPDATE rikarsong.record SET
                            title = :title,
                            creator = :creator,
                            collector = :collector,
                            date_from = :date_from,
                            date_to = :date_to,
                            extent = :extent,
                            medium = :medium,
                            scope = :scope,
                            type = :type,
                            description = :description,
                            url=:url,
                            kind_of = :kind_of
                WHERE record_id = :record_id";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':record_id', $_POST['record_id'], PDO::PARAM_STR);
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
        $stmh->bindValue(':kind_of', $_POST['exampleRadios'], PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        Header("Location:https://rikarsong.cafe24.com/wap/php/record_list_view.html.php");
    } catch (Exception $exception) {
        $pdo->rollBack();
        print "오류: " . $exception->getMessage();
    }
} else {
    for ($i = 0; $i < $file_count; $i++) {
        if ($_FILES['uploadfile']['name'][$i] == null) {
            break;
        } else {
            try {
                $title_number = $i + 1;
                $title = $_POST['title'] . "_" . $title_number;
                $identifier = $_POST['identifier'];
                $upload_file_dir = '../upload/';

                // 파일이 이동할 경로
                $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'][$i];
                // 파일 이동
                if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"][$i], $upload_file_path)) {
                    $file_dir = "upload/";
                    $file_path = $file_dir . $_FILES["uploadfile"]["name"][$i];
//                $size = filesize($upload_file_path);
                }


//    print "등록이 완료되었습니다." . $upload_file_path;
                if ($_FILES['uploadfile']['name'][$i] == null) {
                    $upload_file_path = null;
                }

                $pdo->beginTransaction();
                $sql = "UPDATE rikarsong.record SET
                            title = :title,
                            creator = :creator,
                            collector = :collector,
                            date_from = :date_from,
                            date_to = :date_to,
                            extent = :extent,
                            medium = :medium,
                            scope = :scope,
                            type = :type,
                            description = :description,
                            url=:url,
                            kind_of = :kind_of
                WHERE record_id = :record_id";
                $stmh = $pdo->prepare($sql);
                $stmh->bindValue(':record_id', $_POST['record_id'], PDO::PARAM_STR);
                $stmh->bindValue(':title', $title, PDO::PARAM_STR);
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
                $stmh->bindValue(':kind_of', $_POST['exampleRadios'], PDO::PARAM_STR);
                $stmh->execute();
                $pdo->commit();
                Header("Location:https://rikarsong.cafe24.com/wap/php/record_list_view.html.php");
            } catch (Exception $exception) {
                $pdo->rollBack();
                print "오류: " . $exception->getMessage();
            }
        }
    }

}