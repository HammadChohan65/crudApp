<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    body{background-color:rgb(0,150,150);}
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
        require "conn.php";
        $qry = "select * from data where id=".$_GET['id'];
        $result = $con->query($qry);
        $data = $result-> fetch_assoc();
    ?>

<div class="container-fluid">
<!-- card open -->
<div class=" container p-2">
<div class="row">
<div class=" card col col-12 col-xl-10 m-auto">
  <div class="card-header d-flex justify-content-center" style="color:rgb(0,150,150);font-weight:bold;font-size:2vw;text-transform:uppercase;">
    Update
  </div>
<div class="card-body">
<!-- form open     -->
  <div class="container ">
    <form action="" method="POST">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required value="<?php echo $data['title']; ?>"> 
  <label for="title">Title</label>
</div>
<div class="form-floating">
  <input type="text" class="form-control" id="subtitle" placeholder="Enter Sub Title" name="subtitle" required value="<?php echo $data['subtitle'] ?>">
  <label for="subtitle">Sub Title</label>
</div>
<div class="form-floating my-3">
  <textarea class="form-control" placeholder="write discription here" id="disc" name="disc" value="<?php echo $data['disc'] ?>" required></textarea>
   <label for="disc">Description</label>
</div>
<button type="submit" class="btn btn-outline-success" name="subbtn">Update </button>
    </form>
</div>
  <!-- form close     -->

<?php
if(isset($_POST['subbtn'])){
    $title = $_POST['title']; 
    $subtitle = $_POST['subtitle']; 
    $disc = $_POST['disc']; 
    $qry3 = "update data set title='{$title}',subtitle='{$subtitle}', disc='{$disc}' where id={$data['id']}";
    if(!($con->query($qry3))){
        echo "data updation failed" .$qry3.$con->error;
    }else{echo "<div class='alert alert-success  fade show my-3' role='alert'>
  <strong>Congratulations!</strong> Data has been updated.
</div>";       }
}
?>
</div>
</div>
</div>
<!--   card close -->
</div>
</body>
</html>