<?php
    $mariadb_connect = mysqli_connect( 'localhost', 'howon', 'P@ssw0rd', 'CommIT_web_final' );
    
    function mq($sql)
	{
		global $mariadb_connect;
		return $mariadb_connect->query($sql);
    }
    
    //테이블이름이랑 테이블 아이디 변수 생성
    $tablename="board_data";
    $bno= 2;
    //$_GET['board_data_id'];

    //DB에서 받아오는 쿼리문
    $query = mq("select board_id, title, contents from $tablename where board_data_id='$bno';");
    $array = $query ->fetch_array();

?>

//제목에 받아오기
<input name="title" id="title" type="text" placeholder="<?php echo $array['title']; ?>">

//카테고리 받아오기
<?php
    $status = $array['board_id'];
?>
<select name="dept">
    <option value = "">- Category -</option>
    <option value ="0" <?php if($status == "0") echo "SELECTED";?>>공지사항</option>
    <option value ="1" <?php if($status == "1") echo "SELECTED";?>>자유게시판</option>
    <option value ="2" <?php if($status == "2") echo "SELECTED";?>>사진게시판</option>
</select>



//참고

<!--- 게시글 수정 -->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
   
	$bno = $_GET['idx'];
	$sql = mq("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
 ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php/<?php echo $board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>" />
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


<?php
    ob_start();
    echo "<script>document.write(myElem);</script>";
    $contents_value = ob_get_clean();
?>



//
<td><?php echo $array['board_data_id']; ?></td>
<td><a href=""><?php echo $title;?></a></td>
<td><?php echo $array['member_id']; ?></td>
<td><?php echo $array['date']; ?></td>