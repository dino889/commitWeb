<?php
    include $_SERVER['DOCUMENT_ROOT']."/db_info.php";
    //include "library.php";
    
    //board_data_id/board_id/member_id/date/title/contents
    $selected_board = $_POST['dept'];
    echo $selected_board;

    $member_id = 'test';
    
gg
    $date = date('Y-m-d');
    $title = $_POST['title'];
    $contents = $_POST['message'];
    
    if($selected_board == "공지사항")
        $board_id = 0;
    else if($selected_board == "자유게시판")
        $board_id = 1;
    else
        $board_id = 2;
    
    //$bno = $_POST['board_data_id'];
    // $board_id = 0;

    $sql = mq("INSERT INTO board_data(board_id, member_id, date, title, contents) VALUES(".$board_id.", '".$member_id."','CURRENT_DATE', '".$title."', '".$message."')");
    
    // $tmpfile =  $_FILES['profile']['tmp_name'];
    // $o_name = $_FILES['profile']['name'];
    // $filename = iconv("UTF-8", "EUC-KR",$_FILES['profile']['name']);
    // $folder = "./upload/".$filename;
    // move_uploaded_file($tmpfile,$folder);
    // if($HTTP_POST_FILES['profile'])
    // $sql = mq("INSERT INTO board_data_file(board_data_id, file) VALUES(, '".$o_name."')");


?>
<script type="text/javascript">alert("글쓰기가 완료되었습니다");</script>
<meta http-equiv='Refresh' content='0; URL=portfolio-1-col.php'>
