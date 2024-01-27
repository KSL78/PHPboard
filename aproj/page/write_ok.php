<?php
    include $_SERVER['DOCUMENT_ROOT']."/aproj/db.php";
    $date = date('Y-m-d');
    $idx1 = $_GET['idx'];
    $xname = $_POST['name'];
    $path = "../upload/$xname";
    $cntv = count($_FILES['upload_file']['name']);
    $che = 0;// jpg사진일 경우 +
    $out = 0;// jpg사진이 아니거나 위장 사진일 경우 +
    $danamel = array();
    for ( $i = 0; $i < $cntv; $i++) { // jpg사진 및 위장 사진 판별용 코드
        $tmp_name = $_FILES['upload_file']['tmp_name'][$i];
        $ret =getimagesize($tmp_name, $extinfo);
        $ssi = json_encode($ret);
        $ssv = json_encode($ret[2]);
        if($ssi == 'false' || $ssv !=2)
            $out++;
        else
            $che++;
    }     
    if($che>0 && $out == 0)// 판별후 업로드 코드
    {
        if(!file_exists($path)){
            mkdir($path, 0777, true);
            chmod($path, 0777);
        }
        for ( $v = 0; $v < $cntv; $v++) {
            $ux_name = $_FILES['upload_file']['name'][$v];
            $tmp_name = $_FILES['upload_file']['tmp_name'][$v];
            $danamel[$v] = $ux_name;
            $up = move_uploaded_file($tmp_name, "$path/$ux_name");
            rename("$path/$ux_name","$path/$v.jpg");
        }
        $danames = json_encode($danamel);// file 리스트 데이터 베이스 업로드용 리스트화
        // jpg사진이거나 위장사진이 아닐경우
        $sql= mq("insert into board(name,title,content,date,file,pcnt) values('".$_POST['name']."','".$_POST['title']."','".$_POST['content']."','".$date."','".$danames."','".$cntv."')");
        echo "<script>alert('jpg사진이 업로드 되었습니다.');</script>"; ?>
        <meta http-equiv="refresh" content="0 url=/aproj/index.php" />
        <?php
    }
    elseif ($out > 0) // jpg사진이 아니거나 위장사진일 경우
    {
        echo "<script>alert('사진이 아니거나 사진이 아닌 파일이 추가되어있습니다.');</script>";
        ?>
        <meta http-equiv="refresh" content="0 url=/aproj/page/write.php" />
        <?php
    }
?>