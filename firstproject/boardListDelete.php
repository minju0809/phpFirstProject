<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // POST 요청에서 record_id를 가져옵니다.
  $record_id = isset($_POST['record_id']) ? intval($_POST['record_id']) : null;

  if ($record_id !== null) {
    // board.txt 파일을 읽어와 레코드 목록을 저장합니다.
    $boardFilePath = "board.txt";
    $boardLines = file($boardFilePath, FILE_IGNORE_NEW_LINES);

    // 삭제할 레코드를 제외한 나머지 레코드를 저장할 배열을 생성합니다.
    $newBoardLines = array();

    foreach ($boardLines as $boardLine) {
      $data = explode(',', $boardLine);
      // $record_id 값을 이용하여 레코드를 삭제합니다.
      if (intval($data[0]) !== $record_id) {
        $newBoardLines[] = $boardLine;
      }
    }

    // board.txt 파일을 쓰기 모드로 열어 업데이트된 레코드 목록을 저장합니다.
    file_put_contents($boardFilePath, implode(PHP_EOL, $newBoardLines));

    // 삭제가 완료되면 다시 board.php로 리디렉션합니다.
    // header("Location: board.php");
    exit();
  }
}

// 삭제 후 리디렉션되는 경우 이 부분이 실행되지 않습니다.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>삭제 완료</title>
</head>
<body>
    <p>삭제되었습니다. <a href="board.php">게시판으로 돌아가기</a></p>
</body>
</html>
