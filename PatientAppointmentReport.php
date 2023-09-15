<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
        <h1>Patient Appointments</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Clinic</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Appointment Date</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
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
                                   p.Patient_ID,
	                               CONCAT(e.First_Name,' ',e.Last_Name) AS 'Doctor',
	                               e.Employee_ID,
	                               c.Name AS 'Clinic',
                                   c.Adress,
                                   c.Phone_Number,
                                   a.DATE,
                                   a.Reason
                            FROM patient p
                            JOIN appointment a ON p.Patient_ID = a.patient_id
                            JOIN employees e ON a.Doctor = e.Employee_ID
                            JOIN clinics c ON c.Clinic_Id = a.Clinic_ID";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result){
                        echo "Invalid query or no patient information is available";
                        
                    }
                    else{
                    while($row = $result->fetch_assoc()) {
                        if((int)$_SESSION['patient'] == $row["Patient_ID"]){
                        echo "<tr>
                            <td>" . $row["Patient"] . "</td>
                            <td>" . $row["Doctor"] . "</td>
                            <td>" . $row["Clinic"] . "</td>
                            <td>" . $row["Adress"] . "</td>
                            <td>" . $row["Phone_Number"] . "</td>
                            <td>" . $row["DATE"] . "</td>
                            <td>" . $row["Reason"] . "</td>
                        </tr>";
                        }
                    }
                    }
                    
                ?>
                </tbody>
                </table>
        <br>
        <table class="table">
            <h1>Patient Referrals</h1>
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Doctor Phone</th>
                    <th>Receiving Doctor</th>
                    <th>Receiving Doctor Phone</th>
                    <th>Clinic</th>
                    <th>Address</th>
                    <th>Clinic Phone</th>
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
                                   CONCAT(eD.First_Name,' ', eD.Last_Name) AS 'Doctor',
                                   ed.Phone_Number AS 'DoctorPhone',
                                   CONCAT(eR.First_Name,' ', eR.Last_Name) AS 'ReceivingDoctor',
                                   ed.Phone_Number AS 'ReceivingDoctorPhone',
                                   c.Name AS 'Clinic',
                                   c.Adress AS 'Address',
                                   c.Phone_Number AS 'ClinicPhone'       
                            FROM referrals r
                            JOIN clinics c ON c.Clinic_Id = r.Address_Id
                            JOIN employees eD ON eD.Employee_ID = r.Doctor
                            JOIN employees eR ON eR.Employee_ID = r.Receiving_Doctor
                            JOIN patient p ON p.Patient_ID = r.Patient";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        echo "Invalid query or no patient information is available";
                    }
                    else {
                    while($row = $result->fetch_assoc()) {
                        if((int)$_SESSION['patient'] == $row["Patient_ID"]){
                        echo "<tr>
                            <td>" . $row["Patient"] . "</td>
                            <td>" . $row["Doctor"] . "</td>
                            <td>" . $row["DoctorPhone"] . "</td>
                            <td>" . $row["ReceivingDoctor"] . "</td>
                            <td>" . $row["ReceivingDoctorPhone"] . "</td>
                            <td>" . $row["Clinic"] . "</td>
                            <td>" . $row["Address"] . "</td>
                            <td>" . $row["ClinicPhone"] . "</td>
                        </tr>";
                    }
                    }
                    }
                ?>
                
            </tbody>
        </table>
            <button onclick="document.location='help.html'" formtarget="_blank">Back to Reports</button>
    </body>
</html>