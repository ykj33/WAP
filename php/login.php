<?php
// DB 연결 정보
$db_user = "rikarsong";
$db_pass = "rikar0217@@";
$db_host = "localhost";
$db_name = "rikarsong";
$db_type = "mysql";
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
//                    $db_user = "root";
//                    $db_pass = "audwleogkrry";
//                    $db_host = "localhost";
//                    $db_name = "wap";
//                    $db_type = "mysql";
//                    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
try {
    // DB 연결
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//                    print "접속하였습니다.";
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}
try {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM rikarsong.user WHERE user_id = :user_id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmh->execute();
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
        if ($password == $row['password']) {
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['password'] = $password;
$_SESSION['team_name'] = $row['team_name'];
            Header("Location:../index.html.php");
        } else {
            Header("Location:./login.html.php");
        }
    }
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}
?>