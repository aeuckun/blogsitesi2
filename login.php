<?php
    session_start();
    include('public/header2.php');
    include('include/connection.php');

    if(isset($_POST['email'])){
        $adminMail = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $adminPass = $_POST['password'];
    }
    if(isset($_POST['log'])){
        $login = $_POST['log'];
    }
?>
</head>
<body>

    <div class="login" >
    <?php
        if(isset($login)){
            if(empty($adminMail) || empty($adminPass)){
               
            }
            else{
                $query = " SELECT * FROM users WHERE email='$adminMail' AND pass ='$adminPass'";
                $res = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($res);
                
                if(mysqli_num_rows(mysqli_query($conn,$query)) > 0){
                    echo "<div class='alert alert-success'>" . "</div>";
                    $_SESSION['id']= $row['id'];
                    header('REFRESH:2;URL=posts.php');
                }

            }
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
            <h5 style= "color: black">Giriş Yap</h5>
            <div class="mt-3 mb-3">
                <label for="mail">Email</label>
                <input type="text" class="form-control" id="mail" name="email" placeholder="admin@gmail.com">
            </div>
            <div class="mt-3 mb-3">
                <label for="pass">Şifre</label>
                <input type="text" class="form-control" id="pass" name="password" placeholder="**********">
            </div>
            <button name = "log">Giriş Yap</button>
        </form>
    </div>
