<?php
include '../crud_conn.php';
//STATMEN to review the database of rel branch
$reveiw_books="SELECT * FROM lit_s_story ORDER BY id DESC";
$reveiw_books1="SELECT * FROM lit_novels ORDER BY id DESC";
//variable recive from database
//or die : i used it to print for me if there is an error an its type
$conn_lit= mysqli_query($conn, $reveiw_books) or die("Error: " . mysqli_error($conn));
$conn_lit1= mysqli_query($conn, $reveiw_books1) or die("Error: " . mysqli_error($conn));
?>
    
<html>
    
    <head>
        <title>religious Branch</title>
        <style>
             body{
            background-image: url(../book.jpg);
                background-size: cover;
        }
            .lit_story table th input ,.lit_novel table th input 
            {
                padding: 6px;
                border: 0.1px solid;
                width:300px;
                height: 30px;
                font-size: 17px;
            }
            table td 
            {
                 border: 1px solid black;
                 padding:5px;
                 width:200px;
                 
            }
            .story{
                width: 100%;
            }
            .head {
                text-align: center;
                 font-weight: bold;
            }
            .lit_story{}
            .lit_story,.lit_novel{
                width:46%;
                display: inline-block;
            }
            #link{display:block;}
        </style>
    </head>
    <body>
        <a id="link" href="../startpage.html">Back Home</a>
        <div class="lit_story">
            <h2>Short Stories</h2>
            <table class="story">
                <tr>
                <form action="lit.php" method="POST" name="form_search">
                    <th colspan="3">
                        <input type="text" placeholder="Search by title ..." name="quary">
                    </th>
                    <th>
                        <button type="submit" value="search_" name="search">Search</button>
                    </th>
                </form>
                </tr>
                <tr class="head">
                    <td id="addr"> Title</td>
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
                $search_sql="SELECT * FROM lit_s_story WHERE  title LIKE '".$quary_search."%'";
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
                        echo"<td><a href=\"edit_lit_s.php?id=$exist_row[id]\">Edit</a>|<a href=\"del_lit_s.php?id=$exist_row[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";
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
                        while($exist_row= mysqli_fetch_array($conn_lit))
                    {
                    echo"<tr>";
                    echo"<td>".$exist_row['title']."</td>";
                    echo"<td>".$exist_row['author_first_name']."</td>";
                    echo"<td>".$exist_row['author_last_name']."</td>";
                    echo"<td><a href=\"edit_lit_s.php?id=$exist_row[id]\">Edit</a>|<a href=\"del_lit_s.php?id=$exist_row[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";

                    echo"</tr>";
                    }
            }
                ?>
                <tr>
                    <td id="add_button">
                        <button><a href="add_lit_s.php">Add New</a></button>
                    </td>
                </tr>
                
            </table>
        </div>
        <!-- Start                    Novels Part                       -->
        
            <div class="lit_novel">
                <h2>Novels</h2>
            <table class="novel">
                <tr>
                <form action="lit.php" method="POST" name="form_search1">
                    <th colspan="3">
                        <input type="text" placeholder="Search by title ..." name="quary1">
                    </th>
                    <th>
                        <button type="submit" value="search_" name="search1">Search</button>
                    </th>
                </form>
                </tr>
                <tr class="head">
                    <td id="addr"> Title</td>
                    <td>Author First Name</td>
                    <td>Author Last Name</td>
                    <td>Update</td>
                </tr>
                <?php
                //min lengh of the quary mus be al leat 1 character
        $min_lenth1=1;
        
        //be sure that he click search
        if(isset($_POST['search1']))
        {
            //catch the quary of the search
            $quary_search1=$_POST['quary1'];
            //be sure the search input that not empty
            if(strlen($quary_search1)>=$min_lenth1)
            {
                // changes characters used in html to their equivalents
                $quary_search1 = htmlspecialchars($quary_search1); 
                // makes sure nobody uses SQL injection
                $quary_search1= mysql_real_escape_string($quary_search1);
                $search_sql1="SELECT * FROM lit_novels WHERE  title LIKE '".$quary_search1."%'";
                $send_quary1= mysqli_query($conn, $search_sql1) or die("Error: " . mysqli_error($conn));
                //check if aresult found
                if(mysqli_num_rows($send_quary1)>0)
                    {
                     while($exist_row1= mysqli_fetch_array($send_quary1))
                        {
                        echo"<tr>";
                        echo"<td>".$exist_row1['title']."</td>";
                        echo"<td>".$exist_row1['author_first_name']."</td>";
                        echo"<td>".$exist_row1['author_last_name']."</td>";
                        echo"<td><a href=\"edit_n.php?id=$exist_row1[id]\">Edit</a>|<a href=\"del_n.php?id=$exist_row1[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";
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
                echo"Minimum lenth is"."$min_lenth1";
            }
        }
        else
            {
                        while($exist_row1= mysqli_fetch_array($conn_lit1))
                    {
                    echo"<tr>";
                    echo"<td>".$exist_row1['title']."</td>";
                    echo"<td>".$exist_row1['author_first_name']."</td>";
                    echo"<td>".$exist_row1['author_last_name']."</td>";
                    echo"<td><a href=\"edit_n.php?id=$exist_row1[id]\">Edit</a>|<a href=\"del_n.php?id=$exist_row1[id]\"onClick=\"return confirm('Are you sure you want to delete ?')\">Delete</a></td>";

                    echo"</tr>";
                    }
            }
                ?>
                <tr>
                    <td id="add_button">
                        <button><a href="add_n.php">Add New</a></button>
                    </td>
                </tr>
                
            </table>
        </div>
        
        
    </body>
</html>


    