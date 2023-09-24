<?php

// echo "MariaDB 연결 성공!";

// // 연결 닫기
// $conn->close();

// 데이터 파일 경로
$dataFilePath = "userdata.txt";

// 데이터 파일 읽기
$lines = file($dataFilePath, FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Index</title>
</head>

<body>
  <header>
    <h2> 쇼핑몰 회원관리 ver 1.0 </h2>
  </header>
  <nav>
    &emsp;&emsp; <a href="index.php">HOME</a>
    &emsp;&emsp; <a href="user_list.php">회원목록</a>
    &emsp;&emsp; <a href="board.php">게시판</a>
    &emsp;&emsp; <a href="signup.php">회원가입</a>
  </nav>