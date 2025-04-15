const btn = document.getElementById('continuar_button');
const close_btn = document.getElementById('close_btn');
const popup = document.getElementById('popup');

btn.addEventListener('click', function() {
  popup.style.display = 'flex';
});

close_btn.addEventListener('click', function () {
  popup.style.display = 'none';
})