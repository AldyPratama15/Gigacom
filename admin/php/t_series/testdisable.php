<html>
<body>
<form method="POST" action="testdisable.php">
	<input type="text" name="inputan" value="Hadir" disabled>
	<input type="submit" name="tombol" value="Konfirmasi">
</form>
<?php
if (isset($_POST['tombol'])){
	echo $_POST['inputan'];
}
?>
</body>
</html>