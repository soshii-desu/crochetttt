<?php
    include "../../connection.php";
    
        $category = $_POST['categoryName'];
       
        $sql ="INSERT INTO `category`(`Category`) VALUES ('$category') ";
        $result = mysqli_query($conn, $sql);

        
                        $sql = "SELECT * FROM `category`";
                        $result = mysqli_query($conn, $sql);
                      
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo('<div class="categoryCard">
                            
                            <p>'.$row['Category'].'</p>        
                                 
                            <button class="btn" id="ID" value="" onclick="deleteCategory('.$row['ID'].');">X</button>
                                    
                                    
                                   </div> ');


                        }

                       