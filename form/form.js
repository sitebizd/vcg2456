function submitData() {
  var businessName = document.getElementById('businessName').value;
  var address = document.getElementById('address').value;
  var category = document.getElementById('category').value;
  var phoneNumber = document.getElementById('phoneNumber').value;
  var description = document.getElementById('description').value;

  var script_url = "https://script.google.com/macros/s/AKfycby50VF_4wKxrs23cRExjue5IKffXgPVu-acEW69Y6aE6-r7ksu_4hOUSAb4UFaWJoaNQQ/exec";
  
  var url = script_url+"?callback=ctrlq&businessName="+businessName+"&address="+address+"&category="+category+"&phoneNumber="+phoneNumber+"&description="+description+"&action=insert";
  
  var request = new XMLHttpRequest();
  request.open('GET', url);
  request.onreadystatechange = function() {
    if(request.readyState == 4 && request.status == 200) {
      window.location.href = "thanks.html";
    }
  }
  request.send();
}

function ctrlq(e) {
  console.log(e.result);
}
