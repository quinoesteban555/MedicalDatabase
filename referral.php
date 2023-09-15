<html>
    <head>
        <body>
            <?php
                    $port = $_SERVER
                        ['WEBSITE_MYSQL_PORT'];
                        $servername = "localhost:$port";
                        $username = "azure";
                        $password = "6#vWHD_$";
                        $db = "localdb";
                        
                        $true;
                    $mysqli = new mysqli($servername,$username,$password,$db);
                    // Create connection
                    // Check connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }
                    
                    if ($true == true){
                    $result = mysqli_query($mysqli,"SELECT Adress FROM clinics");
                    $list = [];
                    while($row = mysqli_fetch_assoc($result)) {
                        $list[] = $row;
                    echo "<form method='post'>";
                    echo "<label>Clinic Location<label>";
                    echo "<select name='clinic'  onchange = 'this.form.submit()' >";
                    echo "<option value='' disabled selected>--select--</option>";
                    foreach($list as $temp) {
                        echo "<option> $temp[Adress] </option>";
                    }
                    echo "</select>";
                    echo "</form>";
                    }
                    }
                    
                    if(isset($_POST["clinic"])){
                    $true = false;
                    $var = $_POST["clinic"];   
                    echo $var;
                    $clinicadress = $var;
                    $clinicresult = mysqli_query($mysqli,"SELECT Clinic_Id FROM clinics WHERE Adress = '$clinicadress'");
                    while($crow = mysqli_fetch_assoc($clinicresult)) {
                        $clisw = $crow["Clinic_Id"];
                    }
                    $doctorresult = mysqli_query($mysqli,"SELECT D_ID FROM availability WHERE Monday = '$clisw' OR Tuesday = '$clisw' OR Wednesday = '$clisw' OR Thursday = '$clisw' OR Friday = '$clisw'");
                    
                    while($drow = mysqli_fetch_assoc($doctorresult)) {
                        $dlisw[] = $drow;
                    }
                  foreach($dlisw as $dtemp)
                  {
                      $to = $dtemp[D_ID];
    
                      $doctornameresult = mysqli_query($mysqli,"SELECT Last_Name FROM employees WHERE Employee_ID = '$to'");
                      while($nrow = mysqli_fetch_assoc($doctornameresult)){
                        $dlist[] = $nrow;
                    }
                  }
                    echo "<form method='post'>";
                    echo "<label>Doctor Location<label>";
                    echo "<select name='doctor'  onchange = 'this.form.submit()' >";
                    echo "<option value='' disabled selected>--select--</option>";
                  foreach($dlist as $ntemp)
                  {
                      echo $ntemp[Last_Name];
                      echo "<option> $ntemp[Last_Name] </option>";
                  }
            
                };
                    
                if(isset($_POST["doctor"])){
                    echo "<label> Pick a Date:</label>";
                    echo "<span><input type='date' name='date' required><br></span>";
                }
                    ?>
                    
        </body>
    </head>
</html>