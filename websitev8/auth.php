<?php
session_start();
include 'db_conn.php';


if (isset($_POST['username']) && isset($_POST['password'])){
    $email = $_POST['username'];
    $password = $_POST['password'];


    if (empty($email)){
        header("Location: login.php?error=Username is required");

    }else if (empty($password)){
        header("Location: login.php?error=Password is required");

    }else{
        $stmt = $conn->prepare('SELECT * FROM users WHERE username=?');
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 1){
            $user = $stmt->fetch();
            $user_id = $user['id'];
            $user_email = $user['username'];
            $user_password = $user['password'];
            $user_full_name = $user['full_name'];

            if ($email === $user_email){
                if (password_verify($password,$user_password)){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_username'] = $user_email;
                    $_SESSION['user_full_name'] = $user_full_name;
                    header("Location: status.php");

                }else{//was altijd fout door /r/n achteraan van phpyadmin
                    header("Location: login.php?error=Incorrect email or password");
                }
            }else{
                header("Location: login.php?error=Incorrect email or password");
            }
        }else{
            header("Location: login.php?error=Incorrect email or password");
        }
    }
}
