<?php
    include $_SERVER['DOCUMENT_ROOT']."/db_info.php";
?>

<script language="javascript">
function check_submit()
{
    var myElem = document.getElementById("message").value;
    document.myForm.message.value = myElem;
    document.myForm.action = "write_ok.php";
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
                        <!-- <hr /> -->
                        <form name="myForm" method="post">
                        <input name="message" type ="hidden" />
                            
                            <div class="field">
                                <label for="title">제목</label>
                                <input name="title" id="title" type="text" placeholder="title" required>
                            </div>
                            
                            <div class="field">
                                <label for="dept">카테고리 선택</label>
                                <div class="select-wrapper">
                                    <select name="dept" id="dept" required>
                                        <option value="">- Category -</option>
                                        <option value="1">공지사항</option>
                                        <option value="2">자유게시판</option>
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
                                <label for="message">내용</label>
                                <textarea name="message" id="message" rows="6" placeholder="Message" required></textarea>
                            </div>


                            <ul class="actions align-center">
                                <a class="button special" type="submit" href="javascript:check_submit();">등록</a>
                                <!--<li><input value="Send Message" class="button special" type="submit" href="portfolio-1-col.php"></li>-->
                            </ul>
                        </form>
                    </div>
                </div>
            </section>
</body>
</html>


