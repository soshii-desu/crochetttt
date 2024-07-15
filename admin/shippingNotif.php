 <?php
 
 
 include "../connection.php";

 $num =0;
                            $sql = "SELECT * FROM `shiporders`";
                            $result = mysqli_query($conn, $sql);
                            while($fetch = mysqli_fetch_assoc($result))
                            {
                                $num++;
                            }
                            print_r($num);
                        ?>