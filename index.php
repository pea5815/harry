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
mysql_select_db($database_harry, $harry);
$query_student = "SELECT * FROM student";
$student = mysql_query($query_student, $harry) or die(mysql_error());
$row_student = mysql_fetch_assoc($student);
$totalRows_student = mysql_num_rows($student);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_select_db($database_harry, $harry);
$query_house = "SELECT * FROM house ORDER BY house_id ASC";
$house = mysql_query($query_house, $harry) or die(mysql_error());
$row_house = mysql_fetch_assoc($house);
$totalRows_house = mysql_num_rows($house);

if ((isset($_GET["MM_insert"])) && ($_GET["MM_insert"] == "frm_addstudent")) {
    
        if($totalRows_student<50){
            
                $items = array(1, 2, 3, 4);
                $h_id=$items[array_rand($items)];
            echo "สุ่มได้บ้าน = ".$h_id;
            echo "</br>";
            echo "min = ".$_SESSION["house_min"];
            
            /*
            $insertSQL = sprintf("INSERT INTO student (student_fullname, house_id) VALUES (%s,'$h_id')",
                                GetSQLValueString($_GET['txt_fullname'], "text"));

            mysql_select_db($database_harry, $harry);
            $Result1 = mysql_query($insertSQL, $harry) or die(mysql_error());

            $insertGoTo = "process.php";
            if (isset($_SERVER['QUERY_STRING'])) {
                $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                $insertGoTo .= $_SERVER['QUERY_STRING'];
            }
            header(sprintf("Location: %s", $insertGoTo));
            */
            
    }else{
        echo "จำนวนนักเรียน ครบ 50 คนแล้วจ้า";
    }
    
}






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
                    <form action="<?php echo $editFormAction; ?>" name="frm_addstudent" method="get"
                        enctype="multipart/form-data" id="frm_addstudent" role="form">
                        <div class="form-group">

                            <label for="exampleInputEmail1">
                                ชื่อ - นามสกุล นักเรียน (<?php echo $totalRows_student ?>)
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="txt_fullname"
                                required />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            เพิ่มนักเรียน
                        </button>
                        <input type="hidden" name="MM_insert" value="frm_addstudent">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php do { ?>
            <div class="col-md-3">
                <h2>
                    <?php 
                    echo $row_house['house_name']; 
                    $hid1 = $row_house['house_id'];
                    $sql = "SELECT * FROM student where house_id='$hid1'";
                    $row = mysql_query($sql);
                    $nrow = mysql_num_rows($row);
                    echo $nrow;
                    if($hid1=="1"){
                        $_SESSION["house_session1"]=$nrow;
                    }
                    if($hid1=="2"){
                        $_SESSION["house_session2"]=$nrow;
                    }
                    if($hid1=="3"){
                        $_SESSION["house_session3"]=$nrow;
                    }
                    if($hid1=="4"){
                        $_SESSION["house_session4"]=$nrow;
                    }
                    ?>

                </h2>
                <p>
                    <?php echo $row_house['house_detail']; ?></p>
                <p>
                    <a class="btn" href="house_view.php?houseid=<?php echo $row_house['house_id'];?>">View details »</a>
                </p>
            </div>
            <?php } while ($row_house = mysql_fetch_assoc($house)); ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo "house_session1 = ".$_SESSION["house_session1"];?>
                </br>
                <?php echo "house_session2 = ".$_SESSION["house_session2"];?>
                </br>
                <?php echo "house_session3 = ".$_SESSION["house_session3"];?>
                </br>
                <?php echo "house_session4 = ".$_SESSION["house_session4"];?>
                </br>

                <?php
                    $a = array($_SESSION["house_session1"], $_SESSION["house_session2"], $_SESSION["house_session3"], $_SESSION["house_session4"]);
                    print_r( $a );
                    echo "<br/>";
                    $_SESSION["house_max"]=max( $a );
                    echo "ค่ามากที่สุดของ array คือ ".max( $a );
                    echo "<br/>";
                    $_SESSION["house_min"]=min( $a );
                    echo "ค่าน้อยที่สุดของ array คือ ".min( $a );
                ?>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
<?php
mysql_free_result($house);

mysql_free_result($student);
?>