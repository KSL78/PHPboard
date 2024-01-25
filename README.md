# 사진 게시판 프로젝트
## 프로젝트 개요
* PHP,Apache,MYSQL를 이용한 사진 업로드 게시판 제작 프로젝트
## 제작 목적 및 참고
* PHP 및 MYSQL 공부를 위해 제작
* https://blog.naver.com/bgpoilkj
## 참여자
* 본인(개인 프로젝트)
## 본 프로젝트 사용 기술 및 환경
* Lan: PHP,Apache,MYSQL(phpmyadmin),CSS,JavaScript
* OS,Tool: Windows 11,GitHub,Vscode,XAMPP
## 기능내용 목차
1. 게시판(시진 및 글 업로드 가능)
2. 수정 및 삭제
3. MYSQL과 연동되어 데이터 저장 및 폴더 할당
****
## 1. MYSQL 데이터 테이블 및 게시판
  * 데이터 테이블

![table](https://github.com/KSL78/PHPboard/assets/53367924/79f89179-5dce-495a-a208-2d930d411e77)
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
  * 게시판

## 2. 수정 및 삭제
## 3. MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당

## 차후 계획
1. 로그인 기능 추가 및 로그인 유저에게만 사진 업로드, 고유번호를 이용한 폴더 할당
2. 비로그인 유저에게는 글 업로드 기능만 할당
3. 디자인 변경
4. 검색기능 추 
5. 웹게임 추가
