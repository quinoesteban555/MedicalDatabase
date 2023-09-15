<html>
    <head>
    </head>
        <body>
            Welcome
            <?php
        $port = $_SERVER
        ['WEBSITE_MYSQL_PORT'];
        $servername = "localhost:$port";
        $username = "azure";
        $password = "6#vWHD_$";
        $db = "localdb";


        $mysqli = new mysqli($servername,$username,$password,$db);
        // Create connection
        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
            }
        
        $patientid = $_POST["patientid"];
        $doctorid = $_POST["doctorid"];
        $ddoctorid = $_POST["ddoctorid"];
        $clinicid = $_POST["clinicid"];
        
        $sql = "INSERT INTO referrals (Patient,Doctor,Receiving_Doctor,Address_Id) VALUES ($patientid,$doctorid,$ddoctorid,$clinicid)";
        if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";     
    } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }   
            ?>
        </body>
</html>