<?php
	$mariadb_connect = mysqli_connect( 'localhost', 'goldhill', 'P@ssw0rd', 'CommIT_web_final' );
    
    function mq($sql)
	{
		global $mariadb_connect;
		return $mariadb_connect->query($sql);
    }

	$bno = $_GET['board_data_id'];
	$sql = mq("delete from board_data where board_data_id='$bno';");
	$sql2 = mq("alter table board_data auto_increment = 1;");
	$sql3 = mq("SET @COUNT = 0;");
	$sql4 = mq("update board_data set board_data_id = @COUNT:= @COUNT+1;");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=portfolio-1-col.php">