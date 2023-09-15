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
        $firstname = $_POST["firstname"];
        $middlei = $_POST["middlei"];
        echo $middlei;
        $lastname = $_POST["lastname"];
        echo $lastname;
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $patientid = $_POST["patientid"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $phpn = $_POST["phpn"];
        $pha = $_POST["pha"];
        $insuranceid = $_POST["insid"];
        $insurancename = $_POST["insname"]; 
        $doctorid = $_POST["doctorid"];
        $email = $_POST["email"];
        $salary = $_POST["salary"];
        $ethnicity = $_POST["ethnicity"];
        $phonenumber = $_POST["phonenumber"];
        $ssn = $_POST["SSN"];
        $sex = $_POST["sex"];
        $sql = "INSERT INTO patient (First_Name,Middle_Initial,Last_Name,DOB,Patient_ID,Last_4_SSN,Weight,Height,Sex,Ethnicity,Pharmacist_Phone,Pharmacist_Address,Physicians_ID,Insurance_ID,Insurance_Name,Phone_Number,Email,Address) VALUES ('$firstname','$middlei','$lastname','$dob','$patientid','$ssn','$weight','$height','$sex','$ethnicity','$phpn','$pha','$doctorid','$insuranceid','$insurancename','$phonenumber','$email','$address')";

        if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";     
    } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }   
            ?>
        </body>
</html>