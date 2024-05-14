const textInput = document.getElementById('text-input');
const generateBtn = document.getElementById('generate-btn');
const qrCodeContainer = document.getElementById('qr-code-container');
const downloadBtn = document.getElementById('download-btn');

generateBtn.addEventListener('click', () => {
  const text = textInput.value;
  if (!text) {
    alert('Please enter text for QR code');
    return;
  }
  
  const qrCodeUrl = `https://chart.googleapis.com/chart?cht=qr&chs=512x512&chl=${encodeURIComponent(text)}`;
  const qrCodeImage = document.createElement('img');
  qrCodeImage.src = qrCodeUrl;
  qrCodeImage.alt = 'Generated QR Code';
  qrCodeContainer.innerHTML = ''; // Clear previous image
  qrCodeContainer.appendChild(qrCodeImage);

  downloadBtn.disabled = false;
  downloadBtn.addEventListener('click', () => {
    const link = document.createElement('a');
    link.href = qrCodeUrl;
    link.download = 'qr-code.png';
    link.click();
  });
});
