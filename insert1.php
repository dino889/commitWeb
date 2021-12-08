<?
    //DB 연결
    include "db.php";

    $query = "INSERT INTO board_data('board_data_id', 'board_id', 'member_id', 'date', 'title', 'contents'
                VALUSE ('', '', 'member.member_id', now(), $name, $message)";

    $result = mysql_query($query, $conn);

    //DB 연결 종료
    mysql_close($conn);

    echo("<meta http-equiv = 'Refresh' content = '1; URL = list.php'>");

?>

