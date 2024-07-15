<!DOCTYPE html>
<html lang="en">
<?php

include "../connection.php";

session_start();

if(!isset($_SESSION['USER'])) {
    header ("Location: ". "../login.php");
}
else{
    if($_SESSION['USER']['Role']== "Admin")
    {

    }
    elseif($_SESSION['USER']['Role']== "User"){
        header ("Location: ". "../customer/Home.php");
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Crochet By Jene</title>
    <link rel="stylesheet" href="adminDashboard.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo d-flex p-2 align-items-center justify-content-center">
            <div class="d-flex">
                <img class="p-2" height="100" src="../assets/images/1.png" alt="">
            </div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="shop.php"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="users.php"><i class='bx bx-group'></i>Users</a></li>            
            <li><a href="orders.php"><i class='bx bx-cart'></i></i>Orders</a></li>

            <li><a href="setting.php"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
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
                    <h1>Dashboard</h1>
                  
                </div>
                
            </div>

            <!-- Insights -->
            <ul class="insights ">
                <li>
                    <img src="AdminDashboardIcon/Product.png" alt="">
                    <span class="info">
                        <h3>
                            <?php

                            $sql = "SELECT * FROM `products`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:20px">No Product</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Products</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/Users.png" alt="">
                    <span class="info">
                        <h3>
                            <?php

                            $sql = "SELECT * FROM `users`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:20px">No User</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Users</p>
                    </span>
                </li>
                <li onclick="order();">
                    <img src="AdminDashboardIcon/Order.png" alt="">
                    <span class="info">
                        <h3>
                          <?php

                            $sql = "SELECT * FROM `productorder`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:20px">No order</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Order</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/Packaging.png" alt="">
                    <span class="info">
                        <h3>
                            <?php

                            $sql = "SELECT * FROM `packing`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:15px">No Record</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Packing</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/Shipping.png" alt="">
                    <span class="info">
                        <h3>
                            <?php

                            $sql = "SELECT * FROM `shiporders`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:15px">No Record</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Shipping</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/Cancelled.png" alt="">
                    <span class="info">
                        <h3>
                             <?php

                            $sql = "SELECT * FROM `cancelledorders`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:15px">No Record</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>Cancelled</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/rts.png" alt="">
                    <span class="info">
                        <h3>
                             <?php

                            $sql = "SELECT * FROM `returnedproducts`";
                            $result = mysqli_query($conn, $sql);
                            $a = 0;
                             
                            while($row = mysqli_fetch_assoc($result))
                                {
                                    $a++;
                                }
                            if($a==0)
                            {
                            ?>
                                <p style="font-size:15px">No Record</p>
                            <?php
                            }
                            else{
                                ?>
                              <?=$a?>
                              
                            <?php
                            }
                            ?>
                        </h3>
                        <p>RTS</p>
                    </span>
                </li>
                <li>
                    <img src="AdminDashboardIcon/Peso.png" alt="">
                    <span class="info">
                        <h3>
                           <?php
                            $monthNow = date("M");
                            $dayNow = date("j");
                            $yearNow = date("Y");

                            $sql = "SELECT * FROM `deliveredproduct` WHERE Month='$monthNow' AND Year = '$yearNow'";
                            $result = mysqli_query($conn, $sql);
                            $revenues = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $revenues += $row['Price'];
                            }
                            if($revenues==0)
                            {
                                ?>
                                <p style="font-size:15px">No Record</p>
                                <?php
                                }
                                else{
                                    ?>
                                    <?=$revenues?>
                                    <?php
                                    }

    
                           ?>
                        </h3>
                        <p>Revenues</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->
<hr class="mt-4 mt-3">
            <div class="bottomContent">
                <div class="stat">
                    <div class="bottomHeader">
                        <h3>Sale for this Year </h3>
                        
                    </div>
                    <div class="saleTable">
                    <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="ranking">
                    <div class="bottomHeade">
                        <h3>Ranking</h3>
                    </div>
                </div>
            </div>
            

        </main>

        <?php
        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'Jan'";
            $result = mysqli_query($conn, $select);
          
            $Jan=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Jan++;
            }
            
        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'Feb'";
            $result = mysqli_query($conn, $select);
          
            $Feb=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Feb++;
            }
            
            
        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'Mar'";
            $result = mysqli_query($conn, $select);
          
            $Mar=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Mar++;
            }

            
            
            
        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'Apr'";
            $result = mysqli_query($conn, $select);
          
            $Apr=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Apr++;
            }

            
            
            
        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'May'";
            $result = mysqli_query($conn, $select);
          
            $May=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $May++;
            }

            
            

        
            $select ="SELECT * FROM `deliveredproduct` where Month = 'Jun'";
            $result = mysqli_query($conn, $select);
          
            $Jun=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Jun++;
            }
            



            $select ="SELECT * FROM `deliveredproduct` where Month = 'Jul'";
            $result = mysqli_query($conn, $select);
          
            $Jul=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Jul++;
            }
           

            $select ="SELECT * FROM `deliveredproduct` where Month = 'Aug'";
            $result = mysqli_query($conn, $select);
          
            $Aug=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Aug++;
            }
           
           

            $select ="SELECT * FROM `deliveredproduct` where Month = 'Sep'";
            $result = mysqli_query($conn, $select);
          
            $Sep=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Sep++;
            }
           
           

            $select ="SELECT * FROM `deliveredproduct` where Month = 'Oct'";
            $result = mysqli_query($conn, $select);
          
            $Oct=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Oct++;
            }
           

            $select ="SELECT * FROM `deliveredproduct` where Month = 'Nov'";
            $result = mysqli_query($conn, $select);
          
            $Nov=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Nov++;
            }

            $select ="SELECT * FROM `deliveredproduct` where Month = 'Dec'";
            $result = mysqli_query($conn, $select);
          
            $Dec=0;   
            while($row = mysqli_fetch_assoc($result))
            {
                $Dec++;
            }
           
           
     
        ?>
        

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Sale',
        data: [<?=$Jan?>, <?=$Feb?>, <?=$Mar?>, <?=$Apr?>, <?=$May?>,<?=$Jun?> ,<?=$Jul?>, <?=$Aug?>, <?=$Sep?>, <?=$Oct?>, <?=$Nov?>, <?=$Dec?>],

        borderWidth: 1
      }]
    },
    options: {
      
    }
  });
</script>
 <script>
    function order()
    {
        window.location.replace("orders.php");
    }
 </script>
    <script src="dashboard.js"></script>
</body>

</html>