<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "Yzx19810312";
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, "travel");
if (!$connect) {
    die("连接失败: " . mysqli_error($connect));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>


    <link rel="stylesheet" href="css/captions.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>

</head>

<body>
<?php include 'header.inc.php'; ?>


<!-- Page Content -->
<main class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Filters</div>
        <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
                <div class="form-inline">
                    <select name="continent" class="form-control">
                        <option value="0">Select Continent</option>
                        <?php
                        //Fill this place

                        //****** Hint ******
                        //display the list of continents

                        $continentSql = "SELECT * FROM Continents";
                        $continentResult = mysqli_query($connect, $continentSql);
                        if ($continentResult->num_rows > 0) {
                            while ($row = $continentResult->fetch_assoc()) {
                                echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                            }
                        }

                        ?>
                    </select>

                    <select name="country" class="form-control">
                        <option value="0">Select Country</option>
                        <?php
                        //Fill this place

                        //****** Hint ******
                        /* display list of countries */

                        $countrySql = "SELECT * FROM Countries";
                        $countryResult = mysqli_query($connect, $countrySql);
                        if ($countryResult->num_rows > 0) {
                            while ($row = $countryResult->fetch_assoc()) {
                                echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                            }
                        }

                        ?>
                    </select>
                    <input type="text" placeholder="Search title" class="form-control" name=title>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>

        </div>
    </div>


    <ul class="caption-style-2">
        <?php
        //Fill this place

        //****** Hint ******
        /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
        <li>
          <a href="detail.php?id=????" class="img-responsive">
            <img src="images/square-medium/????" alt="????">
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <p>????</p>
              </div>
            </div>
          </a>
        </li>
        */

        function select($result)
        {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<a href="detail.php?id=' . $row['ImageID'] . ' class="mg-responsive">';
                    echo '<img src="images/square-medium/' . $row['Path'] . '" alt=' . $row["Title"] . ' style="height: 225px;width: 225px">';
                    echo '<div class="caption">';
                    echo '<div class="blur"></div>';
                    echo '<div class="caption-text">';
                    echo '<p>' . $row['Title'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</li>';
                }
            }
        }

        $continentSelect = (isset($_GET['continent']) ? $_GET['continent'] : 0);
        $countrySelect = (isset($_GET['country']) ? $_GET['country'] : 0);
        
        if ($continentSelect && $countrySelect) {
            $imageSql = "SELECT * FROM ImageDetails WHERE ContinentCode = '$continentSelect' AND CountryCodeISO = '$countrySelect'";
            $imageResult = mysqli_query($connect, $imageSql);
            select($imageResult);
        } elseif ($continentSelect) {
            $imageSql = "SELECT * FROM ImageDetails WHERE ContinentCode = '$continentSelect'";
            $imageResult = mysqli_query($connect, $imageSql);
            select($imageResult);
        } elseif ($countrySelect) {
            $imageSql = "SELECT * FROM ImageDetails WHERE CountryCodeISO = '$countrySelect'";
            $imageResult = mysqli_query($connect, $imageSql);
            select($imageResult);
        } else {
            $imageSql = "SELECT * FROM ImageDetails";
            $imageResult = mysqli_query($connect, $imageSql);
            select($imageResult);
        }

        $connect->close();
        ?>
    </ul>


</main>

<footer>
    <div class="container-fluid">
        <div class="row final">
            <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
            <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
        </div>
    </div>


</footer>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>

</html>