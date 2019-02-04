<table class = "table table-bordered table-hover">
            <thead>
                <tr>
                    <td>id</td>
                    <td>pcid</td>
                    <td>title</td>
                    <td>author</td>
                    <td>date</td>
                    <td>image</td>
                    <td>content</td>
                    <td>tag</td>
                    <td>comment</td>
                    <td>status</td>
                    
                </tr>
            </thead>
            <tbody>




              <?php
                    $query = "SELECT * FROM posts";
                    $result_query = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($result_query)){
                     $post_id = $row['post_id'];
                     $post_category_id = $row['post_category_id'];
                     $post_title = $row['post_title'];
                     $post_author = $row['post_author'];
                     $post_date = $row['post_date'];
                     $post_image = $row['post_image'];
                     $post_content = $row['post_content'];
                     $post_tag = $row['post_tag'];
                     $post_comment_count = $row['post_comment_count'];
                     $post_status = $row['post_status'];
                        echo "<tr>";
                        echo "<td>$post_id</td>";
                        echo "<td>$post_category_id</td>";
                        echo "<td>$post_title</td>";
                        echo "<td>$post_author</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><img src = '../image/$post_image' width = '100px'> </td>";
                        echo "<td>$post_content</td>";
                        echo "<td>$post_tag</td>";
                        echo "<td>$post_comment_count</td>";
                        echo "<td>$post_status</td>";
                        echo "<td><a href = 'view_all_post.php?p_id={$post_id}'> published</a></td>";
                        echo "<td><a href = 'view_all_post.php?pi_id={$post_id}'> personal</a></td>";
                        echo "<td><a href = 'view_all_post.php?delete={$post_id}'> Delet</a></td>";
                        echo "<td><a href = 'view_all_post.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
                        echo "<tr>";

                       

                    
                    }

        
        
                ?>

                    <?php
                    if(isset($_GET['p_id'])){
                        $approve_id = $_GET['p_id'];
                        $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $approve_id";
                        $result_query = mysqli_query($connection,$query);
                        if(!$result_query){
                            die("Faild".mysqli_error($connection));
                        }
                        header("Location: view_all_post.php");
                    } 
                    ?>
                    
                    <?php
                    if(isset($_GET['pi_id'])){
                        $approve_id = $_GET['pi_id'];
                        $query = "UPDATE posts SET post_status = 'personal' WHERE post_id = $approve_id";
                        $result_query = mysqli_query($connection,$query);
                        if(!$result_query){
                            die("Faild".mysqli_error($connection));
                        }
                        header("Location: view_all_post.php");
                    } 
                    ?>

                 <?php
                if(isset($_GET['delete'])){
                    $post_id = $_GET['delete'];

                    $query = "DELETE FROM posts WHERE post_id = $post_id";
                    $delete_query = mysqli_query($connection,$query);
                    if(!$delete_query){
                        die('query faild'.mysqli_error($connection));
                        //header("Location: view_all_post.php");
                        header("Location: view_all_post.php");
                    }
                }
                
                ?>

          
                
                    
             
            </tbody>
        </table>