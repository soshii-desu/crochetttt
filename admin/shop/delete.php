<?php


include "../../connection.php";


extract($_POST);
?>

<?php
if(isset($id))
{
$sql = "DELETE FROM `products` WHERE  ID='".$id."'";
$result = mysqli_query($conn,$sql);
}


 $sql = "SELECT * FROM products";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            { $deleteId = $row['ID'];
            ?>
                <tr>
                    <td>
                        <img width="100px" height="100px" src="../<?=$row['Photo']?>" alt="">
                    </td>
                    <td><?=$row['ProductName']?></td>
                    <td><?=$row['Description']?></td>
                    <td><span>P </span><?=$row['Price']?></td>
                    <td><?=$row['Discount']?></td>
                    <td><?=$row['Quantity']?></td>
                    <td class="">
                    <?php 
                    $colorSql = "SELECT `color` FROM `products` WHERE ID='".$row['ID']."'";

                    $fetch= mysqli_fetch_assoc(mysqli_query($conn,$colorSql));
                    $color = explode("/",$fetch['color']);
                    foreach($color as $color)
                    {

                    
                    ?>
                   <div style="width:30px; height:30px; background-color: <?=$color?>"></div>
                    <?php
                    }
                    ?>
                   </td>
                    <td><?=$row['Category']?></td>
                    <td class="">
                        
                        <button type="button" class="btn btn-danger deleteProductbtn" onclick="deleteProductbtn();" id="<?=$row['ID']?>"  >
                        
                        Delete
                        </button>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                
                </tr>
            <?php
            }

           ?>