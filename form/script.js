document.getElementById('submitButton').addEventListener('click', function(event) {
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const details = document.getElementById('details').value.trim();

  if (name === '' || email === '' || details === '') 
