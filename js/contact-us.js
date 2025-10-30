$(function () {
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
        $(
          "<div class='alert alert-success text-center'>Form submitted successfully!</div>"
        ).fadeOut(3000)
      );
      $("#contact-form")[0].reset();
    }
  });
});
