<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminDashboard.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <title>Crochet By Jene</title>
</head>

<body>
<?php
    include "roleCheck.php"

?>
<!-- /////////////////////////////////MODALS////////////////////////////// -->
<!-- DELETE -->


<!-- Modal -->
















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
                <a href="../login.php" class="logout">
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
<!-- Button trigger modal -->

        <main  class="pb-5">
            <div class="header">
                <div class="left">
                    <h1>Products</h1>
                   
                </div>
                <div class="right">   
                    <a href="addProduct.php" class="btn btn-success">Add Product</a>
                </div>
            </div>
            <div class="tableAction">
                

             

                <!-- <div class="rightButton">
                    <a href="" class="btn btn-danger">Cancelled</a>
                    <a href="" class="btn btn-success">Packing</a>
                    <a href="" class="btn btn-warning">Cancelled</a>
                    <a href="" class="btn btn-primary">Cancelled</a>
                </div> -->


            </div>

    <div class="table-responsive" >
            <table id="example" class="table table-striped" style="width:100%" >
        <thead>
            <tr>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Discription</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Qantity</th>
                <th>Color</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
           <?php

           include "../connection.php";
            
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
                        <a href="editProduct.php?updateid=<?=$row['ID']?>" class="btn btn-success">Edit</a>
                        </td>
                
                </tr>
            <?php
            }

           ?>
        </tbody>

        <!--  -->
     <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <script>
            
        </script>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to Delete this product</h1>
        <button type="button" class="btn btn-danger" onclick="deleteColor();" data-bs-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
      
    </div>
  </div>
</div>
<!--  -->
    </table>
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
    <script>
        $(document).on("click", ".deleteProductbtn", function(e){
           e.preventDefault();
           var id = $(this).attr('id');
           if(confirm("Are you sure you want to delete this Data"))
           {
            $.ajax({
                method: "POST",
                url: "shop/delete.php",
                data: {
                    id: id
                },
                success: function (response) {
                     $("#tableBody").html(response);
                }
            });
           }
           
        })
    </script>
    <?php
    include 'adminAjax.js';
?>
</body>

</html>