<?php
session_start();
?>
<?php require_once('Connections/harry.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_student = "-1";
if (isset($_GET['txt_fullname'])) {
  $colname_student = $_GET['txt_fullname'];
}
mysql_select_db($database_harry, $harry);
$query_student = sprintf("SELECT * FROM student WHERE student_fullname = %s", GetSQLValueString($colname_student, "text"));
$student = mysql_query($query_student, $harry) or die(mysql_error());
$row_student = mysql_fetch_assoc($student);
$totalRows_student = mysql_num_rows($student);

$colname_house = "-1";
if (isset($_SESSION['hid'])) {
  $colname_house = $_SESSION['hid'];
}
mysql_select_db($database_harry, $harry);
$query_house = sprintf("SELECT * FROM house WHERE house_id = %s", GetSQLValueString($colname_house, "int"));
$house = mysql_query($query_house, $harry) or die(mysql_error());
$row_house = mysql_fetch_assoc($house);
$totalRows_house = mysql_num_rows($house);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        Hello, <?php echo $row_student['student_fullname']; ?> </h2>
                    <p>ยินดีด้วย คุณถูกเลือกให้อยู่ในบ้าน
                        <?php 
                        $_SESSION["hid"] =$row_student['house_id']; 
                        
                        //echo $_SESSION['hid'];
                        ?>.


                        <?php echo $row_house['house_name']; ?></p>
                    <form name="form1" method="post" action="">
                        <input name="hiddenField" type="hidden" id="hiddenField"
                            value="<?php echo $row_student['house_id']; ?>">
                    </form>
                    <p>
                        <a class="btn btn-primary btn-large" href="index.php">หน้าหลัก</a>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
<?php
mysql_free_result($student);

mysql_free_result($house);
?>