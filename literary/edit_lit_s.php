
<?php
include('../crud_conn.php');
if (isset($_POST['update']))
{
    // the names of inputs is fstname_,lstname_,title_
    $id_sci=$_POST['id'];
    $fstname_=$_POST['fstname_n'];
    $lstname_=$_POST['lstname_n'];
    $title_=$_POST['title_n'];
    if(empty($title_) || empty($fstname_) || empty($lstname_))
    {            
        if(empty($title_)) 
        {
            echo "<font color='red'>*Title field is empty.</font><br/>";
        }
        
        if(empty($fstname_)) 
        {
            echo "<font color='red'>*Author First Name field is empty.</font><br/>";
        }
        
        if(empty($lstname_)) 
        {
            echo "<font color='red'>*Author First Name field is empty.</font><br/>";
        }
    }        
     else 
        {    
    
        //updating the table
        $result = mysqli_query($conn, "UPDATE lit_s_story SET title='$title_',author_first_name='$fstname_',author_last_name='$lstname_' WHERE id=$id_sci");
        header("Location: lit.php");
        }
    
        }
?>
<?php
//getting id from url
$id_sci = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($conn,"SELECT * FROM lit_s_story WHERE id=$id_sci") or die("Error: " . mysqli_error($conn));
 
while($res = mysqli_fetch_array($result) )
{
    $title_ = $res['title'];
    $fstname_= $res['author_first_name'];
    $lstname_ = $res['author_last_name'];
}
?>
<html>
    <head>    
        <title>Edit Data</title>    
    </head>
<body>
    <a href="../startpage.html">Home</a>
    <br><br><br>
    <form name="form_edit" method="post" action="edit_lit_s.php">
        <table border="2">
            <tr> 
                <td>Title</td>
                <td><input type="text" name="title_n" value="<?php echo $title_;?>"></td>
            </tr>
            <tr> 
                <td>Author First Name</td>
                <td><input type="text" name="fstname_n" value="<?php echo $fstname_;?>"></td>
            </tr>
            <tr> 
                <td>Author Last Name</td>
                <td><input type="text" name="lstname_n" value="<?php echo $lstname_;?>"></td>
            </tr>
            <tr>
                <td><input name="id" type="hidden" value=<?php echo $_GET['id'];?>></td>
                
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>

