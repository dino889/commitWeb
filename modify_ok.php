<?php
    $mariadb_connect = mysqli_connect( 'localhost', 'howon', 'P@ssw0rd', 'CommIT_web_final' );
        
    function mq($sql)
    {
        global $mariadb_connect;
        return $mariadb_connect->query($sql);
    }

    $bno = $_POST['board_data_id'];
    $sql = mq("update board_data set title='".$_POST['title']."',contents='".$_POST['contents']."' where board_data_id='".$bno."';");
?>
<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=view.php?board_data_id=<?php echo $bno; ?>">