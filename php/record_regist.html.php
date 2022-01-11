<?php

include 'db_connect.php';

//// DB에 데이터 입력
echo $_FILES['uploadfile']['name'];
$file_count = count($_FILES['uploadfile']['name']);
echo $file_count;
if ($file_count <= 2 && $_FILES['uploadfile']['name'][1] == null) {
    for ($i = 0; $i < $file_count; $i++) {
        echo $file_count;
        echo $_FILES['uploadfile']['name'][$i];
//
    }
    try {

        $register = $_POST['register'];

// record_id의 현재 최대값을 가져와 +1을 한 뒤 앞으로 입력할 기록에 할당
        $sql = "SELECT record_id FROM rikarsong.record";
        $stmh = $pdo->prepare($sql);
        $stmh->execute();
        $biggest_record_id = $stmh->rowCount();
        $record_id = $biggest_record_id + 1;
        $record_id = sprintf('%04d', $record_id);
        $identifier = $_POST['exampleRadios'] . "_" . $_POST["date_from"] . "_" . $_POST['title'] . "_" . $record_id;

        // 파일 업로드
        // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
        // 원격 웹 호스팅 환경
        $upload_file_dir = '../upload/';

        // 파일이 이동할 경로
        $upload_file_path = $upload_file_dir . $identifier . "_" . $_FILES['uploadfile']['name'][0];


        // 파일 이동
        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"][0], $upload_file_path)) {
            $file_dir = "../upload/";
            $file_path = $file_dir . $_FILES["uploadfile"]["name"][0];
//            $size = filesize($upload_file_path);
        }

//    print "등록이 완료되었습니다." . $upload_file_path;
        if ($_FILES['uploadfile']['name'] == null) {
            $upload_file_path = null;
        }
        $upload_file_path = substr($upload_file_path, 1);
        // 트랜잭션 시작
        $pdo->beginTransaction();
        $sql = "INSERT INTO rikarsong.record (identifier, record_id, title, creator, collector, date_from, date_to, extent, medium, scope, type, description, level_of_description, url, delete_Yn, kind_of, register)
            VALUES (:identifier, :record_id, :title, :creator, :collector, :date_from, :date_to, :extent, :medium, :scope, :type, :description, 'item', :url, 'N', :kind_of, :register)";
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
        $stmh->bindValue(':kind_of', $_POST['exampleRadios'], PDO::PARAM_STR);
        $stmh->bindValue(':register', $register, PDO::PARAM_STR);
        $stmh->execute();
        $pdo->commit();
        echo "<script>window.location.replace('../record_multi_regist.html')</script>";

    } catch (Exception $exception) {
        $pdo->rollBack();
        print "오류: " . $exception->getMessage();
    }

//         등록하려는 기록물이 2개 이상일 때
    }
else {
    for ($i = 0; $i < $file_count; $i++) {
        if ($_FILES['uploadfile']['name'][$i] == null) {
            break;
        } else {


            try {

                $register = $_POST['register'];
// record_id의 현재 최대값을 가져와 +1을 한 뒤 앞으로 입력할 기록에 할당
// identifier는 record_id에 WP_를 붙여 사용
                $sql = "SELECT record_id FROM rikarsong.record";
                $stmh = $pdo->prepare($sql);
                $stmh->execute();
                $biggest_record_id = $stmh->rowCount();
                $record_id = $biggest_record_id + 1;
                $record_id = sprintf('%04d', $record_id);
                $title_number = $i + 1;
                $title = $_POST['title'] . "_" . $title_number;
                $identifier = $_POST['exampleRadios'] . "_" . $_POST["date_from"] . "_" . $_POST['title'] . "_" . $record_id;
                print $_POST['exampleRadios'];
                // 파일 업로드
                // 업로드 될 파일이 이동할 디렉토리의 경우 서버 환경에 맞게 재설정 필요
                // 원격 웹 호스팅 환경
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
                $upload_file_path = substr($upload_file_path, 1);
                // 트랜잭션 시작
                $pdo->beginTransaction();
                $sql = "INSERT INTO rikarsong.record (identifier, record_id, title, creator, collector, date_from, date_to, extent, medium, scope, type, description, level_of_description, url, delete_Yn, kind_of, register)
            VALUES (:identifier, :record_id, :title, :creator, :collector, :date_from, :date_to, :extent, :medium, :scope, :type, :description, 'item', :url, 'N', :kind_of, :register)";
                $stmh = $pdo->prepare($sql);
                $stmh->bindValue(':identifier', $identifier, PDO::PARAM_STR);
                $stmh->bindValue(':record_id', $record_id, PDO::PARAM_STR);
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
                $stmh->bindValue(':register', $register, PDO::PARAM_STR);
                $stmh->execute();
                $pdo->commit();
                echo "<script>window.location.replace('../record_multi_regist.html')</script>";

            } catch (Exception $exception) {
                $pdo->rollBack();
                print "오류: " . $exception->getMessage();
            }
        }
    }
}

