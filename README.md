# 사진 게시판 프로젝트
## 프로젝트 개요
* PHP,Apache,MYSQL를 이용한 사진 업로드 게시판 제작 프로젝트
## 제작 목적 및 크드 참고
* PHP 및 MYSQL 공부를 위해 제작
* https://blog.naver.com/bgpoilkj/220708456525
## 참여자
* 본인(개인 프로젝트)
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


## 2. 쓰기(MYSQL과 연동되어 데이터 저장 및 업로드시 폴더 할당)
  * write_ok.php의 코드

```
ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ
```
  * 주요기능
    1. 업로드 사진 리스트화 및 카운트(다중 업로드 가능)
    2. 업로드된 사진들의 리스트를 카운트하여 리스트중에서 사진이 아닌 파일 및 위장 사진 파일 감별(jpg사진만 업로드 가능)
    3. 업로드 사진이 jpg사진이 맞는 경우 upload폴더에 name으로 폴더 생성 및 폴더 할당후에 업로드되며 데이터베이스에 기록
    4. 업로드된 사진이 jpg사진이 아니거나 다중 업로드된 파일중에 사진이 아닌 파일이 있거나 위장 사진파일이 있을경우 out값 증가로 인한 업로드 실패기능
## 3. 읽기

## 차후 계획
1. 게시글 수정 기능 개량
2. 글 게시판 생성
3. 로그인 기능 추가 및 로그인 유저에게만 사진 게시판 글쓰기 활성화 및 고유번호를 이용한 폴더 할당
4. 비로그인 유저에게는 글 게시판 기능만 할당
5. 디자인 변경
6. 검색기능 추가
7. 웹게임 추가
