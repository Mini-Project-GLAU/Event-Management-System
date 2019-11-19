<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['role']!= "teacher"){
    header("location:club.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Club Mentor Panel - CEMS</title>
    <meta charset="utf-8">
    <meta name="author" content="Shani Kumar Gupta">
    <meta name="application-name" content="Event Management System">
    <meta name="description" content="This page is for admin to handle all the things">
    <meta name="keywords" content="event,management,system">
    <link rel="stylesheet" href="../CSS/club.css">
</head>

<body>

    <div class="admin-background"></div>
    <div class="overlay"></div>
    <div class="nav-bar">
        <h2 style="text-align: ">Club Mentor<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Panel</h2>
        <div class="toggle-btn" onclick="toggle()" style="cursor: pointer">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="side-bar">
        <ul>
            <li>Home</li>
            <li>About Us</li>
            <li>Contact</li>
        </ul>
        <div class="logout-btn" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;color: white;border: 2px solid white;background-color: #1296AC;margin: 40px; cursor: pointer;text-align:center;position: absolute;">
            <a href="logout.php" style="text-align: center;color: white;text-decoration-line: none;position: absolute;margin-top:10px;margin-left:-30px; ">LOGOUT</a>
        </div>
    </div>
    <div class="admin-info">
        <h3 style="text-align: center;color: white;"><?= $_SESSION['username'] ?></h3>
        <h4 style="text-align: center; color: white;margin-top: -10px;"> ID : 171500308</h4>
        <h4 style="text-align: center;color: white;margin-top: -10px;"><?= $_SESSION['role'] ?></h4>
    </div>
    <button class="btn" id="myBtn">Request for Event Venue</button>
    <p style="position:absolute;top:0;margin-top:350px;margin-left:450px;color:white;font-size:25px;">
    <?php if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
} ?></p>

    <a href="applied-event.php" style="text-decoration: none;width: 150px;height: 20px;background-color: #1296AC;padding: 10px;position: absolute;top: 0;margin-top: 350px;margin-left: 300px;font-size:20px;border-radius:4px;border:2px solid white;">All Event Request</a>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="header">
            <h2 style="text-align: center;color: white">Please fill the details carefully!!! </h2>
        </div>

        <div class="modal-content">
            <span class="close">&times;</span>
        </div>
        <div class="form-content">
            <form action="applyevent.php" method="post">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                <label for="club1" style="font-size: 20px;">Select Club:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select id="club1" name="club" class="select1" style="width: 200px;height: 25px; font-size: 15px;border: 1px solid black;border-radius: 3px;">
                    <option>Computer Society of India</option>
                    <option>Abacus</option>
                    <option>Javapie</option>
                    <option>Datum</option>
                    <option>IOT Club</option>
                    <option>IEEE WIE</option>
                </select>
                <br><br><br>
                <label for="event-name">Enter Event Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="evtname" style="width: 200px;height: 25px;border: 1px solid black;border-radius: 3px"><br><br><br>
                <label for="date1">Choose Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="date1" name="l_from" type="date" style="width: 150px;height: 25px;border: 1px solid black;border-radius: 3px;">
                <br><br><br>
                <label for="time1">Time Start From:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="time" id="time1" name="time_from" style="width: 100px;height: 25px;border: 1px solid black;border-radius: 3px;">
                <br><br><br>
                <label for="time2">Time End To:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="time" name="time_to" id="time2" style="width: 100px;height: 25px;border: 1px solid black;border-radius: 3px;"><br><br><br>
                <label for="venue" style="font-size: 20px;">Select Venue:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select id="venue" name="venue_select" class="select2" style="width: 200px;height: 25px; font-size: 15px;border: 1px solid black;border-radius: 3px;">
                    <option>AB-1/Room no. 413</option>
                    <option>AB-1/Room no. 418</option>
                    <option>AB-1/Room no. 411</option>
                    <option>AB-1/Room no. 402</option>
                    <option>AB-1/Room no. 406</option>
                    <option>AB-1/Room no. 425</option>
                    <option>AB-1/Room no. 413</option>
                    <option>AB-1/Room no. 415</option>
                </select>
                <br><br><br><br>
                <button type="submit" style="width: 150px;height: 35px;font-size: 15px;font-weight: bold;color: white;border: 1.5px solid white;background-color: #1296AC; cursor: pointer;margin-left: 210px;border-radius: 8px">SUBMIT REQUEST</button>
            </form>

        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];


        function toggle() {
            document.getElementById("side-bar").classList.toggle('active');
        }



        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
</body>

</html>
