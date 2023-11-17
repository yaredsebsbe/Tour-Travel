<?php
// Process the form submission
$email = $_POST['email'];

// Perform further actions with the email
// ...

// Redirect back to the HTML page
header("Location: popup.php");
exit;
?>



<!DOCTYPE html>
<html>
<head>
  <title>Invalid Email Popup</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    .hidden {
  display: none;
}

#popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}

#popupContent {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

#closePopup {
  margin-top: 10px;
}

</style>
<body>
  <h1>Invalid Email Popup</h1>

  <form id="emailForm" action="process.php" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <input type="submit" value="Submit">
  </form>

  <div id="popup" class="hidden">
    <div id="popupContent">
      <h2>Invalid Email</h2>
      <p>Please enter a valid email address.</p>
      <button id="closePopup">Close</button>
    </div>
  </div>

  <script>
    document.getElementById("emailForm").addEventListener("submit", function(event) {
  var emailInput = document.getElementById("email");
  var email = emailInput.value;
  if (!validateEmail(email)) {
    event.preventDefault();
    showPopup();
  }
});

document.getElementById("closePopup").addEventListener("click", function() {
  hidePopup();
});

function validateEmail(email) {
  // Email validation regex pattern
  var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(email);
}

function showPopup() {
  document.getElementById("popup").classList.remove("hidden");
}

function hidePopup() {
  document.getElementById("popup").classList.add("hidden");
}

  </script>
</body>
</html>
