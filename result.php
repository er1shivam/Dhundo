<?php ob_start();
 require_once("connect_db.php"); ?>
<?php require_once("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Results</title>
<meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/style1.css"/>
</head>
<body>
<div class="ful">
     <div class="row">
        <div class="col-md-1">
        <a href="search.html"><h3>DHUND </h3></a>
        </div>
        <div class="col-md-9">
        <form action="result.php" method="get">
        <input name="user_keyword" class="search-box" type="text" size="60" />
        <input name="result" type="submit" value="Search" class="btn" />
        </form>
        </div>
      </div>
    <main>
    <?php
        // if search clicked
        if(isset($_GET['search'])){
            //store the user search value
            $get_value = $_GET['user_query'];
            //perform query
            $query =  "SELECT * FROM sites WHERE ";
            $query .= "site_keyword LIKE '%$get_value%' ";
            //store the result 
            $result = mysqli_query($connection, $query);

            while($row_result=mysqli_fetch_array($result)){
                
                $site_title = $row_result['site_title'];
                $site_link = $row_result['site_link'];
                $site_keywords = $row_result['site_keyword'];
                $site_description = $row_result['site_desc'];
                $site_image = $row_result['site_image'];


                echo "<div class='hd-results'> 
                        <h2> {$site_title} </h2>
                        <a href='$site_link' target='_blank'>$site_link </a>
                        <p align='justify'>$site_description</p>
                        <img src='images/$site_image' width=\"300\" height=\"180\" /> 

                </div>";



            }

        }      

    ?>
    </main>

</div>
</body>
</html>