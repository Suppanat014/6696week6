<!DOCTYPE html>
<html lang="en">
<?php
    include("conn.php");
?>
<head>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--แทรก font  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

<style>
    body{
        font-family: "Itim", serif;
        font-weight: 400;
        font-style: normal;
    }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างฟอร์ม Boostrap เขียนโปรแกรม</title>


</head>

<body>
    <h1>อาหารที่น่าสนใจ</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ประเภทอาหาร</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputEmail3"name='typefood'>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">ประเทศ</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputPassword3"name='country'>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">เมนู</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="inputPassword3"name='menu'>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">จำนวนที่สั่ง</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="inputPassword3"name='orderfood'>
    </div>
  </div>
  
  <button type="submit" class="btn btn-success">อร่อยยยย!</button>
  <button type="reset" class="btn btn-dark">ยกเลิกคำสั่งซื้อ</button>

</form>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $typefood=$_POST['typefood'];
    $country=$_POST['country'];
    $menu=$_POST['menu'];
    $orderfood=$_POST['orderfood'];

//  เพิ่มข้อมูล
    try {

        $sql = "INSERT INTO food (typefood, country, menu, orderfood)
        VALUES('$typefood', '$country', '$menu','$orderfood')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<div class='alert alert-success'>
        <strong>สำเร็จ!</strong>ยินดีด้วยจ้า คุณบันทึกข้อมูลเข้าไปใหม่ 1 รายการ</div>";
      } catch(PDOException $e) {
        echo $sql . "บันทึกรายการอาหารผิดพลาด<br>" . $e->getMessage();
      }
      
      $conn = null;


}
?>
</body>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>