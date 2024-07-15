
<?php

include "../connection.php";
if(isset($_POST['deleteColor']) == "deleteColor")
{
    $colorID = $_POST['ID'];
    $colorData = '';
    $sql = " DELETE FROM `color` WHERE ID= ".$colorID."";
    $result = mysqli_query($connection, $sql );

    $sql = "SELECT * FROM `color`";
    $result = mysqli_query($conn, $sql);
                        $colorData = "Hello";
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
  
                echo "test^" . $provData;
}
