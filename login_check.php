<?php    
  $userid = $_POST['member_id'];
  $userpw = $_POST['password'];

  $mariadb_connect = mysqli_connect( 'localhost', 'howon', 'P@ssw0rd', 'CommIT_web_final' );
  // $check = "SELECT * FROM member WHERE member_id='".$userid."' AND password='".$userpw."'";
  $checkid = "SELECT * FROM member WHERE member_id = '".$userid."'"; 

  $result=mysqli_query($mariadb_connect,$checkid);
  $count = mysqli_num_rows($result);
  if($count==1)
  {
    $checkpw = "SELECT password FROM member WHERE member_id = '".$userid."'";
    $array=mysql_fetch_arrray($checkpw);
    $hash_password = $array['password']; 
    include "./password.php";
    echo $hash_password;
    if(password_verify($userpw,$hash_password))
    {
      echo "로그인 성공으로 해봅시다";
    }else echo "너는 또 실패다";
    

  }
        // $row = $res->fetch_array(MYSQLI_ASSOC); // 넘어온 결과를 한 행씩 패치해서 $row라는 배열에 담는다.
 
        // if ($row != null) {                                                 //만약 배열에 존재한다면
        //     $_SESSION['ses_username'] = $row['name'];                           // 세션을 만들어준다. 
        //     echo $_SESSION['ses_username'].'님 안녕하세요<p/>';                   // name님 안녕하세요.
        //     echo '<a href="register.html">로그아웃 하기</a>';           //로그아웃 페이지 링크.
        // }
 
        // if($row == null){                                                    //만약 배열에 아무것도 없다면
            
        //   echo "오류오류오류오류오류오류오륭로유로유로율오ㅠㄹ오류ㄴㄴ.<br>";
        // //  echo("<script>location.href='RSDB_starterror.php';</script>");          //애러 화면으로 넘김            
        // } 
 
?>
