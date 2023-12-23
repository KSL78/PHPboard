<?php

include $_SERVER['DOCUMENT_ROOT']."/aproj/db.php";
$date = date('Y-m-d');
$idx1 = $_GET['idx'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}
$xname = $_POST['name'];

$path = "../upload/$xname";
$cntv = count($_FILES['upload_file']['name']);
if(!file_exists($path)){
    mkdir($path, 0777, true);
    chmod($path, 0777);
}

for ( $i = 0; $i < $cntv; $i++) {
    if ( isset($_FILES['upload_file']['name'][$i])
    && $_FILES['upload_file']['size'][$i] > 0 ) {
        $ux_name = $_FILES['upload_file']['name'][$i];
        $tmp_name = $_FILES['upload_file']['tmp_name'][$i];
        $ret =getimagesize($tmp_name, $extinfo);
        list($image_width, $image_height, $image_type, $image_attr, $image_mime) = $ret;
        if($image_type == 2)
        { 
        // 원하는 작업을 했다.
            $up = move_uploaded_file($tmp_name, "$path/$ux_name");
            rename("$path/$ux_name","$path/$i.jpg");
            $mqq = mq("alter table board auto_increment =1"); //auto_increment 값 초기화

            $sql= mq("insert into board(name,pw,title,content,date,lock_post,file,pcnt) values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."','".$ux_name."','".$cntv."')");
            echo "<script>alert('jpg사진이 업로드 되었습니다.');</script>";
    
    
        }
        else{
        // 오류다.}
        echo "<script>alert('사진이 아닙니다.');</script>";
        header("location:/aproj/page/write.php");
        }
    }
}

?>
<meta http-equiv="refresh" content="0 url=/aproj/index.php" />