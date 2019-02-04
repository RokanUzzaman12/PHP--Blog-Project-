<table class = "table table-bordered table-hover">
              <thead>
                  <tr>

                      <td>comment_id</td>
                      <td>comment_post_id</td>
                      <td>comment_author</td>
                      <td>comment_content</td>
                      <td>comment_email</td>
                      <td>comment_status</td>
                      <td>comment_date</td>
                      
                      
                  </tr>
              </thead>

              <tbody>

              <?php
               $query = "SELECT * FROM comments";
               $result_all_comments = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($result_all_comments)){
                   $comments_id = $row['comments_id'];
                   $comments_post_id = $row['comment_post_id'];
                   $comment_author = $row['comment_author'];
                   $comment_email = $row['comment_email'];
                   $comment_content = $row['comment_content'];
                   $comment_status = $row['comment_status'];
                   $comment_date = $row['comment_date'];

                   echo "<tr>";
                   echo "<td> $comments_id</td>";
                   echo "<td> $comments_post_id</td>";
                   echo "<td> $comment_author</td>";
                   echo "<td> $comment_email</td>";
                   echo "<td> $comment_content</td>";
                   echo "<td> $comment_status</td>";
                   echo "<td> $comment_date</td>";
                   echo "<td> <a href = 'comment.php?delete=$comments_id'>Delete</a></td>";
                   echo "<td> <a href = 'comment.php?source=c_edit&p_id=$comments_id'>edit</a></td>";
                  
                   echo "</tr>";
               }
              
              
              ?>
              

              <?php
              if(isset($_GET['delete'])){
                  $comment_id = $_GET['delete'];
                  $query ="DELETE FROM comments WHERE comments_id= $comment_id";
                  $result_delete_query = mysqli_query($connection,$query);
                  if(!$result_delete_query){
                      echo "not working".mysqli_error($connection);
                  }

              }
              
              ?>
                 
              </tbody>
          </table>