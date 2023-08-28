$(document).ready(function() {
  $('.msg').animate({
    opacity: 1
  }, 500);

  setTimeout(function() {
      $('.msg').animate({
        opacity: 0
      }, 500, function() {
        $(this).remove();
      });
    }, 2000);

    $('.prev').click(function() {
      $('#myCarousel').carousel('prev');
    });
    
    $('.next').click(function() {
      $('#myCarousel').carousel('next');
    });
    
  });



function validateField(input, fieldName, regex = null) {
  const value = input.value.trim();
  if (!value) {
    showError(input, `The ${fieldName} is required`);
    return false;
  }
  if (regex && !regex.test(value)) {
    showError(input, `The ${fieldName} is invalid`);
    return false;
  }
  return true;
}

function validateLogin() {
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");
  const usernameRegx = /^[a-zA-Z][a-zA-Z0-9]{3,15}$/;

  document.querySelectorAll(".error").forEach((element) => element.remove());

  const isUsernameValid = validateField(usernameInput, "username", usernameRegx);
  const isPasswordValid = validateField(passwordInput, "password");

  return isUsernameValid && isPasswordValid;
}

function validateRegistration() {
  const usernameInput = document.getElementById("reg-username");
  const emailInput = document.getElementById("reg-email");
  const passwordInput = document.getElementById("reg-password");
  const passwordConfirmInput = document.getElementById("reg-password-confirmation");
  const usernameRegx = /^[a-zA-Z][a-zA-Z0-9]{3,15}$/;
  const emailRegx = /^\S+@\S+\.\S+$/;

  document.querySelectorAll(".error").forEach((element) => element.remove());

  const isUsernameValid = validateField(usernameInput, "username", usernameRegx);
  const isEmailValid = validateField(emailInput, "email", emailRegx);
  const isPasswordValid = validateField(passwordInput, "password");
  const isPasswordConfirmValid = validateField(passwordConfirmInput, "password confirmation");

  if (isPasswordConfirmValid && passwordInput.value.trim() !== passwordConfirmInput.value.trim()) {
    showError(passwordConfirmInput, "The password and password confirmation does not match");
    return false;
  }

  return isUsernameValid && isEmailValid && isPasswordValid && isPasswordConfirmValid;
}


function showError(inputElement, errorMessage) {
  const errorDiv = document.createElement("div");
  inputElement.classList.add("error-border"); // dodajemo crvenu ivicu oko elementa
  errorDiv.innerText = errorMessage;
  errorDiv.classList.add("error");
  inputElement.parentNode.insertBefore(errorDiv, inputElement.nextElementSibling);
  inputElement.setAttribute("data-error", errorMessage); // dodajemo data-error atribut
  
  // sklanjamo grešku kada se unese ispravan input
  inputElement.addEventListener('input', function() {
    const errorDiv = inputElement.parentNode.querySelector('.error');
    if (errorDiv) errorDiv.remove();
    inputElement.classList.remove('error-border');
    inputElement.removeAttribute("data-error"); // sklanjamo data-error atribut
  });
}

function checkEmailAvailability() {
    var email = $("#reg-email").val();
    $.ajax({
        type: "POST",
        url: "check_email.php",
        data: {email: email},
        success: function(response){
            if(response=="Email available.") {
                $('#email-availability-status').html('<span class="text-success">'+response+'</span>').show();
            } else {
                $('#email-availability-status').html('<span class="text-danger">'+response+'</span>').show();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: " + textStatus);
        }
    });
}

