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

    include 'roleCheck.php';

?>
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
            <li class="active"><a href="#"><i class='bx bx-group'></i>Users</a></li>            
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

        <main>
            <div class="header">
                <div class="left">
                    <h1>Users</h1>
                   
                </div>
                <div class="right d-flex align-items-center">
                    
                    <a class="active" href=""><i class='bx bx-list-ol'></i></a>
                    <a href=""><i class='bx bx-image'></i></a>
                </div>
            </div>
            

    <div class="table-responsive  " style="width:100%" > 
        
            <table id="example"  class="table table-bordered border-dark " style="width:100%" >
                
        <thead>
            <tr>
                <th>Photo</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th >Address</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
          <?php

           include "../connection.php";
            
            $sql = "SELECT * FROM `users` WHERE Role='User'";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            { $deleteId = $row['ID'];
            ?>
                <tr>
                    <td>
                        <img width="100px" height="100px" src="../customer/<?=$row['Photo']?>" alt="">
                    </td>
                    <td><?=$row['Firstname']?></td>
                    <td><?=$row['Middlename']?></td>
                    <td><?=$row['Lastname']?></td>
                    <td><?=$row['Email']?></td>
                    <td><?=$row['PhoneNumber']?></td>
                    
                    <td>
                    <?php
                  
                        $address = "dsad";
                            $sql1 = "SELECT * FROM refregion where regCode = '".$row['Region']."'";
                            $result1 = mysqli_query($conn, $sql1);
                            $fetch1 = mysqli_fetch_assoc($result1);
                            $address = $fetch1['regDesc'];

                            $sql2 = "SELECT * FROM refprovince where provCode ='".$row['Province']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $fetch2 = mysqli_fetch_assoc($result2);
                            $address .= "/" . $fetch2['provDesc'];

                            $sql3 = "SELECT * FROM refcitymun where citymunCode = '".$row['City']."'";
                            $result3 = mysqli_query($conn, $sql3);
                            $fetch3 = mysqli_fetch_assoc($result3);
                            $address .= "/" . $fetch3['citymunDesc'];

                            $sql4 = "SELECT * FROM refbrgy where brgyCode = '".$row['Barangay']."'";
                            $result4 = mysqli_query($conn, $sql4);
                            $fetch4 = mysqli_fetch_assoc($result4);
                            $address .= "/" . $fetch4['brgyDesc'];
                            $address .= "/" . $row['St'];

                    print_r($address);
                    ?>
                    
                    </td>
                    <td><?=$row['RegistrationDate']?></td>
                    
                   
                    <td>
                        
                        <button type="button" class="btn btn-danger deleteProductbtn" onclick="deleteProductbtn();" id="<?=$row['ID']?>"  >
                        Delete
                        </button>
                    </td>
                
                </tr>
            <?php
            }

           ?>
        </tbody>
        
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
</body>

</html>