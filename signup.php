<?php
    include('connectionsign.php');
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $password = mysqli_real_escape_string($conn, $_POST['rpass']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

        
        
        $sql = "Select * from signup1 where username='$username'";
        $result = mysqli_query($conn, $sql);        
        $count_user = mysqli_num_rows($result);  

        $sql = "Select * from signup1 where email='$email'";
        $result = mysqli_query($conn, $sql);        
        $count_email = mysqli_num_rows($result);  
        
        if($count_user == 0 && $count_email==0){  
            
            if($password == $cpassword) {
    
                $hash = password_hash($password, 
                                    PASSWORD_DEFAULT);
                    
                // Password Hashing is used here. 
                $sql = "INSERT INTO signup1(username, email, password,rpass) VALUES('$username', '$email','$hash', '$rpass')";
        
                $result = mysqli_query($conn, $sql);
        
                if ($result) {
                    header("Location: indexlogin.php");
                }
            } 
            else { 
                echo  '<script>
                        alert("Passwords do not match")
                        window.location.href = "indexsign.php";
                    </script>';
            }      
        }  
        else{  
            if($count_user>0){
                echo  '<script>
                        window.location.href = "indexsign.php";
                        alert("Username already exists!!")
                    </script>';
            }
            if($count_email>0){
                echo  '<script>
                        window.location.href = "indexsign.php";
                        alert("Email already exists!!")
                    </script>';
            }
        }     
    }
    ?>