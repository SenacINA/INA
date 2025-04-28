function toggleSenha(senhaId, eyeImgId) {
  var senhaInput = document.getElementById(senhaId);
  var eyeImg = document.getElementById(eyeImgId);

  if (senhaInput && eyeImg) {
    if (senhaInput.type === "password") {
        senhaInput.type = "text"; 
        eyeImg.src = "./public/image/geral/icons/olho_aberto_icon.svg"; 
    } else {
        senhaInput.type = "password"; 
        eyeImg.src = "./public/image/geral/icons/olho_fechado_icon.svg"; 
    }
  }
}

export default toggleSenha;
