<?php
include 'link-database.php';
$sql = "SELECT * FROM blog";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo"<tr height='45'><td>".$row['username']."</td>";
        echo"<td>".$row['date']."</td>";
        echo"<td>".$row['content']."</td></tr>";
    }
} else {
    echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($link);
}
//header("Refresh:0");
mysqli_close($link);
?>