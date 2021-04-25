<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody Seeker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        include('data.php');
     ?>
    <header>
    <h1 class="layout_header"> <span>Foody</span>Seeker</h1>
    </header>

    <div class="layout">
        <aside>
            <div id="searchBox" >
                <form method="get" action="">
                    <section>
                        <select id="getSelect">
                            <?php 
                                while($row = mysqli_fetch_array($getTable)){
                                    echo "<option id=".$row['id']." value=".$row['latitude'].'&'.$row['longitude'].">".$row['name']."</option>";
                                }    
                            ?>     
                        </select>
                        
                        <input type="button" value = "Search Area"/ onclick="changeCity('getSelect')">

                    </section>
                </form>
            </div>
            <div id="listTable">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Restaurants</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody id="Table">

                    </tbody>
                </table>
            </div>
        </aside>
    </div> 
        
    <div id="map">

    </div>

    
    <footer>

        <a href= "https://www.facebook.com/"><img class = "facebook" src="icons/facebook-icon.png"></a>   
        <a href= "https://www.instagram.com"><img class = "instagram" src="icons/instagram.png"></a>   
        <a href= "https://www.twitter.com"><img class = "twitter" src="icons/twitter.png"></a>

        <br>
    
        <h6>Info.Support.Marketing Terms of Use . Privacy Policy</h6>
        


        <h6>&copy; 2021 Foody Seeker</h6>
        
    </footer>
  
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVH59dXmPQDS50KAdfJ7VWiz9uwTGxjiI&callback=initMap&libraries=places&v=weekly" async></script>
</html>
