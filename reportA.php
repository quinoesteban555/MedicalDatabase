<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
        <h1>Patients and their associated bills</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
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
                    $sql = "SELECT p.First_Name, p.Last_Name, b.Amount, b.Due_date
                            FROM patient p
                            JOIN bills b ON p.Patient_ID = b.Oid
                            WHERE b.Amount != 0";
                    $result = $mysqli->query($sql);
                    //Check for valid query
                    if(!$result) {
                        die("Invalid query: " . $mysqli->connection_error);
                    }
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["First_Name"] . "</td>
                            <td>" . $row["Last_Name"] . "</td>
                            <td>$" . $row["Amount"] . "</td>
                            <td>" . $row["Due_date"] . "</td>
                        </tr>";
                    }
                    
                ?>
            </tbody>

        </table>
            <button onclick="document.location='help.html'" formtarget="_blank">Back to Reports</button>
    </body>
</html>