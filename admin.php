<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script>
        <?php
            session_start();
            if(!$_SESSION["admin"])
                header("Location: index.html");
            $conn = new mysqli("localhost","root","","WT");
            $result = $conn->query("select * from users;");
            $result1 = $conn->query("select * from doctors;");
            $result2 = $conn->query("select * from appointments;");
            $conn->close();
        ?>
    </script>
    <style>
        table, th, td {
            border : 1px solid black;
            border-collapse : collapse;
        }
        .nav {
            position : absolute;
            top : 0;
            left : 0;
            width : 100%;
            background-color : cyan;
            display : flex;
        }
        .main {
            position : absolute;
            top : 80px;
            left : 0;
        }
        table {
            display : none;
        }
        .nav h3 {
            padding : 20px;
            margin : 0;
        }
        .nav h3:hover {
            background-color : #F6A6CD;
            cursor : pointer;
        }
        button {
            position : fixed;
            top : 5px;
            right : 5px;
            padding : 10px;
            border : none;
            border-radius : 5px;
            background-color : red;
            color : white;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <div class="nav">
        <h3 onclick="table_change(0)">Patients</h3>
        <h3 onclick="table_change(1)">Doctors</h3>
        <h3 onclick="table_change(2)">Appointments</h3>
    </div>
    <div class="main">
        <table>
            <thead>
                <tr>
                    <th>Patient's username</th>
                    <th>Patient's name</th>
                    <th>Patient's DOB</th>
                    <th>Patient's gender</th>
                    <th>Patient's height</th>
                    <th>Patient's weight</th>
                    <th>Patient's email address</th>
                    <th>Patient's phone number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["DOB"]."</td>";
                        echo "<td>".$row["gender"]."</td>";
                        echo "<td>".$row["height"]."</td>";
                        echo "<td>".$row["weight"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["phone"]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Doctor's ID</th>
                    <th>Doctor's name</th>
                    <th>Doctor's field</th>
                    <th>Doctor's rating</th>
                    <th>Doctor's review</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$result1->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["ID"]."</td>";
                        echo "<td>".$row["doctor"]."</td>";
                        echo "<td>".$row["specializedin"]."</td>";
                        echo "<td>".$row["rating"]."</td>";
                        echo "<td>".$row["review"]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Patient's username</th>
                    <th>Doctor's name</th>
                    <th>Appointment date</th>
                    <th>Appointment start time</th>
                    <th>Appointment end time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$result2->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["doctor"]."</td>";
                        echo "<td>".$row["date"]."</td>";
                        echo "<td>".$row["starttime"]."</td>";
                        echo "<td>".$row["endtime"]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <button onclick="window.location='logout.php';">Logout</button>
</body>
<script>
    function table_change(int) {
        for(let i = 0; i<3; i++) {
            if(int==i)
                document.getElementsByTagName("table")[i].style.display = "block";
            else
                document.getElementsByTagName("table")[i].style.display = "none";
        }
    }
</script>
</html>