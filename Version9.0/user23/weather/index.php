<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://documenu.p.rapidapi.com/restaurant/4072702673999819",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-api-key: e58c44112c03f9bcc4f167cfd55cda7d",
		"x-rapidapi-host: documenu.p.rapidapi.com",
		"x-rapidapi-key: 623a1c06b2msh3d2a49ff21f16dfp1dd057jsn8708205f9b24"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$data =json_decode($response,true);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $data['result']['menus']['0']['menu_sections']['0']['menu_items'];
}

?>




<html lang="en">
<!--Version 6.0 
	Name:
	Date Completed:
    -->

<head>

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Best Restaurants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="weather/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .table,
        th,
        td {
            border: 1px solid rgb(0, 0, 0);
        }

        /* Add a black background color to the top navigation */
        .topnav {
            background-color: rgb(211, 89, 33);
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #04AA6D;
            color: white;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        header {
            background-color: rgb(211, 89, 33);
        }

        #h1-title {
            margin-bottom: 0vmax;
            text-align: center;
        }

        .images-3 {
            margin: 2em;
        }
    </style>
</head>

<body>
<h1>Code here<?php echo $data['result']['menus'][0]['menu_name']['menu_sections'][0]['menu_items']?></h1>
    <div>
        <nav class="topnav" id="navbarCollapse">
            <a href="index.html" class="active">Home</a>
            <a href="best-restaurants.html">Best Restaurants in the world</a>
            <a href="cheap-restaurants.html">Cheap Restaurants</a>
            <a href ="Search.html">Search Restaurants</a>
            </nav>
        </div>
        <header>
            <h1 id="h1-title">Good Restaurants To Eat At</h1>
        </header>

  
    <table>
        <tr>
            <td>
                <h2> Good Restaurants in Shakopee ranked</h2>
                <ol>
                    <li>Bravis Modern Street food</li> <p id="F1"></p>
                    <li>Zuppa cucina</li><p id="F2"></p>
                    <li>Sapporo Sushi restaurants</li><p id="F3"></p>
                    <li>Wampach's</li>
                    <li>Pablo's Mexican Restaurant</li>
                    <li>Hy-Vee Market Grille Express</li>
                </ol>
            </td>
            <td>


            </td>
        </tr>
    </table>
    <table class="table" style="width:100%">
        <tr>
            <div onmousemove="myMoveFunction()" class="menu" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
                <p>1.Menu<br> <span id="M1" style="visibility:hidden;" onmouseout="normalImg(this)">Bravis Modern Street
                        food<br>SHRIMP $4.25</br>QUESO-TACO $4.25<br>TACO ACORAZADO $4.50</br>BIRRIA TACOS $13.99</span>
                </p>
            </div>

            <div onmousemove="myEnterFunction()" class="menu" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
                <p>2.Menu<br> <span id="M2" style="visibility:hidden;" onmouseout="normalImg(this)">Zuppa
                        Cucina<br>Pasta
                        salad $3.95</br>Fresh fruit $3.95<br>Parmesan crisp $1.50</br>Small salad $5.45</span></p>
            </div>

            <div onmousemove="myOverFunction()" class="menu" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
                <p>3.Menu<br> <span id="M3" style="visibility:hidden;" onmouseout="normalImg(this)">Sapporo Sushi
                        Restraunt<br>2020 Roll $18.95</br>Green Dragon Roll $15.95<br>Onion Soup $3.50</br>Harumaki
                        $5.95</span></p>
            </div>
            <p id="F1"></p>
            <script>
                function bigImg(x) {
                    x.style.height = "300px";
                    x.style.width = "300px";
                }

                function normalImg(x) {
                    x.style.height = "100px";
                    x.style.width = "100px";
                    document.getElementById("M1").style.visibility = "hidden";
                    document.getElementById("M2").style.visibility = "hidden";
                    document.getElementById("M3").style.visibility = "hidden";
                }
                var x = 0;
                var y = 0;
                var z = 0;

                function myMoveFunction() {
                    document.getElementById("M1").style.visibility = "visible";
            
                }

                function myEnterFunction() {
                    document.getElementById("M2").style.visibility = "visible";
                }

                function myOverFunction() {
                    document.getElementById("M3").style.visibility = "visible";
                }

                const hour = new Date().getHours(); 
             let greeting;

             if (hour < 21) {
           greeting = "Rest. Open";
             } else {
            greeting = "Rest. Close";
            }
         document.getElementById("F1").innerHTML = greeting
             if (hour < 20) {
           greet = "Rest. Open";
             } else {
            greet ="Rest. Close";
            }
         document.getElementById("F2").innerHTML = greet
         if (hour < 20) {
           greet2 = "Rest. Open";
             } else {
            greet2 ="Rest. Close";
            }
         document.getElementById("F3").innerHTML = greet2;
            </script>
        </tr>
        <tr>
            <th>Bravis Modern Street food </th>
            <th>Zuppa cucina</th>
            <th>Sapporo Sushi Restraunt</th>
        </tr>
        <tr class="images-3">
            <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkWALRcOdxSiYzJMLV1EoozJ6zpTykKMN4DQ&usqp=CAU"
                    width="400" height="300">
            </td>
            <td><img src="../user23/images/Zuppa Cucina img.jpeg" style="width:400px; height:300px;"></td>
            <td><img src="../user23/images/Sushi.jpeg" style="width: 400px;;height: 300px;"></td>
        </tr>
        <tr>
            <td>Comments:
                <p>"Amazing street tacos! chicken, steak, shrimp, the nacho fries were my favorite! Great drinks."</p>

                <p>"Very tasty prepared and served meals with fast and professional service!"</p>

                <p>"Excellent service and amazing, flavorful food and margaritas! The food is always made fresh and is
                    absolutely delicious. The prices are reasonable for what you get."</p>

                Said by users on Google
            </td>
            <td>
                Comments:

                <p>"Good salads and the marinated chicken sandwich is very solid. In the Shakopee food desert this is a
                    welcomed oasis."</p>

                <p>"Good food for the price. Locals talked up the Chicken and Wild Rice Soup, but I wasn't impressed. It
                    was too sweet for me, however the roast beef sandwich was very good."</p>

                Said by users on Google
            </td>
            <td>Comments:
                <p>"Very tasty dishes and good size portions."</p>

                <p>"Very friendly stuff. Sophisticated and extremely delicious food. Great restaurant! Worth visiting."
                </p>

                <p>"Fabulous sushi and cocktails when you were open for dine-in. I miss this option and hope you can
                    offer
                    dine-in again. Your chicken wings are also addictive!"</p>
                Said by users on Google
            </td>
        </tr>
    </table>


    <footer id="footer-content">
        <p>
            Info: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan erat nulla, tristique
            molestie magna molestie eget.
            Vestibulum sed felis tincidunt, rhoncus nisl eu, porttitor magna. Nulla non velit porttitor, iaculis velit
            et, ullamcorper orci.
            Ut fringilla mollis euismod. Nam aliquam sapien et quam pretium molestie. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit.
            Sed condimentum enim eget dignissim dapibus. Fusce placerat quis ipsum sed posuere. Vestibulum in nisl
            pharetra, tristique tellus in, consectetur dui.
        </p>

    </footer>
</body>

</html>