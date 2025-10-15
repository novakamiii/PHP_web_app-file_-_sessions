$(function () {
  //Load the modal when login button is clicked
  $('#loginButton').on('click', function (e) {
    e.preventDefault();
    if (!$('#authModal').length) {
      $('body').append('<div id="modalContainer"></div>');
      $('#modalContainer').load('login-modal.php #authModal', function () {
        $('#authModal').modal('show');
      });
    } else {
      $('#authModal').modal('show');
    }
  });

  // Handle events AFTER the modal has been loaded dynamically
  $(document).on('shown.bs.modal', '#authModal', function () {
    console.log("Modal fully loaded");
    
    // Add enhanced blur effect to body when modal is open
    $('body').addClass('modal-blur-active');

    // ============== Prevent invalid characters in email field ==============
    $(document).off('keypress', '#loginEmail, #signupEmail').on('keypress', '#loginEmail, #signupEmail', function (e) {
      let regex = /^[a-zA-Z0-9_@.\-]+$/; // only allow alphanumeric, _, @, ., and -
      let char = String.fromCharCode(e.which);
      if (!regex.test(char)) {
        e.preventDefault();
      }
    });

    // ================= PASSWORD TOGGLE =================
    $(document).off('click', '.toggle-password').on('click', '.toggle-password', function () {
      const target = $($(this).data('target'));
      const type = target.attr('type') === 'password' ? 'text' : 'password';
      target.attr('type', type);
      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });

    // ================= SWITCH BETWEEN LOGIN / SIGNUP =================
    $(document).off('click', '#openSignup').on('click', '#openSignup', function (e) {
      e.preventDefault();
      $('#loginFormContainer').addClass('d-none');
      $('#signupFormContainer').removeClass('d-none');
      $('#modalTitle').text('Sign Up');
    });

    $(document).off('click', '#openLogin').on('click', '#openLogin', function (e) {
      e.preventDefault();
      $('#signupFormContainer').addClass('d-none');
      $('#loginFormContainer').removeClass('d-none');
      $('#modalTitle').text('Login');
    });

    // ================= LOGIN VALIDATION =================
    $(document).off('submit', '#loginForm').on('submit', '#loginForm', function (e) {
      e.preventDefault();

      let email = $('#loginEmail').val().trim();
      let password = $('#loginPassword').val().trim();
      let valid = true;

      $('#loginEmailError').text('');
      $('#loginPasswordError').text('');

      if (!email || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
        $('#loginEmailError').text('Please enter a valid email.');
        valid = false;
      }
      if (!password) {
        $('#loginPasswordError').text('Password is required.');
        valid = false;
      }

      if (valid) {
        alert('Log-in successful!');
        $('#authModal').modal('hide');
        $('#loginForm')[0].reset();
      }
    });

    // ================= SIGNUP VALIDATION =================
    $(document).off('submit', '#signupForm').on('submit', '#signupForm', function (e) {
      e.preventDefault();

      let valid = true;
      const nameRegex = /^[A-Za-z]+(?:\s[A-Za-z]+)*$/;
      const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
      const firstName = $('#firstName').val().trim();
      const lastName = $('#lastName').val().trim();
      const address = $('#address').val().trim();
      const email = $('#signupEmail').val().trim();
      const contact = $('#contact').val().trim();
      const password = $('#signupPassword').val();
      const confirm = $('#confirmPassword').val();

      $('.error-msg').text('');

      if (!firstName || !nameRegex.test(firstName)) {
        $('#firstNameError').text('Invalid first name.');
        valid = false;
      }
      if (!lastName || !nameRegex.test(lastName)) {
        $('#lastNameError').text('Invalid last name.');
        valid = false;
      }
      if (!address) {
        $('#addressError').text('Address is required.');
        valid = false;
      }
      if (!email || !emailRegex.test(email)) {
        $('#signupEmailError').text('Invalid email format.');
        valid = false;
      }
      if (!/^[0-9]{11}$/.test(contact)) {
        $('#contactError').text('Contact must be 11 digits.');
        valid = false;
      }
      if (password.includes(' ') || password.length < 7) {
        $('#signupPasswordError').text('Password must be at least 7 characters long and contain no spaces.');
        valid = false;
      }
      if (password !== confirm) {
        $('#confirmPasswordError').text('Passwords do not match.');
        valid = false;
      }

      if (valid) {
        alert('Sign-up successful!');
        $('#authModal').modal('hide')
        $('#signupForm')[0].reset();
      }
    });

    // ================= CONTACT NUMBER VALIDATION =================
    $(document).off('input', '#contact').on('input', '#contact', function () {
      this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);
    });
  });

  // Remove blur effect when modal is hidden
  $(document).on('hidden.bs.modal', '#authModal', function () {
    $('body').removeClass('modal-blur-active');
  });
});