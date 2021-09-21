<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
        body{background-color:rgb(0,150,150);}
        .container input,.container textarea{border-width:0rem 0rem 0.25rem 0rem;}
        .details h5,.details h6,.details div.icon,.details p {display:inline-block;}
        div.icon{float:right;}
        .icon i {font-size:1.5vw;}
        .fa-edit{color:green;}
        .fa-trash-alt{color:red;}
        .form-control:focus {
          border-color: rgb(0,150,150);
          box-shadow: none;
        }
        /* .details{display:flex;flex-direction:column;} */
        
    </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container-fluid p-2" style="background-color:rgb(0,150,150);height:100vh;">
<!-- card open -->
<div class=" container ">
<div class="row">
<div class=" card col col-12 col-xl-10 m-auto">
  <div class="card-header d-flex justify-content-center" style="color:rgb(0,150,150);font-weight:bold;font-size:2vw;text-transform:uppercase;">
    Crud Application (TODO)
  </div>
<div class="card-body">
<!-- form open     -->
  <div class="container ">
    <form action="" method="POST">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
  <label for="title">Title</label>
</div>
<div class="form-floating">
  <input type="text" class="form-control" id="subtitle" placeholder="Enter Sub Title" name="subtitle" required>
  <label for="subtitle">Sub Title</label>
</div>
<div class="form-floating my-3">
  <textarea class="form-control" placeholder="write discription here" id="disc" name="disc" required></textarea>
  <label for="disc">Description</label>
</div>
<button type="submit" class="btn btn-outline-success" name="subbtn"> Add </button>
    </form>
</div>
  <!-- form close     -->
    
</div>
  
<!-- details open -->
<!-- insert data start-->
<?php
    require "conn.php"; 
if(isset($_POST['subbtn'])){       
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $disc = $_POST['disc'];
    
    $qry = "insert into data values(null,'{$title}','{$subtitle}','{$disc}')";
    if(!($con->query($qry))){
        echo "data insertion failed check query and error".$qry.' '.$con->error;
    }else{
        //header('Location : http://localhost/webdev/crud2');
        $id = $con->insert_id;
    }
// <!-- insert data end -->

  //$id = $con->insert_id;
  $qry2 = "select * from data";
  $result = $con->query($qry2);
  if(!($data = $result->fetch_assoc())){
    echo "couldn't fetch any data";
  }else{
  while($data = $result->fetch_assoc()){
    echo "<div class='container details' style='border:1px dashed rgba(250,150,0,0.3);padding:0.5rem 0.3rem;margin:0.5rem 0.3rem;'>
     <div><h5>{$data['title']}</h5> <div class='icon'> <a href='update.php/?id= {$data['id']} '> <i class='fas fa-edit '></i></a>  </div></div>
    <div><h6>{$data['subtitle']}</h6> </div>
    <div><p>{$data['disc']}</p> <div class='icon'> <a href='delete.php/?id= {$data['id']} '> <i class='fas fa-trash-alt'></i></a> </div> </div>
  </div>";
// $data['id'];
  }}
}

?>

<!-- details close -->
</div>
</div>
</div>
<!-- card close -->


</body>
</html>