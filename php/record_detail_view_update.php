<?php
// DB 연결 정보
include "db_connect.php";
//
$file_change = $_FILES['uploadfile']['name'];
print $file_change;

if ($file_change == null) {
    try {
//        $identifier = $_POST['identifier'];
//
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
//
////    print "등록이 완료되었습니다." . $upload_file_path;
//        if ($_FILES['uploadfile']['name'] == null) {
//            $upload_file_path = $_POST['url'];
//        }

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
        $stmh->bindValue(':kind_of', $_POST['exampleRadios'], PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        Header("Location:../record_list_view.html");
    } catch (Exception $exception) {
        $pdo->rollBack();
        print "오류: " . $exception->getMessage();
    }
} else {
    try {
        $identifier = $_POST['identifier'];

        // 파일 업로드
        // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
        // 원격 웹 호스팅 환경
        $upload_file_dir = '../upload/';

        // 파일이 이동할 경로
        $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'];


        // 파일 이동
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $upload_file_path)) {
            $file_dir = "upload/";
            $file_path = $file_dir . $_FILES["uploadfile"]["name"];
//            $size = filesize($upload_file_path);
        }

//    print "등록이 완료되었습니다." . $upload_file_path;
        if ($_FILES['uploadfile']['name'] == null) {
            $upload_file_path = $_POST['url'];
        }
        $upload_file_path = substr($upload_file_path, 1);
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
                            url = :url,
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
        Header("Location:../record_list_view.html");
    } catch (Exception $exception) {
        $pdo->rollBack();
        print "오류: " . $exception->getMessage();
    }
}

//else {
//    for ($i = 0; $i < $file_count; $i++) {
//        if ($_FILES['uploadfile']['name'][$i] == null) {
//            break;
//        } else {
//            try {
//                $title_number = $i + 1;
//                $title = $_POST['title'] . "_" . $title_number;
//                $identifier = $_POST['identifier'];
//                $upload_file_dir = '../upload/';
//
//                // 파일이 이동할 경로
//                $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'][$i];
//                // 파일 이동
//                if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"][$i], $upload_file_path)) {
//                    $file_dir = "upload/";
//                    $file_path = $file_dir . $_FILES["uploadfile"]["name"][$i];
////                $size = filesize($upload_file_path);
//                }
//
//
////    print "등록이 완료되었습니다." . $upload_file_path;
//                if ($_FILES['uploadfile']['name'][$i] == null) {
//                    $upload_file_path = null;
//                }
//
//                $pdo->beginTransaction();
//                $sql = "UPDATE rikarsong.record SET
//                            title = :title,
//                            creator = :creator,
//                            collector = :collector,
//                            date_from = :date_from,
//                            date_to = :date_to,
//                            extent = :extent,
//                            medium = :medium,
//                            scope = :scope,
//                            type = :type,
//                            description = :description,
//                            url=:url,
//                            kind_of = :kind_of
//                WHERE record_id = :record_id";
//                $stmh = $pdo->prepare($sql);
//                $stmh->bindValue(':record_id', $_POST['record_id'], PDO::PARAM_STR);
//                $stmh->bindValue(':title', $title, PDO::PARAM_STR);
//                $stmh->bindValue(':creator', $_POST['creator'], PDO::PARAM_STR);
//                $stmh->bindValue(':collector', $_POST['collector'], PDO::PARAM_STR);
//                $stmh->bindValue(':date_from', $_POST['date_from'], PDO::PARAM_STR);
//                $stmh->bindValue(':date_to', $_POST['date_to'], PDO::PARAM_STR);
//                $stmh->bindValue(':extent', $_POST['extent'], PDO::PARAM_STR);
//                $stmh->bindValue(':medium', $_POST['medium'], PDO::PARAM_STR);
//                $stmh->bindValue(':scope', $_POST['scope'], PDO::PARAM_STR);
//                $stmh->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
//                $stmh->bindValue(':description', $_POST['record_description'], PDO::PARAM_STR);
//                $stmh->bindValue(':url', $upload_file_path, PDO::PARAM_STR);
//                $stmh->bindValue(':kind_of', $_POST['exampleRadios'], PDO::PARAM_STR);
//                $stmh->execute();
//                $pdo->commit();
//                Header("Location:../record_list_view.html");
//            } catch (Exception $exception) {
//                $pdo->rollBack();
//                print "오류: " . $exception->getMessage();
//            }
//        }
//    }
//
//}
?>