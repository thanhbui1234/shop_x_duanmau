<?php

include_once './model/connect.php';

function avtNav()
{

    if (isset($_SESSION['userId'])) {
        $id = $_SESSION['userId'];
        global $conn;
        $sql = " select avt from user where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataAvtNav;
        $dataAvtNav = $statement->fetchAll();

    }

}

function profile()
{
    if (isset($_SESSION['userId'])) {
        global $conn;
        $id = $_SESSION['userId'];
        $sql = " select * from user where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataPorfile;
        $dataPorfile = $statement->fetchAll();
    }

}

function updateProfile()
{
    if (isset($_POST['save'])) {
        $id = $_SESSION['userId'];
        global $conn;
        $userName = $_POST['userName'];
        $fullName = $_POST['fullName'];

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $avt = $_FILES['avtUser']['name'];

        if (empty($avt)) {
            $sqlavt = "select avt from user where id = $id ";
            $statementAvt = $conn->prepare($sqlavt);
            $statementAvt->execute();
            $dataAvt = $statementAvt->fetchAll();
            foreach ($dataAvt as $avtt) {

                $avt = $avtt['avt'];
            }

        }

        $avt_image_tmp = $_FILES['avtUser']['tmp_name'];
        $targe_dir = './uploads//';
        $target_file = $targe_dir . $avt;
        move_uploaded_file($avt_image_tmp, $target_file);

        $sql = " update user set user_fullName = '$fullName' ,  email = '$email' , user_name = '$userName' , avt = '$avt', phone = '$phone' where id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }

}

function selectInfoRequestAdmin()
{
    if (isset($_SESSION['userId'])) {
        global $conn;
        $sql = " select * from user where id = $_SESSION[userId] ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataRequestAdmin;
        $dataRequestAdmin = $statement->fetchAll();
    }

}

function insertRequest()
{

    if (isset($_POST['requestAdmin'])) {

        global $conn;
        $reason = $_POST['reason'];
        global $errRequest;
        $dateRequest = date("Y-m-d H:i a ");

        $errRequest = [];
        try {
            if (empty($reason)) {

                $errRequest['reasonEmpty'] = "Bạn phải cần lý do";

            } else if (strlen($reason) < 30) {

                $errRequest['stringReason'] = "Lý do phải hơn 50 ký tự";

            }

        } catch (exception $e) {
            echo ' ' . $e->getMessage();

        }

        if (empty($errRequest)) {

            $sql = "INSERT INTO requests_admin	(user_id,reason,date_request) values('$_SESSION[userId]','$reason','$dateRequest')";
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {

                echo "<script>Swal.fire(
  'Đã gửi yêu cầu',
  'Chúng tôi sẽ sét duyệt yêu cầu của bạn!',
  'success'
)</script>";
            }

        }

    }
}
