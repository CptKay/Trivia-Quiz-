function validateForm() {
    // Check if a radio button or checkbox is selected
    var selected = false;
    var radioButtons = document.getElementsByName("single-choice");
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

// Alert if no category is selected

  function validateSelection() {
    var select = document.querySelector("select[name='topic']");
    if (select.value === "Select category") {
      alert("Please select a category");
      return false;
    }
    return true;
  }
