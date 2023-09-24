<?php include("top.php"); ?>

<h2>게시판 글 작성</h2>
<section>
  <div align="center">
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $dataFilePath = "board.txt"; // 데이터를 저장할 파일 경로

      // 폼에서 제출된 데이터 가져오기
      $title = $_POST["title"];
      $content = $_POST["content"];
      $name = $_POST["name"];
      $date = $_POST["date"];

      // 입력 데이터 유효성 검사 (이 부분을 필요에 따라 보다 엄격하게 변경할 수 있습니다)
      if (!empty($title) && !empty($content) && !empty($name)) {
        // 데이터를 파일에 추가
        $data = "$title, $content, $name, " . date("Y-m-d H:i") . "\n";
        file_put_contents($dataFilePath, $data, FILE_APPEND);

        // 게시글 추가 후 리다이렉션
        header("Location: board.php");
        exit(); // 스크립트 실행 중지
      } else {
        echo "내용을 입력해주세요.";
      }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <table border="1">
        <tr>
          <td>
            <label for="title">제목:</label>
          </td>
          <td>
            <input type="text" name="title" required><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="content">내용:</label>
          </td>
          <td>
            <textarea name="content" required></textarea><br>
          </td>
        </tr>
        <tr>
          <td>
            <label for="name">작성자:</label>
          </td>
          <td>
            <input type="text" name="name" required><br>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" value="등록">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <br>
</section>

<?php include("bottom.php"); ?>
