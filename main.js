function calculateBMI() {
    
    var weightInput = document.getElementById('weight');
    var heightInput = document.getElementById('height');

    var weight = weightInput.value;
    var height = heightInput.value;
  
    var bmi = weight / ((height / 100) * (height / 100));

    var resultElement = document.getElementById('result');

    if(weight == '' || height == ''){
        resultElement.innerHTML = 'Please enter weight and height!';
    }
    else if (bmi < 18.5) {
        resultElement.innerHTML = "Your BMI is: " + bmi.toFixed(2) + " Underweight";
      } 
    else if (bmi < 25) {
        resultElement.innerHTML = "Your BMI is: " + bmi.toFixed(2) + " Normal Weight";
      } 
    else if (bmi < 30) {
        resultElement.innerHTML = "Your BMI is: " + bmi.toFixed(2) + " Overweight";
      } 
    else {
        resultElement.innerHTML = "Your BMI is: " + bmi.toFixed(2) + " Obese";
      }

      weightInput.value = '';
      heightInput.value = '';
      
  }

  document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  
    var fName = document.getElementById('Fname').value.trim();
    var lName = document.getElementById('Lname').value.trim();
    var email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
  
    if (fName === '') {
      alert('Please enter your first name');
    }

    else if(lName === ''){
      alert('Please enter your last name')
    }
  
    else if (email === '') {
      alert('Please enter your email');
    }
  
    else if (!emailRegex.test(email)) {
    alert('Please enter a valid email address!');
    }

    else if (password === '') {
      alert('Please enter your password');
    } 
    else if (!passwordRegex.test(password)) {
      alert('Password must be at least 8 characters long and include at least one letter and one number');
    } 
    else {
      document.getElementById('signup-form').reset(); 
    }
    
  }
);

function togglePasswordVisibility() {
  var passwordInput = document.getElementById('password');
  var icon = document.querySelector('.show-hide-icon');

  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
  } else {
      passwordInput.type = 'password';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
  }
}
