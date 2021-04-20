<!-- <#?php
if( $_SERVER["REQUEST_METHOD"] == "POST"){

$comment = $_POST["comment"];
$iddrink = $_POST["iddrink"];
$iduser = $_POST["iduser"];

include 'dbo.php';
$conn = OpenCon();

$sql = "INSERT INTO COMMENTS ( iddrink, iduser, comment ) VALUES('$iddrink', '$iduser', '$comment')"; //change parameters accordingly

//Execute the sql query, with our connection, and sql statement, and return the results
if($result = mysqli_query($conn, $sql)){
    //added drink otherwise error
}

}
?> -->