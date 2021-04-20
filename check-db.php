<!-- <#?php

include 'dbo.php';
$conn = OpenCon();
echo "Connected Successfully";

//Select users
// Attempt select query execution
$sql = "SELECT * FROM user_info";

if($result = mysqli_query($conn, $sql)){

    if(mysqli_num_rows($result) > 0){
       
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>username</th>";
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['iduser_info'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


CloseCon($conn);


?> -->