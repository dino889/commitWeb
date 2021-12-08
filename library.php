<?
    $save_dir="./upload";

    
    //파일 업로드 함수
    function upload(&$file,$limit_file_size)
    {
            global $save_dir;
            
            //금지된 확장자 설정 - 금지할 확장자를 추가해서 사용
            $ban_ext = array('php','php3','html','htm','cgi','pl');

            //업로드 파일 제한 크기를 초과하였는지 확인
             if ($file[size] > $limit_file_size) 
            {    
                //파일의 크기를 아래의 단위로 표시합니다.
                $unit=Array("Bytes", "KB", "MB", "GB");
                for ($i=0; $limit_file_size>=1024; $limit_file_size>>=10, $i++);
                $file_size = sprintf("%d $unit[$i]", $limit_file_size);

                 MsgBox("업로드 파일 크기 제한 : $file_size");
            }


            //확장자를 이용하여 업로드 가능한 파일인지 체크한다.
            $temp_name = explode(".",$file['name']);
            $ext = strtolower($temp_name[sizeof($temp_name)-1]);
            
            if (in_array($ext,$ban_ext)) {
                MsgBox("업로드가 불가능한 확장자입니다.");
            }
            
            //같은 파일명이 있지 않게 하기위해 파일명을 절대 중복이 불가능하게 만든다.
            mt_srand((double)microtime()*1000000);
            $new_file_name = time() . mt_rand(10000,99999);

            $file_name = $new_file_name . '.' . $ext; //파일 이름뒤에 확장자를 붙인다.
            $file_name_db = $file_name . '||' . $file['name']; //db에 저장될 화일명 예) 새파일명||원래파일명

            //화일을 지정된 폴더로 이동시킨다.
            if(move_uploaded_file($file['tmp_name'] ,$save_dir . '/' . $file_name)) {
                    @unlink($file['tmp_name']);
                    return $file_name_db;
            } else {
                    @unlink($file['tmp_name']);
                    MsgBox("업로드 과정에서 에러가 발생하였습니다.");
            }
    }

    function download($file)
    {
            global $save_dir;
            
            $temp_name = explode('||',$file); 
            $save_file_name = $temp_name[0];
            $original_file_name = $temp_name[1];
            
            if( eregi( "\.\./|\/\/", $save_file_name ) ) MsgBox("몬때따~ 참말로 몬때따~");

            if(strstr($HTTP_USER_AGENT, "MSIE 6.")) { 
                    header("Content-type: application/octetstream"); 
                    header("Content-disposition: filename=$original_file_name");
                    header("Content-Length: ".filesize($save_dir.'/'.$save_file_name));
            } else if(strstr($HTTP_USER_AGENT, "MSIE 5.5")) {
                    header("Content-Type: doesn/matter");
                    header("Content-disposition: filename=$original_file_name");
                    header("Content-Transfer-Encoding: binary");
                    header("Pragma: no-cache");
                    header("Expires: 0");
            } else if(strstr($HTTP_USER_AGENT, "MSIE 5.0")) {
                    Header("Content-type: file/unknown");
                    header("Content-Disposition: attachment; filename=$original_file_name");
                    Header("Content-Description: PHP3 Generated Data");
                    header("Pragma: no-cache");
                    header("Expires: 0");
            } else { 
                    Header("Content-type: file/unknown");
                    header("Content-Disposition: attachment; filename=$original_file_name");
                    Header("Content-Description: PHP3 Generated Data");
                    header("Pragma: no-cache");
                    header("Expires: 0");
            } 

            if (is_file($save_dir. '/' .$save_file_name)) { 
                    $fp = fopen($save_dir . '/' . $save_file_name,"r");
                    if (!fpassthru($fp)) {
                            fclose($fp);
                    }
            } else MsgBox("파일이 존재하지 않습니다.");      
    }


    function del_file($file)
    {
            global $save_dir;
            $temp_name = explode('||',$file); 
            $save_file_name = $temp_name[0];
            
            if( eregi( "\.\./|\/\/", $save_file_name ) ) return;

            if(file_exists($save_dir.'/'.$save_file_name)) {
                if(!(@unlink($save_dir.'/'.$save_file_name))) MsgBox("파일을 삭제하는데 실패하였습니다.");
            }
    }

    function MsgBox($msg)
    {
        echo"<script> alert('$msg'); history.back(); </script>";
        exit;
    }


?>