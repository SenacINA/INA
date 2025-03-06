function toggleSenha(senhaId, eyeImgId) {
  var senhaInput = document.getElementById(senhaId);
  var eyeImg = document.getElementById(eyeImgId);

  if (senhaInput && eyeImg) {
    if (senhaInput.type === "password") {
        senhaInput.type = "text"; 
        eyeImg.src = "../../image/geral/olho_aberto.svg"; 
    } else {
        senhaInput.type = "password"; 
        eyeImg.src = "../../image/geral/olho_fechado.svg"; 
    }
  }
}

export default toggleSenha;
