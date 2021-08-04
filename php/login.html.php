<?php
include 'db_connect.php';
try {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
//    $sql = "SELECT * FROM rikarsong.user WHERE user_id = :user_id";
    $sql = "SELECT * FROM rikarsong.user WHERE user_id = :user_id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmh->execute();
    $count = $stmh->rowCount();
    print "카운트".$count;
    if ($count == 0) {
        print $count;
        echo '<script>alert("잘못된 아이디를 입력하셨습니다. 다시 입력해주세요.");location.href="../login.html";</script>';
    } else {
        while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
            if ($user_id == $row['user_id'] && $password == $row['password']) {
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['password'] = $password;
                $_SESSION['team_name'] = $row['team_name'];
                Header("Location:../index.html");
            } else {

                echo '<script>alert("잘못된 계정정보를 입력하셨습니다. 다시 입력해주세요.");location.href="../login.html";</script>';


//            Header("Location:./login.html.php");
            }
        }

    }
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}
?>