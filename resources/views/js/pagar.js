document.addEventListener("DOMContentLoaded", function(e) {

    var miForm = document.getElementById('Card');
    miForm.onsubmit = function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      var jsonData = {};
      for (var [k, v] of formData) {
        jsonData[k] = v;
      }
      console.log(jsonData);
    }

  });