<?php
include 'misc/headernavfooter.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEyewear - Contact</title>
    <link href="styles.css" rel="stylesheet">
    <link href="contact-us-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="login-modal.js"></script>
    
    <style>
        html {
            /* Ensures HTML takes up the full height */
            height: 100%;
        }
        
        body {
            /* Use flexbox and column direction for layout */
            display: flex;
            flex-direction: column;
            /* Ensures the body also takes up full height of the viewport */
            min-height: 100vh; 
            margin: 0; /* Ensures no default body margin interferes */
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="contact-form" class="p-4 border rounded shadow-sm">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div id="nameError" class="error-message text-danger small mt-1" style="display:none;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div id="emailError" class="error-message text-danger small mt-1" style="display:none;"></div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                            <div id="messageError" class="error-message text-danger small mt-1" style="display:none;"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-dark px-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="mt-auto bg-black text-center py-2 text-secondary small">
        © 2025 Weyewear | Designed for demo purposes
    </footer>

    <script>
        $(document).ready(function () {

            // Allow only letters and spaces for name
            $("#name").on("keypress", function (e) {
                let regex = /^[a-zA-Z\s]+$/;
                let char = String.fromCharCode(e.which);
                if (!regex.test(char)) {
                    e.preventDefault();
                }
            });

            // Allow only alphanumeric + _ @ . - for email
            $("#email").on("keypress", function (e) {
                let regex = /^[a-zA-Z0-9_@.\-]+$/;
                let char = String.fromCharCode(e.which);
                if (!regex.test(char)) {
                    e.preventDefault();
                }
            });

            // Submit validation
            $("#contact-form").on("submit", function (e) {
                e.preventDefault();

                let name = $("#name").val().trim();
                let email = $("#email").val().trim();
                let message = $("#message").val().trim();
                let isValid = true;

                $(".error-message").hide();

                // Name validation
                if (name === "") {
                    $("#nameError").text("This field is required").show();
                    isValid = false;
                }

                // Email validation
                const emailPattern = /^[a-zA-Z0-9_.\-]+@[a-zA-Z0-9_.\-]+\.[a-zA-Z]{2,}$/;
                if (email === "") {
                    $("#emailError").text("This field is required").show();
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    $("#emailError").text("Please enter a valid email address").show();
                    isValid = false;
                }

                // Message validation
                if (message === "") {
                    $("#messageError").text("This field is required").show();
                    isValid = false;
                }

                // If all valid
                if (isValid) {
                    $("#contact-form").before(
                        $("<div class='alert alert-success text-center'>Form submitted successfully!</div>")
                            .fadeOut(3000)
                    );
                    $("#contact-form")[0].reset();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>