<?php

include "../connection.php";
session_start();
$id = $_POST['id'];



$sql = "SELECT * FROM  `shiporders` WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);

$sql = "INSERT INTO `deliveredproduct`( `Photo`, `ProductName`, `Description`, `Price`, `Discount`, `Quantity`, `Color`, `ColorName`, `Category`, `CustomerID`, `ProductID`,`Fullname`, `Address`,`Month`, `Day`, `Year`) VALUES ('".$item['Photo']."','".$item['ProductName']."','".$item['Description']."','".$item['Price']."','".$item['Discount']."','".$item['Quantity']."','".$item['Color']."','".$item['ColorName']."','".$item['Category']."','".$item['CustomerID']."','".$item['ProductID']."' ,'".$item['Fullname']."', '".$item['Address']."','".$item['Month']."' ,'".$item['Day']."', '".$item['Year']."')";
    $result = mysqli_query($conn, $sql);

$sql = "DELETE FROM `shiporders` WHERE ID='$id'";
$result = mysqli_query($conn,$sql);



            $sql = "SELECT * FROM `shiporders`";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            { $deleteId = $row['ID'];
            ?>
                <tr>
                    <td>
                        <img width="100px" height="100px" src="../<?=$row['Photo']?>" alt="">
                    </td>
                    <td><?=$row['ProductName']?></td>
                    
                    <td><span>P </span><?=$row['Price']?></td>
                    <td><?=$row['Quantity']?></td>
                    <td><?=$row['Fullname']?></td>
                    <td><?=$row['CustomerID']?></td>
                    <td><?=$row['Address']?></td>
                    <td><?=$row['Month']?> <?=$row['Day']?> <?=$row['Year']?></td>
                   
                   
                    
                    <td class="">
                        
                  
                        <button class="btn btn-success" onclick="delivered(<?=$row['ID']?>);" id="<?=$row['ID']?>" >Delivered</button>
                        <button class="btn btn-danger" onclick="returned(<?=$row['ID']?>);" id="<?=$row['ID']?>">RTS</button>
                        </td>
                
                </tr>
            <?php
            }

           

$sql="SELECT * FROM `deliveredproduct` ";
$result = mysqli_query($conn, $sql);

$num =0;
while($fetch = mysqli_fetch_assoc($result))
{
    $num++;
}

?>


<script>
    packNotif();
    function packNotif()
{
     $.ajax({
            url: "deliveredNotif.php",
            type: "POST",
            
            
            success: function (response) {
                $("#packNum").html(response);
             
            },
            });
}

</script>


