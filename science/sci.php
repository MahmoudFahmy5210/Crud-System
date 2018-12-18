<?php
include '../crud_conn.php';
//STATMEN to review the database of sci branch
$reveiw_books="SELECT * FROM sci ORDER BY id DESC";
//variable recive from database
//or die : i used it to print for me if there is an error an its type
$conn_sci= mysqli_query($conn, $reveiw_books) or die("Error: " . mysqli_error($conn));
?>
    
<html>
    
    <head>
        <title>Science Branch</title>
        <style>
             body{
            background-image: url(../book.jpg);
                background-size: cover;
        }
            .sci table th input
            {
                padding: 6px;
                border: 0.1px solid;
                width:100%;
                height: 30px;
                font-size: 17px;
            }
            table{
                color:	#B22222;
                font-family: sans-serif;
                font-weight: 300px;
            }
            table td 
            {
                 border: 1px solid black;
                 padding:5px;
                 width:200px;
                 
            }
            .head {
                text-align: center;
                 font-weight: bold;
            }
        </style>
    </head>
    <body>
        <a href="../startpage.html">Back Home</a>
        <div class="sci">
            <table>
                <tr>
                <form action="sci.php" method="POST" name="form_search">
                    <th colspan="3">'
                        <input type="text" placeholder="Search by title ..." name="quary">
                    </th>
                    <th>
                        <button type="submit" value="search_" name="search">Search</button>
                    </th>
                </form>
                </tr>
                <tr class="head">
                <td id="addr">
                    Title
                </td>
                <td>Author First Name</td>
                <td>Author Last Name</td>
                <td>Update</td>
                </tr>
                <?php
                //min lengh of the quary mus be al leat 1 character
        $min_lenth=1;
        
        //be sure that he click search
        if(isset($_POST['search']))
        {
            //catch the quary of the search
            $quary_search=$_POST['quary'];
            //be sure the search input that not empty
            if(strlen($quary_search)>=$min_lenth)
            {
                // changes characters used in html to their equivalents
                $quary_search = htmlspecialchars($quary_search); 
                // makes sure nobody uses SQL injection
                $quary_search= mysql_real_escape_string($quary_search);
                $search_sql="SELECT * FROM sci WHERE  title LIKE '".$quary_search."%'";
                $send_quary= mysqli_query($conn, $search_sql) or die("Error: " . mysqli_error($conn));
                //check if aresult found
                if(mysqli_num_rows($send_quary)>0)
                    {
                     while($exist_row= mysqli_fetch_array($send_quary))
                        {
                        echo"<tr>";
                        echo"<td>".$exist_row['title']."</td>";
                        echo"<td>".$exist_row['author_first_name']."</td>";
                        echo"<td>".$exist_row['author_last_name']."</td>";
                        echo"<td><a href=\"edit_sci.php?id=$exist_row[id]\">Edit</a>|<a href=\"del_sci.php?id=$exist_row[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";
                        echo"</tr>";
                        } 
                    }
                    else
                    {
                    echo"<tr>";
                    echo"<td>"."No result found"."</td>";
                    echo "</tr>";
                    }
                   
            }
            else{
                echo"Minimum lenth is"."$min_lenth";
            }
        }
        else
            {
                    while($exist_row= mysqli_fetch_array($conn_sci))
                    {
                    echo"<tr>";
                    echo"<td>".$exist_row['title']."</td>";
                    echo"<td>".$exist_row['author_first_name']."</td>";
                    echo"<td>".$exist_row['author_last_name']."</td>";
                    echo"<td><a href=\"edit_sci.php?id=$exist_row[id]\">Edit</a>|<a href=\"del_sci.php?id=$exist_row[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";

                    echo"</tr>";
                    }
            }
                ?>
                <tr>
                    <td id="add_button">
                        <button><a href="add_sci.php">Add New</a></button>
                    </td>
                </tr>
                
            </table>
        </div>
        
        
        
    </body>
</html>


    