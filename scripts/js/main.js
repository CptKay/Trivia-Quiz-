// Alert if no category is selected

  function validateSelection() {
    var select = document.querySelector("select[name='topic']");
    if (select.value === "Select category") {
      alert("Please select a category");
      return false;
    }
    return true;
  }
