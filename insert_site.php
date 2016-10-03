<?php ob_start();
 require_once("connect_db.php"); ?>
<?php require_once("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/style.css"/>
    <title>Add a website</title>
</head>
<body>
<div class="container">
        <div class="row">
        <div class="col-md-12 header">
          <a href="search.html"><h1>DHUND</h1></a>
            <pre><h3><p>           Your own search engine.. </p></h3></pre>
        </div>
        </div>
    <form id="neg-style" action="insert_site.php" method="post" enctype="multipart/form-data" >

        <table cellspacing="5" border="2">
            <tr colspan="2">
             <caption><h1> Insert new website  </h1> </caption>
            </tr>
            <tr>
                <td> Site Title </td>
                <td><input type="text" name="site_title" /> </td>
            </tr>
            <tr>
                <td> Site Link </td>
                <td><input type="text" name="site_link" /> </td>
            </tr>
            <tr>
                <td> Site Keyword </td>
                <td><input type="text" name="site_keyword" /> </td>
            </tr>
            <tr>
                <td> Site Description </td>
                <td><textarea  cols="21" rows="5" name="site_desc"></textarea></td>
            </tr>
            <tr>
                <td> Site Image </td>
                <td><input type="file" name="site_image" /> </td>
            </tr>
        </table>
         <pre>            <input id="mid" type="submit" value="Add site now" name="submit" /></pre>
    </form>
</div>
</body>
<footer>
            &copy; SHIVAM SRIVASTAVA
        </footer>
</html>

<?php
if(isset($_POST['submit'])){
//escape all strings
$site_title = mysql_prep($_POST['site_title']);
$site_link = mysql_prep($_POST['site_link']);
$site_keyword = mysql_prep($_POST['site_keyword']);
$site_description = mysql_prep($_POST['site_desc']);
$site_image = $_FILES['site_image']['name'];
$site_image_temp = $_FILES['site_image']['tmp_name'];

if($site_title=='' || $site_link=='' || $site_keyword=='' || 
$site_description==''){
    echo "<script> alert('Please fill all the fields');</script>";
    //redirect_to("insert_site.php");
    exit();
}
else{
    $query =  "INSERT INTO ";
    $query .= "sites (site_title, site_link, site_keyword, site_desc, ";
    $query .= "site_image) ";
    $query .= "VALUES ('$site_title', '{$site_link}', '{$site_keyword}', ";
    $query .= "'{$site_description}', '{$site_image}' )";

    move_uploaded_file($site_image_temp,"images/{$site_image}"); 

    $result = mysqli_query($connection,$query);
    // test if there was a query error
     if ($result){
         //success // redirect_to somepage.php
         echo "<script>alert('Data inserted into table')</script>";
         //redirect_to ("insert_site.php");
     }
     else{
    // failure 
     //die("Database query failed" . mysqli_error($connection));
     echo "<script>alert('ERROR IN  table')</script>";
     }
}
}
?>
<?php
    if(isset($connection)) { mysqli_close($connection); }
    ob_end_flush();
?>