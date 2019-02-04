<table class = "table table-bordered table-hover">
              <thead>
                  <tr>

                      <td>id</td>
                      <td>post_id</td>
                      <td>title</td>
                      <td>author</td>
                      <td>content</td>
                      <td>email</td>
                      <td>status</td>
                      <td>date</td>
                      
                      
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

                    $query = "SELECT * FROM posts WHERE post_id = $comments_post_id";
                    $select_post_query = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_post_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        
                    }
                    

                   


                   echo "<td> $comment_author</td>";
                   echo "<td> $comment_content</td>";
                   echo "<td> $comment_email</td>";
                   
                   echo "<td> $comment_status</td>";
                   echo "<td> $comment_date</td>";
                   echo "<td> <a href = 'comment.php?approve=$comments_id'>Approve</a></td>";
                   echo "<td> <a href = 'comment.php?unaprove=$comments_id'>Unaprove</a></td>";
                   echo "<td> <a href = 'comment.php?delete=$comments_id'>Delete</a></td>";
                   echo "<td> <a href = 'comment.php?source=c_edit&p_id=$comments_id'>edit</a></td>";
                  
                  
                   echo "</tr>";
               }
              
              
              ?>
              

              <?php



                if(isset($_GET['approve'])){
                    $unaprove_id = $_GET['approve'];
                    $query = "UPDATE comments SET comment_status = 'approve'WHERE comments_id = $unaprove_id";
                    $unaprove_comments = mysqli_query($connection,$query);
                    if(!$unaprove_comments){
                        echo "not working".mysqli_error($connection);
                    }
                    header('Location: comment.php');
                }


                if(isset($_GET['unaprove'])){
                    $unaprove_id = $_GET['unaprove'];
                    $query = "UPDATE comments SET comment_status = 'unaprove'WHERE comments_id = $unaprove_id";
                    $unaprove_comments = mysqli_query($connection,$query);
                    if(!$unaprove_comments){
                        echo "not working".mysqli_error($connection);
                    }
                    header('Location: comment.php');
                }



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