function validateForm() {
    // Check if a radio button or checkbox is selected
    var selected = false;
    var radioButtons = document.getElementsByName("answer");
    for (var i = 0; i < radioButtons.length; i++) {
      if (radioButtons[i].checked) {
        selected = true;
        break;
      }
    }
  
    // If no radio button or checkbox is selected, display an alert
    if (!selected) {
      alert("Please select an answer");
      return false;
    }
    
    return true;
  }