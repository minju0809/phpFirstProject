<?php include("top.php");
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>

<h2>게시판</h2>
<section>
  <div align="center">
    <br>
    <?php

    $count = 0;
    // board.txt 파일 읽어오기
    $boardFilePath = "board.txt";
    $boardLines = file($boardFilePath, FILE_IGNORE_NEW_LINES);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // POST 요청에서 데이터를 가져옵니다.
      $title = isset($_POST['title']) ? $_POST['title'] : '';
      $content = isset($_POST['content']) ? $_POST['content'] : '';
      $name = isset($_POST['name']) ? $_POST['name'] : '';

      // 새로운 데이터를 작성일과 함께 board.txt 파일에 추가합니다.
      $newData = "$title, $content, $name, " . date("Y-m-d H:i") . "\n";
      file_put_contents($boardFilePath, $newData, FILE_APPEND);
    }
    ?>
    <table border="1" width=500>
      <tr>
        <td class="board_num">순번</td>
        <td class="board_title">제목</td>
        <td class="board_content">내용</td>
        <td class="board_name">작성자</td>
        <td class="board_date">작성일</td>
        <td class="board_delete">삭제</td>
      </tr>
      <?php
      foreach ($boardLines as $boardLine) {
        $data = explode(',', $boardLine);
        $count++;
        ?>
        <tr>
          <td>
            <?= $count ?>
          </td>
          <td>
            <?= isset($data[0]) ? $data[0] : ''; ?>
          </td>
          <td>
            <?= isset($data[1]) ? $data[1] : ''; ?>
          </td>
          <td>
            <?= isset($data[2]) ? $data[2] : ''; ?>
          </td>
          <td>
            <?= isset($data[3]) ? $data[3] : ''; ?>
          </td>
          <td>
            <form method="post" action="boardListDelete.php" onsubmit="return confirm('정말 삭제하시겠습니까?');">
              <input type="hidden" name="record_id" value="<?= $count ?>">
              <input type="submit" value="삭제">
            </form>
          </td>
        </tr>
        <?php
      }
      ?>
      <a href="boardForm.php">등록</a>
    </table>
  </div>
  <br>
</section>

<?php include("bottom.php") ?>