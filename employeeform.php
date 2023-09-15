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
        $doctorid = $_POST["doctorid"];
        $email = $_POST["email"];
        $salary = $_POST["salary"];
        $ethnicity = $_POST["ethnicity"];
        $phonenumber = $_POST["phonenumber"];
        $ssn = $_POST["SSN"];
        $sex = $_POST["sex"];
        $sql = "INSERT INTO doctors (FirstName,MiddleI,LastName,DoctorID,Salary,Sex,Ethnicity,Email,PhoneNumber,SSN) VALUES ('$firstname','$middlei','$lastname','$doctorid','$salary','$sex','$ethnicity','$email','$phonenumber','$ssn')";

        if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";     
    } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }   
            ?>
        </body>
</html>