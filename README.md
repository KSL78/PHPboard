# 사진 게시판 프로젝트
## 프로젝트 개요
* PHP,Apache,MYSQL를 이용한 사진 업로드 게시판 제작 프로젝트
## 제작 목적 및 참고
* PHP 및 MYSQL 공부를 위해 제작
* https://blog.naver.com/bgpoilkj/220708456525
## 참여자
* 본인(개인 프로젝트)
## 본 프로젝트 사용 기술 및 환경
* Lan: PHP,Apache,MYSQL(phpmyadmin),CSS,JavaScript
* OS,Tool: Windows 11,GitHub,Vscode,XAMPP
## 수정 및 추가기능 목차
1. 데이터 테이블
2. 게시글 읽기
3. 게시글 쓰기(MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당)
4. 게시글 수정
****
## 1. MYSQL 데이터 테이블
  * 데이터 테이블(게시글)

![boardt](https://github.com/KSL78/PHPboard/assets/53367924/a019467a-cd16-4b08-882e-3b9f263dd639)

  * 데이터 테이블(댓글)

![replyt](https://github.com/KSL78/PHPboard/assets/53367924/5ec51a43-e778-4c6e-9fde-c316325874c8)

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


## 2. 읽기
  *
## 3. 쓰기(MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당)
  *
## 4. 게시글 수정
  *
## 차후 계획
1. 글 게시판 생성
2. 로그인 기능 추가 및 로그인 유저에게만 사진 게시판 글쓰기 활성화 및 고유번호를 이용한 폴더 할당
3. 비로그인 유저에게는 글 게시판 기능만 할당
4. 디자인 변경
5. 검색기능 추가
6. 웹게임 추가
