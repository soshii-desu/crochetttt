<?php
include "../../connection.php";

 if(isset($_POST['action']))
 {
    if($_POST['action'] == "delete")
    {
        delete();
    }
 }
 if(isset($_POST['action']))
 {
    if($_POST['action'] == "deleteCategory")
    {
        deleteCategory();
    }
 }


 function delete()
 {
    global $conn;
    $id = $_POST['id'];

    $sql = "DELETE FROM `color`  WHERE ID='$id'";
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
                       
 }

 function deleteCategory()
 {
    global $conn;
    $id = $_POST['id'];

    $sql = "DELETE FROM `category`  WHERE ID='$id'";
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
                        }
                       
 