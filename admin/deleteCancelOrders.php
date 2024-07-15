 <?php

           include "../connection.php";
    $id = $_POST['id'];

$sql = "SELECT * FROM `cancelledorders` WHERE ID='$id'";
$result  = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($result);
$prodID = $fetch['ProductID'];
$quan = $fetch['Quantity'];


$sql = "SELECT * FROM `products` WHERE ID='$prodID'";
$result  = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($result);

$backQuantity = $quan + $fetch['Quantity'];



$sql = "UPDATE `products` SET `Quantity`='$backQuantity' WHERE ID='$prodID'";
$res = mysqli_query($conn, $sql);


$sql = "DELETE FROM `cancelledorders` WHERE ID='$id'";
    $result = mysqli_query($conn, $sql);



            
            $sql = "SELECT * FROM `cancelledorders`";
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
                        
                      
                        <button class="btn btn-danger cancel" onclick="delete(<?=$row['ID']?>);" id="<?=$row['ID']?>" >Delete</button>
                        
                        </td>
                
                </tr>
            <?php
            }

           ?>