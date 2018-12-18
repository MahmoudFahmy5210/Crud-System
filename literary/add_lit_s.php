
<!DOCTYPE html>
<?php
include_once '../crud_conn.php';
?>

<html>
<head>
    <title>Add Data</title>
    <style>
        body{
            background-image: url(../antique-black-and-white-books-33283.jpg);
                background-size: cover;
        }
    </style>
</head> 
<body>
    <a href="../startpage.html">Home</a>
    <br/><br/>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="form_add">
        <table width="25%" border="0">
            <tr> 
                <td>Title</td>   
                <td><input type="text" name="title"></td>
            </tr>
            <tr> 
                <td>Author First Name</td>
                <td><input type="text" name="fst_name"></td>
            </tr>
            <tr> 
                <td>Author Last Name</td>
                <td><input type="text" name="lst_name"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
$fstname=$lstname=$title="";
$fsterr=$lsterr=$titleerr="";
if(isset($_POST['submit'])){
    $fstname=$_POST['fst_name'];
    $title=$_POST['title'];
    $lstname=$_POST['lst_name'];
    
    
    

     if(empty($fstname) || empty($title) || empty($lstname)) 
        {                
            if(empty($fstname)) 
            {
                echo "<font color='red'>Author First Name field is empty.</font><br/>";
            }

            if(empty($title)) 
            {
                echo "<font color='red'>Title field is empty.</font><br/>";
            }

            if(empty($lstname)) 
            {
                echo "<font color='red'>Author last Name  field is empty.</font><br/>";
            }
            
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        
        }
    else 
    { 
        $lit_sql="INSERT INTO lit_s_story(author_first_name,author_last_name,title)VALUES('$fstname','$lstname','$title')";
        mysqli_query($conn, $lit_sql);
        mysqli_close($conn);
        //this func return you to the home page again to show the database table
        header("Location: lit.php");
    }
}


?>
