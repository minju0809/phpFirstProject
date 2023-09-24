<?php include("top.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dataFilePath = "userdata.txt"; // 데이터를 저장할 파일 경로

  // 폼에서 제출된 데이터 가져오기
  $id = $_POST["id"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $call = $_POST["call"];

  if (!empty($id) && !empty($password) && !empty($name) && is_numeric($age) && strlen($call) <= 11) {
    // 데이터를 파일에 추가
    $data = "$id, $password, $name, $age, $call\n";
    file_put_contents($dataFilePath, $data, FILE_APPEND);

    echo "회원 가입이 성공적으로 완료되었습니다.";
  } else {
    echo "입력된 데이터가 유효하지 않습니다. 모든 필드를 채우고 나이와 전화번호는 숫자여야 하며, 전화번호는 11자 이하여야 합니다.";
  }
}
?>
<h2>회원가입</h2>
<section>
  <div align="center">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <table border=1>
        <tr>
          <td>
            <label for="id">ID</label>
          </td>
          <td>
            <input type="text" id="id" name="id" required><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="password">비밀번호</label>
          </td>
          <td>
            <input type="password" id="password" name="password" required><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="name">이름</label>
          </td>
          <td>
            <input type="text" id="name" name="name" required><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="age">나이</label>
          </td>
          <td>
            <input type="number" id="age" name="age" required><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="call">전화번호</label>
          </td>
          <td>
            <input type="text" id="call" name="call" maxlength="11" required><br>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="가입하기">
          </td>
        </tr>
      </table>
    </form>
</section>
</body>

</html>

<?php include("bottom.php") ?>