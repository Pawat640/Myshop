<?php 
    session_start();
    
    $username = "";
    $email = "";
    $errors = array();

    include("server.php");

    //Register User
    if(isset($_POST['reg_user'])) {
        //isset = มี -> ถ้าเกิดว่ามี _POST['reg_user']
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

        if (empty($username)) {array_push($errors, "Username is empty");}
        if (empty($email)) {array_push($errors, "Email is empty");}
        if (empty($phone)) {array_push($errors, "Phone is empty");}
        if (empty($address)) {array_push($errors, "Address is empty");}
        if (empty($password)) {array_push($errors, "Password is empty");}
        if ($password != $c_password) {array_push($errors, "รหัสผ่านไม่ตรงกัน");} 

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if($user['username'] === $username OR $user['email' === $email]) {
                array_push($errors, "ชื่อผู้ใช้หรืออีเมลนี้มีผู้ใช้งานแล้ว");
                $_SESSION['error'] = "ชื่อผู้ใช้หรืออีเมลนี้มีผู้ใช้งานแล้ว";
                header(location: register.php);
            }
        }

        if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving to the database
        $query = "INSERT INTO users (username, email, password, phone, address) 
                  VALUE ('$username', '$email', '$password', '$phone', '$address') ";
            mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "คุณได้เข้าสู่ระบบแล้ว";
            header("location: index.php");
        }
    }
?>