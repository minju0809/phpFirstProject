<?php include("top.php") ?>

<h2>회원관리 목록 보기</h2>
<section>
  <div align="center">
    <br>
    <?php

    $ch1 = isset($_GET["ch1"]) ? $_GET["ch1"] : '';
    $ch2 = isset($_GET["ch2"]) ? $_GET["ch2"] : '';
    // echo "ch1: " . $ch1 . ", ch2: " . $ch2;
    $results = array();
    $count = 1;

    echo '<table border="1" width="500">';
    echo '<tr>
        <td>순번</td>
        <td>아이디</td>
        <td>비밀번호</td>
        <td>이름</td>
        <td>나이</td>
        <td>전화번호</td>
      </tr>';

    foreach ($lines as $line) {
      $data = explode(",", $line);

      // 검색 조건이 비어 있으면 모든 레코드를 추가
      if (empty($ch1) && empty($ch2)) {
        $results[] = $line;
      } elseif ($ch1 === 'id' && strpos($data[0], $ch2) !== false) {
        $results[] = $line;
      } elseif ($ch1 === 'name' && strpos($data[2], $ch2) !== false) {
        $results[] = $line;
      }
    }

    // 결과 출력
    foreach ($results as $result) {
      $data = explode(',', $result);
      $bgcolor = ($count % 2 == 0) ? "#aaffaa" : "#ccff00";

      $formattedPhoneNumber = substr($data[4], 1, 3) . '-' . substr($data[4], 4, 4) . '-' . substr($data[4], 8);

      echo '<tr bgcolor="' . $bgcolor . '">
      <td>' . $count . '</td>
      <td>' . $data[0] . '</td>
      <td>' . $data[1] . '</td> 
      <td>' . $data[2] . '</td>
      <td>' . $data[3] . '</td>
      <td>' . $formattedPhoneNumber . '</td>
    </tr>';
      $count++;
    }

    echo '</table>';
    ?>
    <br>
    <form>
      <select name="ch1">
        <option value="id">아이디</option>
        <option value="name">이름</option>
      </select>
      <input name="ch2" type="text">
      <input type="submit" value="검색하기">
    </form>
  </div>
  <br>
</section>

<?php include("bottom.php") ?>