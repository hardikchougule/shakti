<?php
    include('connectionlogin.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from signup1 where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: welcomelogin.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "indexlogin.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>