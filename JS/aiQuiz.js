
  const form = document.querySelector('.interview-form');
  const questionInput = document.getElementById('no-of-ques');
  const languageSelect = document.getElementById('language');

  form.addEventListener('submit', function (e) {
    const numQuestions = parseInt(questionInput.value);
    const language = languageSelect.value;

    // Clear previous error styling
    questionInput.style.borderColor = '';
    languageSelect.style.borderColor = '';

    let isValid = true;

    // Validate number of questions
    if (isNaN(numQuestions) || numQuestions < 1 || numQuestions > 10) {
      alert("Please enter a number of questions between 1 and 10.");
      questionInput.style.borderColor = 'red';
      isValid = false;
    }

    // Validate language selection
    if (language === '') {
      alert("Please select a preferred language.");
      languageSelect.style.borderColor = 'red';
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault(); // Prevent form submission
    }
  });








  

