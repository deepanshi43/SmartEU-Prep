function validateForm() {
    let isValid = true;

    // Clear previous errors
    clearErrors();       

    // Validate First Name (Alphabets and Length >= 6)
    const FirstName = document.getElementById('FirstName').value;
    if (!/^[A-Za-z]{6,}$/.test(FirstName)) {
        document.getElementById('firstNameError').textContent = 'First Name must contain alphabets and be at least 6 characters long.';
        isValid = false;
    }

    // Validate Last Name (Not Empty)
    const LastName = document.getElementById('LastName').value;
    if (LastName.trim() === '') {
        document.getElementById('lastNameError').textContent = 'Last Name cannot be empty.';
        isValid = false;
    }

    // Validate Email (Valid Email Pattern)
    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address (name@domain.com).';
        isValid = false;
    }

    // Validate Password (Length >= 6)
    const password = document.getElementById('password').value;
    if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters long.';
        isValid = false;
    }


   const confpass = document.getElementById('confpass').value;
if (confpass !== password) {
    document.getElementById('confPasswordError').textContent = 'Passwords do not match. Please re-confirm it.';
    isValid = false;
}

const resumeUpload = document.getElementById('resume_upload');
if (!resumeUpload.value) {
  document.getElementById('resumeUploadError').textContent =
    'Please upload your resume.';
  isValid = false;}
    
   

    

    return isValid;
}

function clearErrors() {
    const errorMessages = document.querySelectorAll('.error');
    errorMessages.forEach(msg => msg.textContent = '');
}

 const hamburger = document.querySelector('.hamburger');
  const navList = document.querySelector('.nav-listItems');

  hamburger.addEventListener('click', () => {
    navList.classList.toggle('show');
  });

     const checkbox = document.getElementById("checkbox");
  const icon = document.getElementById("theme-icon");

  checkbox.addEventListener("change", () => {
    document.body.classList.toggle("dark-theme");
    icon.textContent = document.body.classList.contains("dark-theme") ? "🌙" : "☀️";
  });

document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.dropdown > a');
    const menu = document.querySelector('.dropdown-menu');

    dropdown.addEventListener('click', function (e) {
      e.preventDefault();
      menu.classList.toggle('show');
    });
  });


function dropdown(e) {
   e.stopPropagation(); // optional: prevents bubbling if needed

  const content = e.currentTarget;
  const subMenu = content.querySelector('.sub-dropdown-menu');
  const arrow = content.querySelector('.arrow');

  if (subMenu) {
    subMenu.classList.toggle('show');
    arrow.classList.toggle('rotate');
  }
}


    