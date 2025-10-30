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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login-modal.js"></script>
    <script src="js/contact-us.js"></script>
    
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

    <!-- FOOTER -->
    <?php
      footer();
    ?>

    <script>
        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>