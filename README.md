# 사진 게시판 프로젝트
## 프로젝트 개요
* PHP,Apache,MYSQL를 이용한 사진 업로드 게시판 제작 프로젝트
## 제작 목적 및 크드 참고
* PHP 및 MYSQL 공부를 위해 제작
## 참여자
* 본인(개인 프로젝트)
## 참고 페이지
* https://blog.naver.com/bgpoilkj/220708456525
## 본 프로젝트 사용 기술 및 환경
* Lan: PHP,Apache,MYSQL(phpmyadmin),CSS,JavaScript
* OS,Tool: Windows 11,GitHub,Vscode,XAMPP
## 주요 기능 목차
1. 데이터 테이블
2. 게시글 쓰기(MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당)
3. 게시글 읽기
****
## 1. MYSQL 데이터 테이블
  * 데이터 테이블(게시글)

![boardt](https://github.com/KSL78/PHPboard/assets/53367924/12e1247c-b36c-4785-9d37-70ecaca090cd)

  * idx: 게시글 고유번호
  * name: 게시글 작성자
  * title: 게시글 이름
  * content: 게시글 내용
  * date: 게시글 작성 날짜
  * hit: 게시글 조회수
  * file: 업로드 사진 리스트
  * pcnt: 업로드 사진 카운트

  * db.php 의 코드

        <?php
	        header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
	        $DBa = "";
	        $DBi = "";
	        $DBp = "";
	        $DBn = "";
	        // DBa=localhost=DB주소(아파치), DBi=DB계정아이디, DBp=DB계정비밀번호, DBn=DB이름
	        $db = new mysqli($DBa,$DBi,$DBp,$DBn); 
	        $db->set_charset("utf8");
	        function mq($sql)
	        {
		        global $db;
		        return $db->query($sql);
	        }
        ?>

## 2. 쓰기(MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당)
  * write_ok.php의 코드

```
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
```
  * 주요기능
    1. 업로드 사진 리스트화 및 카운트(다중 업로드 가능)
    2. 업로드된 사진들의 리스트를 카운트하여 리스트중에서 사진이 아닌 파일 및 위장 사진 파일 감별(jpg사진만 업로드 가능)
    3. 업로드 사진이 jpg사진이 맞는 경우 upload폴더에 name으로 폴더 생성 및 폴더 할당후에 이름이 바뀌어 업로드되며 원본 이름과 총 카운트가 데이터베이스에 기록
    4. 업로드된 사진이 jpg사진이 아니거나 다중 업로드된 파일중에 사진이 아닌 파일이 있거나 위장 사진파일이 있을경우 out값 증가로 인한 업로드 실패기능
## 3. 읽기
  * read.php의 일부 코드
```
<div style="text-align : center;">
  <?php // 사진 출력
    if ($board['pcnt'] != 0)
      for ($i=0;$i<$board['pcnt'];$i++)
      {
        echo " <img src='../upload/$board[name]/$i.jpg' />";
      }
  ?>
```
  * 주요기능
    1. idx를 이용하여 게시글 읽기 가능
    2. write_ok.php기능에 의해 생성된 작성자 폴더에 있는 이미지 출력
## 차후 계획
1. 게시글 수정 기능 추가
2. 로그인 기능 추가
3. 글 게시판 생성
4. 로그인 유저에게만 사진 게시판 글쓰기 활성화 및 고유번호를 이용한 폴더 할당
5. 비로그인 유저에게는 글 게시판 기능만 할당
6. 디자인 변경
7. 검색기능 추가
8. 웹게임 추가
