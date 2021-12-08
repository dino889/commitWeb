<?php

    
include "./password.php";
    $userid = $_POST['member_id'];
    $userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userpwcf = $_POST['password_confirm'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $purpose = $_POST['purpose'];
    $depart = $_POST['depart'];
    $stu_num = $_POST['stu_num'];

    


    if(password_verify($userpwcf,$userpw))
    {
        
        $mariadb_connect = mysqli_connect( 'localhost', 'howon', 'P@ssw0rd', 'CommIT_web_final' );

        $check = "SELECT * FROM member WHERE member_id = '".$userid."'"; 

        $result=mysqli_query($mariadb_connect,$check);

        $count = mysqli_num_rows($result);
        if($count==1)
        {
            echo "중복된 id입니다.<br>";
            echo "<a href=register.html>일반회원</a><br>";
            echo "<a href=register2.html>동아리회원</a><br>";
            exit();
        }else{
        $mariadb_connect_insert = "INSERT INTO member (
            member_id, password, name, email, phone, purpose,depart,stu_num ) 
            VALUES ('".$userid."','".$userpw."','".$username."','".$email."','".$phone."','".$purpose."','".$depart."','".$stu_num."');";
         $result = mysqli_query($mariadb_connect, $mariadb_connect_insert);
         echo "회원가입 시켜줄게<br>";
         echo "<a href=login.php>로그인하러가쟙</a>";
        }  
    }else{
        echo "비밀번호 제대로 다시쳐라 손구락 나간다!!<br>";
        echo "<a href=register.html>일반회원</a><br>";
        echo "<a href=register2.html>동아리회원</a><br>";
        exit();
    }
   
   


?>
