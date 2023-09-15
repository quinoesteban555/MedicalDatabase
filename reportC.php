<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
        <h1>Patient Appointment Details</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Clinic</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
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
                    
                    //Get data from database
                    $sql = "SELECT CONCAT(p.First_Name,' ', p.Last_Name) AS 'Patient',
	                               CONCAT(d.FirstName,' ',d.LastName) AS 'Doctor',
	                               c.Name AS 'Clinic',
                                   c.Adress,
                                   c.Phone_Number,
                                   a.Reason
                            FROM patient p
                            JOIN appointment a ON p.Patient_ID = a.patient_id
                            JOIN doctors d ON a.Doctor = d.DoctorID
                            JOIN clinics c ON c.Clinic_Id = a.Clinic_ID";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        die("Invalid query: " . $mysqli->connection_error);
                    }
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["Patient"] . "</td>
                            <td>" . $row["Doctor"] . "</td>
                            <td>" . $row["Clinic"] . "</td>
                            <td>" . $row["Adress"] . "</td>
                            <td>" . $row["Phone_Number"] . "</td>
                            <td>" . $row["Reason"] . "</td>
                        </tr>";
                    }
                    
                ?>
            </tbody>

        </table>
        <button onclick="document.location='help.html'" formtarget="_blank">Back to Reports</button>
    </body>
</html>