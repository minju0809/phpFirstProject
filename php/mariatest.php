<h1>dlfis1241je</h1>

<?php
$servername = "172.22.0.2"; 
$username = "superuser";          
$password = "1234";    
// MariaDB에서 데이터베이스 선택 (필요한 경우)
$dbname = "firstdb"; // 사용할 데이터베이스 이름

// MariaDB에 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("MariaDB 연결 실패: " . $conn->connect_error);
} else {
    echo "MariaDB와 연결되었습니다.<br>";
}

if ($conn->select_db($dbname) === false) {
    die("데이터베이스 선택 실패: " . $conn->error);
} else {
    echo "데이터베이스 '$dbname' 선택 완료.<br>";
}

// 여기에 웹 애플리케이션 코드를 작성합니다.

// MariaDB 연결 종료
$conn->close();
?>