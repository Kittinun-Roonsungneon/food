<?php
        if (isset($_POST['submit'])) {
            require ('connection.php');
           if (!empty($_POST['name'])) {
    
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $sql="INSERT INTO `products`(`name`, `description`, `image`, `price`) VALUES ('$name','$description','$image','$price')";
            // $sql = "INSERT INTO products (name, description) VALUES (NULL, '$name')";
            $insert = mysqli_query($conn,$sql);
    
              if ($insert) {
                  echo "Message successfully added!";
              }
              else {
                echo "Error" . mysqli_error($conn);
              }
          }
        }
        mysqli_close($conn); 
?>