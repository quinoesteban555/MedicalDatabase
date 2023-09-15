<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
        <h1>Employee Salaries</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Job</th>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Salary</th>
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
                    
                    //Get Doctor salaries
                    $sql = "SELECT `DoctorID`, `FirstName`, `LastName`, `Salary`
                            FROM `doctors`";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        die("Invalid query: " . $mysqli->connection_error);
                    }
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . Doctor . "</td>
                            <td>" . $row["DoctorID"] . "</td>
                            <td>" . $row["FirstName"] . "</td>
                            <td>" . $row["LastName"] . "</td>
                            <td>" . $row["Salary"] . "</td>
                        </tr>";
                    }
                    
                    //Get Nurse Salaries
                    $sql = "SELECT `Nurse ID`, `First Name`, `Last Name`, `Salary`
                            From `nurses`";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        die("Invalid query: " . $mysqli->connection_error);
                    }
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . Nurse . "</td>
                            <td>" . $row["Nurse ID"] . "</td>
                            <td>" . $row["First Name"] . "</td>
                            <td>" . $row["Last Name"] . "</td>
                            <td>" . $row["Salary"] . "</td>
                        </tr>";
                    }
                    
                    //Get Employee Salary
                    $sql = "SELECT `Employee ID`, `First Name`, `Last Name`, `Salary`
                            From `employees`";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        die("Invalid query: " . $mysqli->connection_error);
                    }
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . Misc . "</td>
                            <td>" . $row["Employee ID"] . "</td>
                            <td>" . $row["First Name"] . "</td>
                            <td>" . $row["Last Name"] . "</td>
                            <td>" . $row["Salary"] . "</td>
                        </tr>";
                    }
                    
                    
                ?>
            </tbody>

        </table>
        <button onclick="document.location='help.html'" formtarget="_blank">Back to Reports</button>
    </body>
</html>