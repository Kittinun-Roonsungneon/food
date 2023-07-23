<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aek O-cha</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">

    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 text-center tm-text-primary">
                เพิ่มสินค้า
            </h2>
        </div>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group text-center">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="ชื่อสินค้า" name="name">
                                <label for="description" class="form-label">Description:</label>
                                <input type="text" class="form-control" id="description" placeholder="รายละเอียดสินค้า" name="description">
                                <label for="myfile">Select a file:</label>
                                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control" id="price" placeholder="ราคาสินค้า" name="price">
                            </div>

                            <div class="text-center"> <!-- Center the button within this div -->
                                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div> <!-- container-fluid, tm-container-content -->

    <?php
    include('footer.php');
    ?>
</body>
<script src="js/plugins.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });

        // Function to handle the form submission for adding a product
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                var formData = new FormData();
                formData.append('name', $('#name').val());
                formData.append('description', $('#description').val());
                formData.append('price', $('#price').val());
                formData.append('image', $('#image')[0].files[0]);
                console.log(formData);
                $.ajax({
                    url: 'crud.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false, // Don't process the data (required for FormData)
                    contentType: false, // Don't set the content type (required for FormData)
                    success: function(data) {
                        if (data.success) {
                            // Product inserted successfully, do something (e.g., show a success message)
                            console.log('Product inserted successfully!');
                            // You can add any additional handling, like refreshing the table or displaying a success message
                        } else {
                            // Product insertion failed, do something (e.g., show an error message)
                            console.error('Product insertion failed.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error inserting product:', error);
                    }
                });
            });
        });
    
</script>

</html>