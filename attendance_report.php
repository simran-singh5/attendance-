<?php include('includes/db.php'); ?>
<?php include('includes/navbar.php'); ?>

<h2>Attendance Report</h2>

<form method="get">
  <label>Select Date: <input type="date" name="date" value="<?= $_GET['date'] ?? date('Y-m-d') ?>"></label>
  <input type="submit" value="Show Report">
</form>

<?php
if (isset($_GET['date'])) {
  $date = $_GET['date'];
  $sql = "SELECT s.name, a.status FROM attendance a JOIN students s ON a.student_id = s.id WHERE a.date = '$date'";
  $result = $conn->query($sql);

  echo "<h3>Attendance on $date</h3>";
  echo "<table><tr><th>Name</th><th>Status</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td><td>{$row['status']}</td></tr>";
  }
  echo "</table>";
}
?>
