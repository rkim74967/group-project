<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodySeeker - Restaurant Search Engine</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
    <?php
        include('data.php');
     ?>
    <header>
    <img src="logos/WEB-logo.png" alt="FoodySeekerLogo">
    </header>
        <div class="container-fluid">
            <aside>
                <div id="dropBox" >
                    <form method="get" action="">
                        <section>
                            <select id="getSelect">
                                <?php 
                                    while($row = mysqli_fetch_array($getTable)){
                                        echo "<option id=".$row['id']." value=".$row['latitude'].'&'.$row['longitude'].">".$row['name']."</option>";
                                    }    
                                ?>     
                            </select>
                            
                            <input id = "button" type="button" value = "Search Area" onclick="changeCity('getSelect')">
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
        

            <div id="map">
            </div>
        </div> 
    </div>
    <div id="footerdiv">
        <footer class="footer-distributed">

			<div class="footer-left">
				<h3><img src="logos/footerlogo_1.png" alt="FoodySeekerLogo">ABOUT<span>FOODYSEEKER</span></h3>
                
				<p class="footer-links">
					<a href="#">Home</a>
					|
					<a href="#">Blog</a>
					|
					<a href="#">About</a>
					|
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">© 2021 FoodySeeker</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>300 Pompton Rd, Wayne, NJ 07470</span>
						United States</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p><a href="tel:973-456-7890">(973)968-8121</a> </p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@foodyseeker.com">eatery@foodyseeker.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					Tired of eating at bad restaurants?<br>We got you covered.<br>Just choose a city and leave the rest to us. </p>
				<div class="footer-icons">
					<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
					<a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
					<a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
					<a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
					<a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer>
    </div>
  
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVH59dXmPQDS50KAdfJ7VWiz9uwTGxjiI&callback=initMap&libraries=places&v=weekly" async></script>
</html>
