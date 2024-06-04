<?php
    session_start();
    include("server.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <header>
            <div class="container">
                <div class="class">
                    <img width="100%" src="img\banner.jpg" alt="">
                </div>
            </div>
        </header>

        <nav>
            <div class="container">
                <div class="nav-c">
                    <ul class="menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">CONTACT</a></li>
                        <li>
                            <form action="" class="search_bar" method="post">
                                <span>ค้นหา</span>
                                <input type="text" name="serach_name" placeholder="ค้นหาสินค้า">
                                <input type="submit" name="sreach_btn" value="search">
                            </form>
                        </li>
                    </ul>

                    <ul class="login">
                        <?php if(isset($_SESSION["username"])) : ?>
                        <li>Welcome <strong><?php echo $_SESSION["username"]; ?></strong></li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ตะกร้าสินค้า</a></li>
                        <li><a href="my_orders.php"><i class="fa fa-list-alt" aria-hidden="true"></i> ดูรายการสินค้า</a></li>
                        <li><a href="#" style="color:red;">logout</a></li>
                        <?php else :?>
                        <li><a href="login.php">LOGIN</a></li>
                        <li><a href="register.php">REGISTER</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>

        <section>
            <div class="container">
                <div class="login-form">
                    <img width='10%' src="img/login.jpg" alt="">
                    <br><br>
                    <?php if(isset($_SESSION["error"])) : ?>
                        <div class="error">
                            <h3>
                                <?php 
                                echo $_SESSION['error']; 
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <h1>LOGIN - เข้าสู้ระบบ</h1>
                    <br>
                    <form action="login_process.php" method="post">
                        <input type="text" name="username" placeholder="Enter your username" required>
                        <!-- required ใช้ในการบังคับว่าต้องการข้อมูลในช่องนี้ -->
                        <br>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <br>
                        <input type="submit" name="login_user" value="Login">
                    </form>
                    <a style="color:blue; font-size:12px;" href="register.php">สมัครสมาชิก</a>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>&copy;CopyRight Pawat Attasampunna 2024</p>
        </footer>

</body>
</html>