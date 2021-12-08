<?php
    $mariadb_connect = mysqli_connect( 'localhost', 'howon', 'P@ssw0rd', 'CommIT_web_final' );
    
    function mq($sql)
	{
		global $mariadb_connect;
		return $mariadb_connect->query($sql);
    }
    
    //테이블이름이랑 테이블 아이디 변수 생성
    $tablename="board_data";
    $bno= $_GET['board_data_id'];

    //DB에서 받아오는 쿼리문
    $query = mq("select board_id, title, contents from $tablename where board_data_id='$bno';");
    $array = $query ->fetch_array();

?>


<script language="javascript">
function check_submit()
{
    var myElem = document.getElementById("contents").value;
    document.myForm.contents.value = myElem;
    document.myForm.action = "modify_ok.php";
    document.myForm.submit();
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CommIT</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/writing_btn.css" rel="stylesheet">
</head>

<body>
    <!-- Footer -->
    <footer id="footer" class="wrapper">
        <div class="inner">
            <section>
                <div class="box">
                    <div class="content">
                        <h2 class="align-center">Writing</h2>
                        <hr />
                        <form name = "myForm" method="post">
                            <input type="hidden" name="board_data_id" value="<?=$bno?>"/>
                            <input name="contents" type ="hidden" value="<?php echo $contents_value ?>"/>

                            <div class="field">
                                <label for="title">제목</label>
                                <input name="title" id="title" type="text" placeholder="제목" value = "<?php echo $array['title']; ?>">
                            </div>

                            <div class="field">
                                <label for="dept">카테고리 선택</label>
                                <div class="select-wrapper">
                                <?php
                                    $status = $array['board_id'];
                                ?>
                                    <select name="dept">
                                        <option value = "">- Category -</option>
                                        <option value ="0" <?php if($status == "0") echo "SELECTED";?>>공지사항</option>
                                        <option value ="1" <?php if($status == "1") echo "SELECTED";?>>자유게시판</option>
                                        <option value ="2" <?php if($status == "2") echo "SELECTED";?>>사진게시판</option>
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <label for="upload">첨부파일</label>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="file" name="profile">

                                </form>
                            </div>

                            <div class="field">
                                <label for="contents">내용</label>
                                <textarea name="contents" id="contents" rows="6" placeholder="내용을 입력하세요."><?php echo $array['contents']; ?></textarea>
                            </div>

                            <ul class="actions align-center">
                                <a class="button special" href="javascript:check_submit();">등록</a>
                                <!-- <li><input value="Send Message" class="button special" type="submit" href="portfolio-1-col.html"></li>-->
                            </ul>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </footer>
</body>

