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

This will get the latitude and longitude from the database but needs work

if( $_SERVER["REQUEST_METHOD"] == "GET"){

$lat = $_GET["latitude"];
$lng = $_GET["longitude"];


include 'dbo.php';
$conn = OpenCon();


$sql = "SELECT latitude, longitude FROM our_table;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    send to JS file Lat and Lng to appear on map
  }
} else {

  echo "0 results";
}

}
?> -->