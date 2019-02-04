<table class = "table table-bordered table-hover">
              <thead>
                  <tr>

                      <td>id</td>
                      <td>username</td>
                      <td>firstname</td>
                      <td>lastname</td>
                      <td>email</td>
                      <td>role</td>
                      <td>date</td>
                      
                      
                  </tr>
              </thead>

              <tbody>

              <?php
               $query = "SELECT * FROM user";
               $result_all_user = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($result_all_user)){
                   $user_id = $row['user_id'];
                   $username = $row['username'];
                   $firstname = $row['user_firstname'];
                   $lastname = $row['user_lastname'];
                   $user_password = $row['user_password'];
                   $user_email = $row['user_email'];
                   $user_role = $row['user_role'];
                   

                   echo "<tr>";
                   echo "<td> $user_id</td>";
                   echo "<td> $username</td>";
                   echo "<td> $firstname</td>";
                   echo "<td> $lastname</td>";

                   echo "<td>$user_email </td>";
                   echo "<td>$user_role </td>";
                   echo "<td>date </td>";
                   
                   echo "<td> <a href = 'user.php?admin=$user_id'>admin</a></td>";
                   echo "<td> <a href = 'user.php?subscriber=$user_id'>subscriber</a></td>";
                   echo "<td> <a href = 'user.php?delete=$user_id'>Delete</a></td>";
                   echo "<td> <a href = 'user.php?source=user_edit&p_id=$user_id'>edit</a></td>";
                  
                  
                   echo "</tr>";
               }
              
              
              ?>
              

              <?php



                if(isset($_GET['admin'])){
                    $user_id = $_GET['admin'];
                    $query = "UPDATE user SET user_role = 'admin'WHERE user_id = $user_id";
                    $user_updete = mysqli_query($connection,$query);
                    if(!$user_updete){
                        echo "not working".mysqli_error($connection);
                    }
                    header('Location: user.php');
                }


                if(isset($_GET['subscriber'])){
                    $user_id = $_GET['subscriber'];
                    $query = "UPDATE user SET user_role = 'subscriber'WHERE user_id = $user_id";
                    $user_update = mysqli_query($connection,$query);
                    if(!$user_update){
                        echo "not working".mysqli_error($connection);
                    }
                    header('Location: user.php');
                }



              if(isset($_GET['delete'])){
                  $user_id = $_GET['delete'];
                  $query ="DELETE FROM user WHERE user_id= $user_id";
                  $result_delete_query = mysqli_query($connection,$query);
                  header('Location: user.php');
                  if(!$result_delete_query){
                      echo "not working".mysqli_error($connection);
                  }

              }
              
              ?>
                 
              </tbody>
          </table>