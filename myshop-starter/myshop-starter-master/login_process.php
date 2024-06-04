<?php
    session_start();

    include("server.php");

    $errors = array();

    //login User
    if( isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        
        if (count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result)==1){ //check ว่า result ตรงกับข้อมูลในระบบไหม
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "คุณได้เข้าสู่ระบบแล้ว";
                header("location: index.php");
            }else{
                array_push($errors, "ชื่อผู้ใช้หรือรหัสไม่ถูกต้อง");
                header("location: login.php");
            }
        }
    
    }
?>