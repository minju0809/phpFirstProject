<h2>Member List
  &nbsp&nbsp(<a href=member_form.php>회원가입</a>)
</h2>

<?php
include 'dbconn.php';

$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];
echo $ch1;
if ($ch1 == null) {
  $sql = "SELECT id, passwd, name, reg_date FROM member";
} else if ($ch1 == 'id') {
  $sql = "SELECT * FROM member where id like '%$ch2%'";
} else if ($ch1 == 'name') {
  $sql = "SELECT * FROM member where name like '%$ch2%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  ?>
  <table border=1>
    <tr>
      <th>순번</th>
      <th>아이디</th>
      <th>암호</th>
      <th>이름</th>
      <th>날짜</th>
    </tr>
    <?
    $i = 0;
    while ($row = $result->fetch_assoc()) {
      $i++;
      ?>
      <tr>
        <td>
          <?= $i ?>
        </td>
        <td>
          <?= $row["id"] ?>
        </td>
        <td>
          <?= $row["passwd"] ?>
        </td>
        <td>
          <?= $row["name"] ?>
        </td>
        <td>
          <a href=member_delete.php?id=<?= $row["id"] ?>>
            <?= substr($row["reg_date"], 0, 10) ?>
          </a>
        </td>
      </tr>
      <?
    }
    ?>
  </table>

  <form>
    <select name=ch1>
      <option value='id'>아이디</option>
      <option value='name'>이름</option>
    </select>
    <input type=text name=ch2 size=10>
    <input type=submit value="검색하기">
    </form>

    <?
} else {
  echo "0 results";
}
$conn->close();
?>