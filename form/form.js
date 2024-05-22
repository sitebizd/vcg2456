document.getElementById('businessForm').addEventListener('submit', function(e) {
  e.preventDefault();

  var bname = document.getElementById('bname').value;
  var address = document.getElementById('address').value;
  var category = document.getElementById('category').value;
  var phone = document.getElementById('phone').value;
  var description = document.getElementById('description').value;

  google.script.run.submitForm(bname, address, category, phone, description);

  window.location.href = 'https://vedchitra.com/';
});
