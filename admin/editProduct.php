<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminDashboard.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="addProduct.css">
    <title>Crochet By Jene</title>
</head>



<?php
    include "../connection.php";

   
    // $_POST['pCategory'] = "";
     if(isset($_POST['editProduct']))
    {
       $id = $_GET['updateid'];
         
        if (count($_FILES) > 0) {
$folder = 'assets/images/productImages/';
            $allowed[] = 'image/png';
            $allowed[] = 'image/jpeg';

                if($_FILES['Photo']['name'] =="")
                {
                 $destination = $_POST['oldphoto'];
                }else
                
                {if ($_FILES['Photo']['error'] == 0 && in_array($_FILES['Photo']['type'], $allowed)) {

                
                    $destination = $folder . $_FILES['Photo']['name'];
                    $path = "C:/xampp/htdocs/CrochetByJeneV2/".$destination;
                       move_uploaded_file($_FILES['Photo']['tmp_name'], $path);

                }
                         
                        
                      
           }  $_POST['Photo'] = $destination;
        }            
         
        $Photo = $_POST['Photo'];
        $pName = $_POST['pName'];
        $description = $_POST['description'];
        $color = $_POST['pColor'];
        $category = $_POST['pCategory'];
        $Price = $_POST['Price'];
        $Discount = $_POST['Discount'];
        $Quantity = $_POST['Quantity'];
        $addDate = date("M ". " d". " Y" );

        $pColor =""; 
        foreach($color as $color )
        {
            $pColor .= '/'. $color;
        }
        

         $pCategory = "";
        foreach($category as $category )
        {
            $pCategory .= '/'. $category;
        }
        
        $sql = "UPDATE `products` SET`Photo`='$Photo',`ProductName`='$pName',`Description`='$description',`Price`='$Price',`Discount`='$Discount',`Quantity`='$Quantity',`Color`='$pColor',`Category`='$pCategory',`DateAdded`='$addDate' WHERE ID='$id' ";
        $result = mysqli_query($conn, $sql);
        header("Location:" . "shop.php");
  
    }
?>
<body>

    <!-- Sidebar -->
 <div class="sidebar">
        <a href="#" class="logo d-flex p-2 align-items-center justify-content-center">
            <div class="d-flex">
                <img class="p-2" height="100" src="../assets/images/1.png" alt="">
            </div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="active"><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="users.php"><i class='bx bx-group'></i>Users</a></li>            
            <li><a href="orders.php"><i class='bx bx-cart'></i></i>Orders</a></li>

            <li><a href="setting.php"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div> 
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i id="burger" class='bx bx-menu'></i>
            
           
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Products</h1>
                   
                </div>
                <div class="right">
                    <a class="active" href=""><i class='bx bx-list-ol'></i></a>
                    <a href=""><i class='bx bx-image'></i></a>
                </div>
            </div>

            <?php
                $id  = $_GET['updateid'];
                include "../connection.php";
                $sql = "SELECT * from `products` WHERE ID = '$id'";
                $result = mysqli_query($conn, $sql);
                $fetch = mysqli_fetch_assoc($result);
              

            ?>
            <div class="addForm">
                <form action=""  method="POST"  enctype="multipart/form-data">
                    <div>
                        <label for="">Image</label>
                        <input  type="file" value="<?=$fetch['Photo']?>" name="Photo" class="form-control"> 
                    </div>
                    <input hidden type="text" name="oldphoto" value="<?=$fetch['Photo']?>">
                    <div>
                        <label for="">Product Name</label>
                        <input  type="text" value="<?=$fetch['ProductName']?>"  name="pName" class="form-control">                        
                    </div>

                    <div class="w-100">
                        <label for="">Product Discription</label>
                        <input   type="text" value="<?=$fetch['Description']?>"  name="description" class="form-control">                   
                    </div>
                    <div></div>
                    <div class="checkbox align-items-center me-2 border border-secondary">
                        
                         <p>Color</p>
                         <div class="cb">

                         
                        <?php
                        $a = 0;
                            $sql = "SELECT * FROM color";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                
                            ?><div class=" d-flex">
                                <input <?php if($a==0){echo("checked");$a++;}?>  class="me-1" type="checkbox"  name="pColor[]" value="<?=$row['Color']?>" ><div style="height:30px; width:30px; background-color:<?=$row['Color']?>;"></div>
                           </div> <?php
                           
                            }

                        ?>
                        </div>
                    </div>
                    
                    <div class="checkbox me-2 border border-secondary">
                        <p>Category</p>
                        <div class="cb">

                        
                        <?php
                         $a = 0;
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <input <?php if($a==0){echo("checked");$a++;}?> class="me-1" type="checkbox" name="pCategory[]" value="<?=$row['Category']?>" ><?=$row['Category']?>
                            <?php
                            }

                        ?>
                        </div>
                    </div>
                    

                    <div>
                        <label for="">Price</label>
                        <input  type="number" value="<?=$fetch['Price']?>"  class="form-control" name="Price">
   
                    </div>
                    
                    <div>
                        <label for="">Discount</label>
                        <input  type="number" value="<?=$fetch['Discount']?>"  name="Discount" class="form-control" placeholder="Leave if none">    
                    </div>
                    
                    <div>
                    <label for="">Quantity</label>
                    <input  type="number" value="<?=$fetch['Quantity']?>"   name="Quantity" class="form-control" >    
                    </div>
                    <div></div>
                    <div class="d-flex">
                    <button type="submit" name="editProduct" class="btn btn-success w-25 p-1 me-2">Add Product</button>
                    <a href="shop.php" class="btn btn-secondary w-25 p-1"> Cancel</a>    
                    </div>
                    
                </form>


            </div>

        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/javascript/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    
    <script src="dashboard.js"></script>
    <script src="product.js"></script>
</body>

</html>