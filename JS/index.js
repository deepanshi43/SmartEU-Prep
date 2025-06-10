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


   const hamburger = document.querySelector('.hamburger');
  const navList = document.querySelector('.nav-listItems');

  hamburger.addEventListener('click', () => {
    navList.classList.toggle('show');
  });
 
  function scrollToCards() {
    const cardSection = document.getElementById("cards");
    cardSection.scrollIntoView({ behavior: "smooth" });
  }




  function scrollTestimonials(direction) {
    const container = document.querySelector('.testimonials-list');
    const scrollAmount = 320; // Adjust based on width of testimonial

    if (direction === 'left') {
      container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
  }

  const checkbox = document.getElementById("checkbox");
  const icon = document.getElementById("theme-icon");

  checkbox.addEventListener("change", () => {
    document.body.classList.toggle("dark-theme");
    icon.textContent = document.body.classList.contains("dark-theme") ? "🌙" : "☀️";
  });



 
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('[data-role]');

  links.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault(); // prevent default <a> behavior
      const jobRole = e.target.getAttribute('data-role');
      let questions = [];

      switch (jobRole) {
        case "teaching":
          questions = [
            "How do you handle a disruptive student in class?",
            "Describe your teaching philosophy.",
            "How do you integrate technology into your lessons?",
            "How do you assess student progress?",
            "What would you do if a student isn't performing well?"
          ];
          break;
        case "hr":
          questions = [
            "Tell me about yourself.",
            "How do you handle conflict?",
            "What are your strengths?",
            "Why should we hire you?",
            "Where do you see yourself in 5 years?"
          ];
          break;
        case "accountant":
          questions = [
            "What accounting software are you proficient in?",
            "How do you handle tight deadlines during audits?",
            "Explain the difference between accounts payable and receivable.",
            "What steps do you take to avoid errors in your work?",
            "How do you prepare a budget?"
          ];
          break;
        case "analyst":
          questions = [
            "Describe how you conduct data analysis.",
            "What tools do you use for visualization?",
            "Explain a time you made a recommendation based on data.",
            "What is regression analysis?",
            "How do you validate data accuracy?"
          ];
          break;
        case "hw":
          questions = [
            "What are the main components of a motherboard?",
            "Explain the difference between RAM and ROM.",
            "How do you troubleshoot a non-booting system?",
            "What's your experience with circuit design?",
            "What are POST codes in BIOS?"
          ];
          break;
        case "web developer":
          questions = [
            "What is the difference between HTML and XHTML?",
            "Explain the DOM structure.",
            "What is event delegation in JavaScript?",
            "How does async/await work?",
            "Explain responsive design."
          ];
          break;
        case "management":
          questions = [
            "How do you manage a team under pressure?",
            "Describe a successful project you managed.",
            "How do you handle resource conflicts?",
            "What tools do you use for project tracking?",
            "How do you motivate team members?"
          ];
          break;
        default:
          questions = [
            "Why are you interested in this role?",
            "Describe a challenge you've overcome.",
            "What are your greatest strengths?",
            "Tell me about a project you led.",
            "How do you handle pressure?"
          ];
      }

      // Redirect to interview page with encoded questions
      const encodedData = btoa(JSON.stringify(questions));
      window.location.href = `interview.html?data=${encodedData}`;
    });
  });
});

