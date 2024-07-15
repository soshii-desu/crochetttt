<?php
    include "../../connection.php";
    
        $coloName = $_POST['ColorName'];
        $color = $_POST['Color'];
        $sql ="INSERT INTO `color`( `ColorName`, `Color`) VALUES ('$coloName','$color') ";
        $result = mysqli_query($conn, $sql);

        
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
                       