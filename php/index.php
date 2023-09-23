<?php
// 데이터 파일 경로
$dataFilePath = "userdata.txt";

// 데이터 파일 읽기
$lines = file($dataFilePath, FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Insert title here</title>
  <style type="text/css">
    header {
      background-color: #0022ee;
      /* 배경색 */
      height: 90px;
      /* 높이 */
      line-height: 90px;
      /* 라인의 높이  */
      text-align: center;
      color: #ffffff;
    }

    nav {
      background-color: #6699ff;
      height: 40px;
      line-height: 40px;
      text-align: left;
      color: #ffffff;
    }

    section {
      background-color: #CCCCCC;
      min-height: 500px;
      /* 최소 높이 */
      text-align: left;
      font-size: 17px;
    }

    #divsection {
      margin: 20px;
    }

    footer {
      background-color: #2244ff;
      height: 40px;
      line-height: 40px;
      text-align: center;
      color: #ffffff;
      font-size: 17px;
    }
  </style>
</head>

<body>
  <header>
    <h2> 쇼핑몰 회원관리 ver 1.0 </h2>
  </header>
  <nav>
    &emsp;&emsp; <a href="index.php">HOME</a>
    &emsp;&emsp; <a href="member_list.php">회원목록 보기</a>
    &emsp;&emsp; <a href="test_list.php">Test 목록 보기</a>
    &emsp;&emsp; <a href="member.php">회원가입</a>
  </nav>

  <section>
    <br>
    <div id='divsection' align="center">
      <h2>회원관리 목록 보기</h2>
      <?php
      echo '<table border="1" width="500">';
      echo '<tr>
        <td>순번</td>
        <td>아이디</td>
        <td>비밀번호</td>
        <td>이름</td>
        <td>나이</td>
        <td>전화번호</td>
      </tr>';

      $count = 1;

      foreach ($lines as $line) {
        $data = explode(",", $line);

        $bgcolor = ($count % 2 == 0) ? "#aaffaa" : "#ccff00";

        echo '<tr bgcolor="' . $bgcolor . '">
            <td>' . $count . '</td>
            <td>' . $data[0] . '</td>
            <td>' . $data[1] . '</td>
            <td>' . $data[2] . '</td>
            <td>' . $data[3] . '</td>
            <td>' . $data[4] . '</td>
          </tr>';

        $count++;
      }

      echo '</table>';
      ?>

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

  <footer>
    HRDKOREA Copyright &copy 2018 ALL Rights resources Development Service of Korea
  </footer>
</body>

</html>