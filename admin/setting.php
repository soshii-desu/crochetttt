<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminDashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="setting.css">


    
    
    <title>Crochet By Jene</title>
</head>




<body>


<!-- MODAL FOR ADD COLOR -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form method="post" id="addColor" class="d-flex flex-column">
                <h4>Add Product Color</h4>

                <label for="">Pick Color</label>
                <input type="color" id="color" name="Color">

                <label for="">Color Name</label>
                <input type="text" id="colorName" name ="ColorName"class="form-control">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insertColor" id="insertColor"  class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- END OF MODAL FOR ADD COLOR -->


<!-- MODAL FOR ADD CATEGORY -->
<div class="modal fade " id="categoryForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-5 m5">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form method="post" id="addCategory" class="d-flex flex-column">
                <h4>Add Product Category</h4>

                
                <label for="">Category</label>
                <input required type="text" id="categoryName" name ="categoryName"class="form-control">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insertCategory" id="insertCategory"  class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- END OF MODAL FOR ADD CATEGORY -->

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo d-flex p-2 align-items-center justify-content-center">
            <div class="d-flex">
                <img class="p-2" height="100" src="../assets/images/1.png" alt="">
            </div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li ><a href="shop.php"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="users.php"><i class='bx bx-group'></i>Users</a></li>            
            <li><a href="orders.php"><i class='bx bx-cart'></i></i>Orders</a></li>

            <li class="active"><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
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


        <main>
            <div class="header">
                <div class="left">
                    <h1>Settings</h1>
                   
                </div>
            </div>
            <div class="product mt-4">
                <h2>Product</h2>
                <div class="color">
                    <div class="productHeader">
                    <h4>Color</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   Add Color
                    </button>
                        
                    </div>
                    
                    
                    <div id="productColor">
                    <?php
                        include '../connection.php';
                        $sql = "SELECT * FROM `color`";
                        $result = mysqli_query($conn, $sql);
                      
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo('
                            <div class="colorCard">
                            <div>
                            <div id="COLOR" style="width:60px; height:20px; background-color: '.$row['Color'].';"></div>
                            <p>'.$row['ColorName'].'</p>        
                            </div>       
                            <button class="btn" id="ID" value="" onclick="deleteColor('.$row['ID'].');">X</button>
                                    
                                    
                                   </div> 
                                    ');


                        }

                    ?>    
                     </div>
                </div>
                <div class="category">
                    <div class="categoryHeader">
                    <h4>Category</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryForm">
                        Add Category
                    </button>
                    </div>

                    <div id="categoryList">
                      <?php
                        include '../connection.php';
                        $sql = "SELECT * FROM `category`";
                        $result = mysqli_query($conn, $sql);
                      
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo('<div class="categoryCard">
                            
                            <p>'.$row['Category'].'</p>        
                                 
                            <button class="btn" id="ID" value="" onclick="deleteCategory('.$row['ID'].');">X</button>
                                    
                                    
                                   </div> ');


                        }

                    ?>    
                    </div>
                </div>

            </div>

        </main>

    </div>
<?php
    include 'adminAjax.js';
?>

    <script src="dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
<script>
    
</script>
       
</body>

</html>