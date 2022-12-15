<?php 
// Include the database config file 
include_once 'includes/db_connection.php'; 
 
if(!empty($_POST["College_ID"])){ 
    // Fetch department data based on the specific college 
    $query = "SELECT * FROM department WHERE College_ID = ".$_POST['College_ID'].""; 
    $result = $conn->query($query); 
     
    // Generate HTML of department options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Department</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['Department_Name'].'">'.$row['Department_Name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Department not available</option>'; 
    } 
}
