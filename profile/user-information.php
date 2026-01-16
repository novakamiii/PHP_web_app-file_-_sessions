<?php
include '../misc/headernavfooter.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Get current user information
include '../misc/db.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT name, email, contact, address FROM users WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Split name into first and last name if possible
$nameParts = explode(' ', $user['name'], 2);
$firstName = $nameParts[0] ?? '';
$lastName = $nameParts[1] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - User Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="../styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .profile-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 1rem;
            background-color: #fff;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .alert {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #5c636a;
            border-color: #565e64;
            color: #fff;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .form-label .required {
            color: #dc3545;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .form-control.is-valid {
            border-color: #198754;
        }

        .error-message {
            font-size: 0.875rem;
        }

        .info-view {
            display: block;
        }

        .edit-form {
            display: none;
        }

        .info-item {
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.1rem;
            color: #212529;
            word-break: break-word;
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>User Information</h2>
                        <div>
                            <a href="orders-list.php" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-shopping-bag me-2"></i>My Orders
                            </a>
                            <a href="../products.php" class="btn btn-outline-secondary">
                                <i class="fas fa-home me-2"></i>Back to Products
                            </a>
                        </div>
                    </div>

                    <div id="alertContainer"></div>

                    <!-- View Mode -->
                    <div class="profile-card info-view" id="viewMode">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Personal Information</h4>
                            <button type="button" class="btn btn-outline-secondary" id="editBtn">
                                <i class="fas fa-edit me-2"></i>Edit Information
                            </button>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($user['name']); ?></div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Email Address</div>
                            <div class="info-value"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Contact Number</div>
                            <div class="info-value"><?php echo htmlspecialchars($user['contact']); ?></div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Address</div>
                            <div class="info-value"><?php echo nl2br(htmlspecialchars($user['address'])); ?></div>
                        </div>
                    </div>

                    <!-- Edit Mode -->
                    <div class="profile-card edit-form" id="editMode">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Edit Personal Information</h4>
                            <button type="button" class="btn btn-outline-secondary" id="cancelBtn">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                        </div>

                        <form id="profile-form" method="POST" action="../misc/update_profile_function.php">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" 
                                           value="<?php echo htmlspecialchars($firstName); ?>" 
                                           maxlength="50" 
                                           pattern="[A-Za-z\s]+"
                                           title="First name should only contain letters and spaces"
                                           required>
                                    <div id="firstNameError" class="error-message text-danger small mt-1" style="display:none;"></div>
                                    <small class="form-text text-muted">Letters and spaces only, max 50 characters</small>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" 
                                           value="<?php echo htmlspecialchars($lastName); ?>" 
                                           maxlength="50"
                                           pattern="[A-Za-z\s]+"
                                           title="Last name should only contain letters and spaces"
                                           required>
                                    <div id="lastNameError" class="error-message text-danger small mt-1" style="display:none;"></div>
                                    <small class="form-text text-muted">Letters and spaces only, max 50 characters</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($user['email']); ?>" 
                                       maxlength="255"
                                       pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                                       title="Please enter a valid email address"
                                       required>
                                <div id="emailError" class="error-message text-danger small mt-1" style="display:none;"></div>
                                <small class="form-text text-muted">Enter a valid email address</small>
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact Number <span class="required">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact" 
                                       value="<?php echo htmlspecialchars($user['contact']); ?>" 
                                       maxlength="15"
                                       pattern="[0-9+\-() ]+"
                                       title="Please enter a valid contact number"
                                       required>
                                <div id="contactError" class="error-message text-danger small mt-1" style="display:none;"></div>
                                <small class="form-text text-muted">Numbers, spaces, and special characters (+, -, parentheses) only, max 15 characters</small>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address <span class="required">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="3" 
                                          maxlength="500"
                                          required><?php echo htmlspecialchars($user['address']); ?></textarea>
                                <div id="addressError" class="error-message text-danger small mt-1" style="display:none;"></div>
                                <small class="form-text text-muted">Max 500 characters</small>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-outline-secondary me-2" id="cancelBtn2">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php
    footer();
    ?>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle between view and edit modes
            $('#editBtn, #cancelBtn, #cancelBtn2').on('click', function() {
                $('#viewMode').toggle();
                $('#editMode').toggle();
                // Clear any validation errors when switching modes
                $('.error-message').hide();
                $('.form-control').removeClass('is-invalid is-valid');
                $('#alertContainer').empty();
            });

            // Validation functions
            function validateFirstName() {
                const firstName = $('#firstName').val().trim();
                const firstNameError = $('#firstNameError');
                
                if (firstName === '') {
                    firstNameError.text('First name is required').show();
                    $('#firstName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (!/^[A-Za-z\s]+$/.test(firstName)) {
                    firstNameError.text('First name should only contain letters and spaces').show();
                    $('#firstName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (firstName.length > 50) {
                    firstNameError.text('First name must be 50 characters or less').show();
                    $('#firstName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                firstNameError.hide();
                $('#firstName').addClass('is-valid').removeClass('is-invalid');
                return true;
            }

            function validateLastName() {
                const lastName = $('#lastName').val().trim();
                const lastNameError = $('#lastNameError');
                
                if (lastName === '') {
                    lastNameError.text('Last name is required').show();
                    $('#lastName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (!/^[A-Za-z\s]+$/.test(lastName)) {
                    lastNameError.text('Last name should only contain letters and spaces').show();
                    $('#lastName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (lastName.length > 50) {
                    lastNameError.text('Last name must be 50 characters or less').show();
                    $('#lastName').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                lastNameError.hide();
                $('#lastName').addClass('is-valid').removeClass('is-invalid');
                return true;
            }

            function validateEmail() {
                const email = $('#email').val().trim();
                const emailError = $('#emailError');
                const emailRegex = /^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/;
                
                if (email === '') {
                    emailError.text('Email address is required').show();
                    $('#email').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (!emailRegex.test(email)) {
                    emailError.text('Please enter a valid email address').show();
                    $('#email').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (email.length > 255) {
                    emailError.text('Email address must be 255 characters or less').show();
                    $('#email').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                emailError.hide();
                $('#email').addClass('is-valid').removeClass('is-invalid');
                return true;
            }

            function validateContact() {
                const contact = $('#contact').val().trim();
                const contactError = $('#contactError');
                
                if (contact === '') {
                    contactError.text('Contact number is required').show();
                    $('#contact').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (!/^[0-9+\-() ]+$/.test(contact)) {
                    contactError.text('Contact number should only contain numbers and special characters (+, -, parentheses)').show();
                    $('#contact').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (contact.length > 15) {
                    contactError.text('Contact number must be 15 characters or less').show();
                    $('#contact').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (contact.replace(/[^0-9]/g, '').length < 7) {
                    contactError.text('Contact number must contain at least 7 digits').show();
                    $('#contact').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                contactError.hide();
                $('#contact').addClass('is-valid').removeClass('is-invalid');
                return true;
            }

            function validateAddress() {
                const address = $('#address').val().trim();
                const addressError = $('#addressError');
                
                if (address === '') {
                    addressError.text('Address is required').show();
                    $('#address').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (address.length > 500) {
                    addressError.text('Address must be 500 characters or less').show();
                    $('#address').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                if (address.length < 5) {
                    addressError.text('Address must be at least 5 characters long').show();
                    $('#address').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
                
                addressError.hide();
                $('#address').addClass('is-valid').removeClass('is-invalid');
                return true;
            }

            // Real-time validation on input
            $('#firstName').on('blur', validateFirstName);
            $('#lastName').on('blur', validateLastName);
            $('#email').on('blur', validateEmail);
            $('#contact').on('blur', validateContact);
            $('#address').on('blur', validateAddress);

            // Clear validation on input
            $('#firstName, #lastName, #email, #contact, #address').on('input', function() {
                $(this).removeClass('is-invalid is-valid');
                $(this).siblings('.error-message').hide();
            });

            // Form submission
            $('#profile-form').on('submit', function(e) {
                e.preventDefault();
                
                // Clear previous errors
                $('.error-message').hide();
                $('.form-control').removeClass('is-invalid is-valid');
                $('#alertContainer').empty();

                // Validate all fields
                let isValid = true;
                isValid = validateFirstName() && isValid;
                isValid = validateLastName() && isValid;
                isValid = validateEmail() && isValid;
                isValid = validateContact() && isValid;
                isValid = validateAddress() && isValid;

                if (!isValid) {
                    $('#alertContainer').html(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                        '<i class="fas fa-exclamation-triangle me-2"></i>Please fix the errors in the form before submitting.' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    // Scroll to first error
                    $('html, body').animate({
                        scrollTop: $('.is-invalid').first().offset().top - 100
                    }, 500);
                    return;
                }

                // Get form data
                const formData = $(this).serialize();

                // Disable submit button
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Saving...');

                // Submit via AJAX
                $.ajax({
                    url: '../misc/update_profile_function.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'text',
                    success: function(response) {
                        if (response.trim() === 'Profile updated successfully!') {
                            $('#alertContainer').html(
                                '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                '<i class="fas fa-check-circle me-2"></i>' + response +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                            // Switch back to view mode and reload page after 1.5 seconds to show updated data
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            submitBtn.prop('disabled', false).html('<i class="fas fa-save me-2"></i>Save Changes');
                            $('#alertContainer').html(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                '<i class="fas fa-exclamation-circle me-2"></i>' + response +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>'
                            );
                        }
                    },
                    error: function() {
                        submitBtn.prop('disabled', false).html('<i class="fas fa-save me-2"></i>Save Changes');
                        $('#alertContainer').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            '<i class="fas fa-exclamation-circle me-2"></i>An error occurred. Please try again.' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );
                    }
                });
            });
        });
    </script>
</body>

</html>
