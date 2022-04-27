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

mysql_select_db($database_harry, $harry);
$query_house = "SELECT * FROM house ORDER BY house_id ASC";
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
                        ระบบคัดสรรนักเรียน 50 คน เข้าบ้าน 4 หลัง
                    </h2>
                    <!--
                <img alt="Bootstrap Image Preview" src="img/banner2.png" class="rounded" />
-->
                    <form method="post" enctype="multipart/form-data" id="frm_addstudent" role="form">
                        <div class="form-group">

                            <label for="exampleInputEmail1">
                                ชื่อ - นามสกุล นักเรียน
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="txt_fullname" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            เพิ่มนักเรียน
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php do { ?>
            <div class="col-md-3">
                <h2>
                    <?php echo $row_house['house_name']; ?> </h2>
                <p>
                    <?php echo $row_house['house_detail']; ?></p>
                <p>
                    <a class="btn" href="house_view.php?houseid=<?php echo $row_house['house_id'];?>">View details »</a>
                </p>
            </div>
            <?php } while ($row_house = mysql_fetch_assoc($house)); ?>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
<?php
mysql_free_result($house);
?>