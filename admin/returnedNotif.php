 
 <?php
 
 
 include "../connection.php";


 $sql = "SELECT * FROM `returnedproducts`";
 $result = mysqli_query($conn, $sql);

$num=0;
 while($fetch = mysqli_fetch_assoc($result))
 {
    $num++;
 }
echo($num);

