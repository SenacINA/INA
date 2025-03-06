import toggleSenha from './toggleSenha.js'; 

document.addEventListener("DOMContentLoaded", function() {
  const eyeIconSenha = document.getElementById('eye-icon-senha');
  const eyeIconNovaSenha = document.getElementById('eye-icon-nova-senha');

  const eyeIconEmail = document.getElementById('eye-icon-email');

  if (eyeIconSenha) {
    eyeIconSenha.addEventListener('click', () => toggleSenha('senha', 'eye-img-senha'));
  }

  if (eyeIconNovaSenha) {
    eyeIconNovaSenha.addEventListener('click', () => toggleSenha('nova_senha', 'eye-img-nova-senha'));
  }

  if (eyeIconEmail) {
    eyeIconEmail.addEventListener('click', () => toggleSenha('senha-email', 'eye-img-email'));
  }
});
