// Alert if no category is selected

  function validateSelection() {
    var select = document.querySelector("select[name='topic']");
    if (select.value === "Select category") {
      alert("Please select a category");
      return false;
    }
    return true;
  }
   /* Limit checkbox selection */ 
  function checkBoxLimit() {
    var checkBoxGroup = document.getElementsByName("multiple-choice[]");
    var limit = 2;
  for(var i=0; i < checkBoxGroup.length; i++){
    checkBoxGroup[i].onclick = function() {
        var checkedcount = 0;
          for (var i = 0; i < checkBoxGroup.length; i++) {
            checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
          }
          if (checkedcount > limit) {
            console.log("You can select maximum of " + limit + " checkboxes.");
          alert("You can select maximum of " + limit + " checkboxes.");						
          this.checked = false;
        }
      }
    }
  }