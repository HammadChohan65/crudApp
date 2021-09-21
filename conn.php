<?php
    $con = new mysqli($hostname='sql213.epizy.com',$username="epiz_29786892",$password="CVBi5I9dsq",$dbname="epiz_29786892_crud");
    if($con-> connect_error){
    echo 'connection failed  :  '. $conn->connect_error;
}
?>