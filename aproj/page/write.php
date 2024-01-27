<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>작성</title>
    <link rel="stylesheet" href="/aproj/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">사진 게시판</a></h1>
            <div id="write_area">
                <form action="write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="title" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="writer" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="글을 작성하여 주세요(필수X)" ></textarea>
                    </div>
                    <div id="in_file">
                        <input type="file" name="upload_file[]" id="upload_file"  multiple required>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>