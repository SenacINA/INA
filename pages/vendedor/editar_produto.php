<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../css/index.css">
      <link rel="stylesheet" href="../../css/style.css">
      <link rel="stylesheet" href="../../css/vendedor/editar_produto.css">
      <link rel="stylesheet" href="../../css/admin/admin_cupom.css">
      <link rel="icon" type="image/x-icon" href="../../image/geral/icone_eaoquadrado.ico">
      <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <title>E ao Quadrado</title>
   </head>
   <body>
      <div class='editar_produto_main'>
         <div class='editar_produto_container'>
            <div class='editar_produto_title'>
               <h2>
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                     <path
                        d="M30.8647 7.45769C31.5303 6.78602 31.5303 5.66658 30.8647 5.02936L26.8711 0.999355C26.2396 0.327689 25.1303 0.327689 24.4647 0.999355L21.3244 4.15102L27.7245 10.6094M0.639648 25.0416V31.4999H7.03965L25.9154 12.4349L19.5154 5.97658L0.639648 25.0416Z"
                        fill="#006494" />
                  </svg>
                  Editar Produto
               </h2>
            </div>
            <form action="#" class='editar_produto_form_grid'>
               <div class='editar_produto_form'>
                  <div class='editar_produto_form_title'>
                     <div class='editar_produto_line'></div>
                     <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <path
                              d="M10.3998 7.1998H5.5998V10.3998H10.3998V7.1998ZM0.799805 5.5998C0.799805 4.32677 1.30552 3.10587 2.20569 2.20569C3.10587 1.30552 4.32677 0.799805 5.5998 0.799805H15.1998V23.1998H5.5998C4.32677 23.1998 3.10587 22.6941 2.20569 21.7939C1.30552 20.8937 0.799805 19.6728 0.799805 18.3998V5.5998ZM3.9998 7.1998V10.3998C3.9998 10.8242 4.16838 11.2311 4.46843 11.5312C4.76849 11.8312 5.17546 11.9998 5.5998 11.9998H10.3998C10.8242 11.9998 11.2311 11.8312 11.5312 11.5312C11.8312 11.2311 11.9998 10.8242 11.9998 10.3998V7.1998C11.9998 6.77546 11.8312 6.36849 11.5312 6.06843C11.2311 5.76838 10.8242 5.5998 10.3998 5.5998H5.5998C5.17546 5.5998 4.76849 5.76838 4.46843 6.06843C4.16838 6.36849 3.9998 6.77546 3.9998 7.1998ZM4.7998 13.5998C4.58763 13.5998 4.38415 13.6841 4.23412 13.8341C4.08409 13.9841 3.9998 14.1876 3.9998 14.3998C3.9998 14.612 4.08409 14.8155 4.23412 14.9655C4.38415 15.1155 4.58763 15.1998 4.7998 15.1998H11.1998C11.412 15.1998 11.6155 15.1155 11.7655 14.9655C11.9155 14.8155 11.9998 14.612 11.9998 14.3998C11.9998 14.1876 11.9155 13.9841 11.7655 13.8341C11.6155 13.6841 11.412 13.5998 11.1998 13.5998H4.7998ZM3.9998 17.5998C3.9998 17.812 4.08409 18.0155 4.23412 18.1655C4.38415 18.3155 4.58763 18.3998 4.7998 18.3998H11.1998C11.412 18.3998 11.6155 18.3155 11.7655 18.1655C11.9155 18.0155 11.9998 17.812 11.9998 17.5998C11.9998 17.3876 11.9155 17.1841 11.7655 17.0341C11.6155 16.8841 11.412 16.7998 11.1998 16.7998H4.7998C4.58763 16.7998 4.38415 16.8841 4.23412 17.0341C4.08409 17.1841 3.9998 17.3876 3.9998 17.5998ZM16.7998 23.1998H18.3998C19.6728 23.1998 20.8937 22.6941 21.7939 21.7939C22.6941 20.8937 23.1998 19.6728 23.1998 18.3998V16.7998H16.7998V23.1998ZM23.1998 15.1998V8.7998H16.7998V15.1998H23.1998ZM23.1998 7.1998V5.5998C23.1998 4.32677 22.6941 3.10587 21.7939 2.20569C20.8937 1.30552 19.6728 0.799805 18.3998 0.799805H16.7998V7.1998H23.1998Z"
                              fill="#247BA0" />
                        </svg>
                        Informações do Produto
                     </h3>
                  </div>
                  <div class='editar_produto_form_input'>
                     <div class='editar_produto_input'>
                        <label for="nomeProduto">Nome do Produto</label>
                        <input class='base_input' type="text" id='nomeProduto' name='nomeProduto'>
                     </div>
                     <div class='editar_produto_small_input'>
                        <div class='editar_produto_input'>
                           <label for="valorProduto">Valor</label>
                           <input class='base_input' type="number" id='valorProduto' name='valorProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="categoriaProduto">Categoria</label>
                           <input class='base_input' type="text" id='categoriaProduto' name='categoriaProduto'>
                        </div>
                     </div>
                     <div class='editar_produto_input'>
                        <label for="marcaProduto">Marca</label>
                        <input class='base_input' type="text" id='marcaProduto' name='marcaProduto'>
                     </div>
                     <div class='editar_produto_small_input'>
                        <div class='editar_produto_input'>
                           <label for="codigoProduto">Código</label>
                           <input class='base_input' type="number" id='codigoProduto' name='codigoProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="estoqueProduto">Estoque</label>
                           <input class='base_input' type="number" id='estoqueProduto' name='estoqueProduto'>
                        </div>
                     </div>
                     <div class='editar_produto_small_input'>
                        <div class='editar_produto_input'>
                           <label for="origemProduto">Origem</label>
                           <input class='base_input' type="text" id='origemProduto' name='origemProduto'>
                        </div>
                     </div>
                  </div>
                  <div class='editar_produto_form'>
                     <div class='editar_produto_form_title'>
                        <div class='editar_produto_line'></div>
                        <h3>
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                              <path
                                 d="M31.4182 8.87278L23.1273 0.581871C22.5455 5.32717e-05 21.6728 5.32717e-05 21.091 0.581871L0.581871 21.091C5.32866e-05 21.6728 5.32866e-05 22.5455 0.581871 23.1273L8.87278 31.4182C9.4546 32.0001 10.3273 32.0001 10.9091 31.4182L13.9637 28.3637L8.87278 23.2728C8.29096 22.691 8.29096 21.8182 8.87278 21.2364C9.4546 20.6546 10.3273 20.6546 10.9091 21.2364L16.0001 26.3273L18.0364 24.291L14.9819 21.2364C14.4001 20.6546 14.4001 19.7819 14.9819 19.2001C15.5637 18.6182 16.4364 18.6182 17.0182 19.2001L20.0728 22.2546L22.1091 20.2182L17.0182 15.1273C16.4364 14.5455 16.4364 13.6728 17.0182 13.091C17.6001 12.5091 18.4728 12.5091 19.0546 13.091L24.1455 18.1819L26.1819 16.1455L23.1273 13.091C22.5455 12.5091 22.5455 11.6364 23.1273 11.0546C23.7091 10.4728 24.5819 10.4728 25.1637 11.0546L28.2182 14.1091L31.2728 11.0546C32.0001 10.3273 32.0001 9.30914 31.4182 8.87278Z"
                                 fill="#247BA0" />
                           </svg>
                           Dimensões E Peso
                        </h3>
                     </div>
                  </div>
                  <div class='editar_produto_form_input'>
                     <div class='editar_produto_small_input'>
                        <div class='editar_produto_input'>
                           <label for="pesoLiquidoProduto">Peso Líquido</label>
                           <input class='base_input' type="number" id='pesoLiquidoProduto' name='pesoProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="pesoBrutoProduto">Peso Bruto</label>
                           <input class='base_input' type="text" id='pesoBrutoProduto' name='pesoBrutoProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="tipoEmbalagem">Tipo De Embalagem</label>
                           <select class='base_input' id='tipoEmbalagem' name='tipoEmbalagem'>
                              <option value="caixa">Caixa</option>
                              <option value="saco">Saco</option>
                              <option value="embalagemPlastica">Embalagem Plástica</option>
                              <option value="outro">Outro</option>
                           </select>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="larguraProduto">Largura</label>
                           <input class='base_input' type="text" id='larguraProduto' name='larguraProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="alturaProduto">Altura</label>
                           <input class='base_input' type="text" id='alturaProduto' name='alturaProduto'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="comprimentoProduto">Comprimento</label>
                           <input class='base_input' type="text" id='comprimentoProduto' name='comprimentoProduto'>
                        </div>
                     </div>
                  </div>
               </div>
               <div class='editar_produto_form' id='coluna_meio'>
                  <div class='editar_produto_text_editor'>
                     <div class='editar_produto_form_title' id='desc-produto-title'>
                        <div class='editar_produto_line'></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="2 2 20 20">
                           <path fill="#247BA0" d="M14 17H7v-2h7m3-2H7v-2h10m0-2H7V7h10m2-4H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2"/>
                        </svg>
                        <h3>
                           Descrição Do Produto
                        </h3>
                     </div>
                     <div class='text_editor_div'>
                        <div class="toolbar">
                           <button data-command="bold" title="Negrito"><b>B</b></button>
                           <button data-command="underline" title="Sublinhado"><u>U</u></button>
                           <button data-command="italic" title="Itálico">
                              <svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none">
                                 <path d="M20.834 0V1.71429H17.5007L9.16732 22.2857H12.5007V24H0.833984V22.2857H4.16732L12.5007 1.71429H9.16732V0H20.834Z" fill="#F9F9FC"/>
                              </svg>
                           </button>
                           <button data-command="strike" title="Tachado"><s>S</s></button>
                           <div class="dropdown">
                              <button type="button">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24" fill="none">
                                    <path d="M3.21719 19.5522L4.12865 18.5028C4.31004 18.3005 4.40486 18.0351 4.39271 17.7637V17.5913C4.39271 17.2085 4.19271 17.0002 3.80208 17.0002H0.833333C0.722826 17.0002 0.616846 17.0441 0.538706 17.1222C0.460565 17.2003 0.416667 17.3063 0.416667 17.4168V18.2502C0.416667 18.3607 0.460565 18.4667 0.538706 18.5448C0.616846 18.6229 0.722826 18.6668 0.833333 18.6668H2.0224C1.82034 18.8704 1.62911 19.0844 1.44948 19.308L1.15729 19.6726C0.948958 19.9366 0.883854 20.2002 1.01146 20.4476L1.06615 20.5481C1.2224 20.8481 1.39375 20.9585 1.70417 20.9585H1.95052C2.48854 20.9585 2.78073 21.0856 2.78073 21.4319C2.78073 21.6778 2.56198 21.8601 2.03281 21.8601C1.75632 21.8579 1.48281 21.8027 1.22708 21.6976C0.889062 21.4955 0.615625 21.5153 0.414583 21.8601L0.123438 22.345C-0.0703125 22.6642 -0.0427083 22.9554 0.260417 23.1752C0.661979 23.4194 1.32187 23.6668 2.1875 23.6668C3.96667 23.6668 4.71354 22.4819 4.71354 21.3689C4.71198 20.62 4.23854 19.8189 3.21719 19.5522ZM25.8333 10.3335H9.16667C8.94565 10.3335 8.73369 10.4213 8.57741 10.5776C8.42113 10.7339 8.33333 10.9458 8.33333 11.1668V12.8335C8.33333 13.0545 8.42113 13.2665 8.57741 13.4228C8.73369 13.579 8.94565 13.6668 9.16667 13.6668H25.8333C26.0543 13.6668 26.2663 13.579 26.4226 13.4228C26.5789 13.2665 26.6667 13.0545 26.6667 12.8335V11.1668C26.6667 10.9458 26.5789 10.7339 26.4226 10.5776C26.2663 10.4213 26.0543 10.3335 25.8333 10.3335ZM25.8333 2.00016H9.16667C8.94565 2.00016 8.73369 2.08796 8.57741 2.24424C8.42113 2.40052 8.33333 2.61248 8.33333 2.8335V4.50016C8.33333 4.72118 8.42113 4.93314 8.57741 5.08942C8.73369 5.2457 8.94565 5.3335 9.16667 5.3335H25.8333C26.0543 5.3335 26.2663 5.2457 26.4226 5.08942C26.5789 4.93314 26.6667 4.72118 26.6667 4.50016V2.8335C26.6667 2.61248 26.5789 2.40052 26.4226 2.24424C26.2663 2.08796 26.0543 2.00016 25.8333 2.00016ZM25.8333 18.6668H9.16667C8.94565 18.6668 8.73369 18.7546 8.57741 18.9109C8.42113 19.0672 8.33333 19.2791 8.33333 19.5002V21.1668C8.33333 21.3878 8.42113 21.5998 8.57741 21.7561C8.73369 21.9124 8.94565 22.0002 9.16667 22.0002H25.8333C26.0543 22.0002 26.2663 21.9124 26.4226 21.7561C26.5789 21.5998 26.6667 21.3878 26.6667 21.1668V19.5002C26.6667 19.2791 26.5789 19.0672 26.4226 18.9109C26.2663 18.7546 26.0543 18.6668 25.8333 18.6668ZM0.833333 7.00016H4.16667C4.27717 7.00016 4.38315 6.95626 4.46129 6.87812C4.53943 6.79998 4.58333 6.694 4.58333 6.5835V5.75016C4.58333 5.63966 4.53943 5.53367 4.46129 5.45553C4.38315 5.37739 4.27717 5.3335 4.16667 5.3335H3.33333V0.750163C3.33333 0.639656 3.28943 0.533675 3.21129 0.455535C3.13315 0.377395 3.02717 0.333496 2.91667 0.333496H1.66667C1.58944 0.333634 1.51376 0.355234 1.4481 0.395885C1.38243 0.436536 1.32935 0.494638 1.29479 0.563704L0.878125 1.39704C0.846365 1.46051 0.831343 1.53104 0.834485 1.60194C0.837626 1.67284 0.858826 1.74177 0.896075 1.80218C0.933323 1.86259 0.985386 1.91249 1.04733 1.94713C1.10926 1.98178 1.17903 2.00004 1.25 2.00016H1.66667V5.3335H0.833333C0.722826 5.3335 0.616846 5.37739 0.538706 5.45553C0.460565 5.53367 0.416667 5.63966 0.416667 5.75016V6.5835C0.416667 6.694 0.460565 6.79998 0.538706 6.87812C0.616846 6.95626 0.722826 7.00016 0.833333 7.00016ZM0.629688 15.3335H4.16667C4.27717 15.3335 4.38315 15.2896 4.46129 15.2115C4.53943 15.1333 4.58333 15.0273 4.58333 14.9168V14.0835C4.58333 13.973 4.53943 13.867 4.46129 13.7889C4.38315 13.7107 4.27717 13.6668 4.16667 13.6668H2.15208C2.32344 13.1309 4.66979 12.6939 4.66979 10.7272C4.66979 9.2137 3.36771 8.66683 2.35365 8.66683C1.24115 8.66683 0.593229 9.18766 0.246354 9.64339C0.01875 9.93454 0.0901042 10.208 0.392188 10.4439L0.839063 10.8022C1.13125 11.0397 1.41198 10.9309 1.67865 10.6752C1.81018 10.5463 1.9872 10.4744 2.17135 10.4752C2.34479 10.4752 2.65469 10.5564 2.65469 10.9309C2.65625 11.5934 0 12.0684 0 14.5309V14.7392C0 15.1252 0.264583 15.3335 0.629688 15.3335Z" fill="#F9F9FC"/>
                                 </svg>
                                 <svg class='arrow_drop' xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                    <path d="M11.3996 9.53674e-07H0.599332C0.489984 0.000306129 0.3828 0.0271611 0.289317 0.0776744C0.195834 0.128188 0.119594 0.200446 0.0688 0.286673C0.0180054 0.3729 -0.00541687 0.469831 0.00105381 0.567029C0.00752354 0.664228 0.0436401 0.758015 0.105517 0.838296L5.50567 7.78401C5.72948 8.072 6.26829 8.072 6.4927 7.78401L11.8929 0.838296C11.9554 0.758183 11.992 0.664349 11.9988 0.566988C12.0057 0.469627 11.9824 0.372463 11.9315 0.286054C11.8807 0.199644 11.8042 0.127292 11.7105 0.0768609C11.6167 0.0264297 11.5092 -0.000152588 11.3996 9.53674e-07Z" fill="#F9F9FC"/>
                                 </svg>
                              </button>
                              <div class="dropdown-content" id='dropdown_list'>
                                 <button class='dropdown_button' data-command="bulletList" title="Lista não ordenada">• Lista</button>
                                 <button class='dropdown_button' data-command="orderedList" title="Lista ordenada">1. Lista</button>
                              </div>
                           </div>
                           <div class="dropdown">
                              <button class='dropdown_button' type="button">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 30 20" fill="none">
                                    <path d="M30 0V3.33333H0V0H30ZM0 20H15V16.6667H0V20ZM0 11.6667H30V8.33333H0V11.6667Z" fill="#F9F9FC"/>
                                 </svg>
                                 <svg class='arrow_drop' xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                    <path d="M11.3996 9.53674e-07H0.599332C0.489984 0.000306129 0.3828 0.0271611 0.289317 0.0776744C0.195834 0.128188 0.119594 0.200446 0.0688 0.286673C0.0180054 0.3729 -0.00541687 0.469831 0.00105381 0.567029C0.00752354 0.664228 0.0436401 0.758015 0.105517 0.838296L5.50567 7.78401C5.72948 8.072 6.26829 8.072 6.4927 7.78401L11.8929 0.838296C11.9554 0.758183 11.992 0.664349 11.9988 0.566988C12.0057 0.469627 11.9824 0.372463 11.9315 0.286054C11.8807 0.199644 11.8042 0.127292 11.7105 0.0768609C11.6167 0.0264297 11.5092 -0.000152588 11.3996 9.53674e-07Z" fill="#F9F9FC"/>
                                 </svg>
                              </button>
                              <div class="dropdown-content">
                                 <button class='dropdown_button' data-command="alignLeft" title="Esquerda">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                       <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h22M5 13h14M5 19h22M5 25h14"/>
                                    </svg>
                                 </button>
                                 <button class='dropdown_button' data-command="alignCenter" title="Centro" style='justify-content: center'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                                       <path fill="currentColor" d="M30.88 8H5.12a1.1 1.1 0 0 0 0 2.2h25.76a1.1 1.1 0 1 0 0-2.2" class="clr-i-outline clr-i-outline-path-1"/>
                                       <path fill="currentColor" d="M25.5 16.2a1.1 1.1 0 1 0 0-2.2h-15a1.1 1.1 0 1 0 0 2.2Z" class="clr-i-outline clr-i-outline-path-2"/>
                                       <path fill="currentColor" d="M30.25 20H5.75a1.1 1.1 0 0 0 0 2.2h24.5a1.1 1.1 0 0 0 0-2.2" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M24.88 26H11.12a1.1 1.1 0 1 0 0 2.2h13.76a1.1 1.1 0 1 0 0-2.2" class="clr-i-outline clr-i-outline-path-4"/><path fill="none" d="M0 0h36v36H0z"/>
                                    </svg>
                                 </button>
                                 <button class='dropdown_button' data-command="alignRight" title="Direita" style='transform: scaleX(-1);'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                       <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h22M5 13h14M5 19h22M5 25h14"/>
                                    </svg>
                                 </button>
                                 <button class='dropdown_button' data-command="alignJustify" title="Justificado" style='justify-content: center'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="feather feather-align-justify">
                                       <line x1="21" y1="10" x2="3" y2="10"></line>
                                       <line x1="21" y1="6" x2="3" y2="6"></line>
                                       <line x1="21" y1="14" x2="3" y2="14"></line>
                                       <line x1="21" y1="18" x2="3" y2="18"></line>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div class="editor-content"></div>
                     </div>
                  </div>
                  <div class='editar_produto_form' id='promocao_container'>
                     <div class='editar_produto_form_title' id='promocao_title'>
                        <div class='editar_produto_line'></div>
                        <h3>
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path
                                 d="M6.82824 6.82824C8.3901 5.26637 8.3901 2.73326 6.82824 1.1714C5.26637 -0.390466 2.73326 -0.390466 1.1714 1.1714C-0.390466 2.73326 -0.390466 5.26637 1.1714 6.82824C2.73389 8.39073 5.26637 8.39073 6.82824 6.82824ZM22.8281 17.1713C21.2663 15.6094 18.7332 15.6094 17.1713 17.1713C15.6094 18.7332 15.6094 21.2663 17.1713 22.8281C18.7332 24.39 21.2663 24.39 22.8281 22.8281C24.3906 21.2663 24.3906 18.7338 22.8281 17.1713ZM22.7069 2.70701L21.2931 1.29327C20.5119 0.512028 19.2457 0.512028 18.465 1.29327L1.29327 18.465C0.512028 19.2463 0.512028 20.5125 1.29327 21.2931L2.70701 22.7069C3.48826 23.4881 4.7545 23.4881 5.53512 22.7069L22.7069 5.53512C23.4881 4.7545 23.4881 3.48826 22.7069 2.70701Z"
                                 fill="#247BA0" />
                           </svg>
                           Promoção
                        </h3>
                     </div>
                     <label class="toggle">
                        <input type="checkbox" name="toggle-group" id="toggle-promotion">
                        <span class="slider"></span>
                        <h4>Ativar Promoção</h4>
                     </label>

                     <div class='editar_produto_promocao'>
                        <h4>Tipos de Promoção</h4>
                        <div class='radio_inputs'>
                           <label for="reaisSobreTotal">Reais sobre o Total</label>
                           <input name='tipoPromocaoProduto' id='reaisSobreTotal' type="radio">
                        </div>
                        <div class='radio_inputs'>
                           <label for="reaisSobreFrete">Reais sobre o Frete</label>
                           <input name='tipoPromocaoProduto' id='reaisSobreFrete' type="radio">
                        </div>
                        <div class='radio_inputs'>
                           <label for="porcenSobreProduto">Porcentagem sobre o Total</label>
                           <input name='tipoPromocaoProduto' id='porcenSobreProduto' type="radio">
                        </div>
                     </div>
                     <div class='editar_produto_small_input'>
                        <div class='editar_produto_input'>
                           <label for="produtoDescontPromo">Desconto da Promoção</label>
                           <div class="input_icon_container">
                              <input class='base_input' type="text" id='produtoDescontPromo' name='produtoDescontPromo'>
                              <div class='input_icon'>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path
                                       d="M6.82824 6.82824C8.3901 5.26637 8.3901 2.73326 6.82824 1.1714C5.26637 -0.390466 2.73326 -0.390466 1.1714 1.1714C-0.390466 2.73326 -0.390466 5.26637 1.1714 6.82824C2.73389 8.39073 5.26637 8.39073 6.82824 6.82824ZM22.8281 17.1713C21.2663 15.6094 18.7332 15.6094 17.1713 17.1713C15.6094 18.7332 15.6094 21.2663 17.1713 22.8281C18.7332 24.39 21.2663 24.39 22.8281 22.8281C24.3906 21.2663 24.3906 18.7338 22.8281 17.1713ZM22.7069 2.70701L21.2931 1.29327C20.5119 0.512028 19.2457 0.512028 18.465 1.29327L1.29327 18.465C0.512028 19.2463 0.512028 20.5125 1.29327 21.2931L2.70701 22.7069C3.48826 23.4881 4.7545 23.4881 5.53512 22.7069L22.7069 5.53512C23.4881 4.7545 23.4881 3.48826 22.7069 2.70701Z"
                                       fill="#247BA0" />
                                 </svg>
                              </div>
                           </div>  
                        </div>             
                     </div>
                     <div class='editar_produto_small_input' id='small_duas_colunas'>
                        <div class='editar_produto_input'>
                           <label for="promoDataInicio">Data de Início</label>
                           <input class='base_input' type="date" id='promoDataInicio' name='promoDataInicio'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="promoDataFim">Data de Término</label>
                           <input class='base_input' type="date" id='promoDataFim' name='promoDataFim'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="promoHoraInicio">Horário de Início</label>
                           <input class='base_input' type="time" id='promoHoraInicio' name='promoHoraInicio'>
                        </div>
                        <div class='editar_produto_input'>
                           <label for="promoHoraFim">Horário de Término</label>
                           <input class='base_input' type="time" id='promoHoraFim' name='promoHoraFim'>
                        </div>
                     </div> 
                  </div>
               </div>
               <div class='editar_produto_form' id='imagens_container'>
                  <div class='editar_produto_form'>
                     <div class='editar_produto_form_title' id='desc-produto-title'>
                        <div class='editar_produto_line'></div>
                        <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <path d="M0 3.81814C0 2.01302 1.34531 0.54541 3 0.54541H21C22.6547 0.54541 24 2.01302 24 3.81814V20.1818C24 21.9869 22.6547 23.4545 21 23.4545H3C1.34531 23.4545 0 21.9869 0 20.1818V3.81814ZM15.1781 9.26416C14.9672 8.92666 14.6203 8.72723 14.25 8.72723C13.8797 8.72723 13.5281 8.92666 13.3219 9.26416L9.24375 15.7892L8.00156 14.0965C7.78594 13.8051 7.4625 13.6363 7.125 13.6363C6.7875 13.6363 6.45938 13.8051 6.24844 14.0965L3.24844 18.1875C2.97656 18.5556 2.925 19.0619 3.1125 19.4863C3.3 19.9108 3.69375 20.1818 4.125 20.1818H19.875C20.2922 20.1818 20.6766 19.9312 20.8688 19.5272C21.0609 19.1233 21.0375 18.6375 20.8031 18.2642L15.1781 9.26416ZM5.25 8.72723C5.84674 8.72723 6.41903 8.46863 6.84099 8.00831C7.26295 7.54799 7.5 6.92367 7.5 6.27268C7.5 5.6217 7.26295 4.99737 6.84099 4.53706C6.41903 4.07674 5.84674 3.81814 5.25 3.81814C4.65326 3.81814 4.08097 4.07674 3.65901 4.53706C3.23705 4.99737 3 5.6217 3 6.27268C3 6.92367 3.23705 7.54799 3.65901 8.00831C4.08097 8.46863 4.65326 8.72723 5.25 8.72723Z" fill="#247BA0"/>
                        </svg>
                           Imagens e Vídeos
                        </h3>
                     </div>
                     <div class='editar_produto_form'>
                        <div class="editar_produto_imagens"></div>
                        <div class="contador">
                           <span id="contador-total">0</span>
                           <span id="contador-restante"> / 1</span>
                        </div>
                        <button class="base_botao btn_blue">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 15.7496C12.1993 15.7496 12.39 15.6706 12.5307 15.5299C12.6713 15.3893 12.7504 15.1985 12.7504 14.9996V4.02658L14.4304 5.98758C14.5598 6.13875 14.744 6.23232 14.9424 6.2477C15.1408 6.26308 15.3372 6.19901 15.4884 6.06958C15.6395 5.94016 15.7331 5.75598 15.7485 5.55756C15.7639 5.35915 15.6998 5.16275 15.5704 5.01158L12.5704 1.51158C12.5 1.42925 12.4125 1.36314 12.3141 1.31782C12.2157 1.27249 12.1087 1.24902 12.0004 1.24902C11.892 1.24902 11.785 1.27249 11.6866 1.31782C11.5882 1.36314 11.5008 1.42925 11.4304 1.51158L8.43036 5.01158C8.36628 5.08643 8.31756 5.17318 8.287 5.26686C8.25644 5.36054 8.24463 5.45932 8.25224 5.55756C8.25986 5.65581 8.28675 5.75159 8.33138 5.83944C8.37601 5.9273 8.43751 6.0055 8.51236 6.06958C8.58722 6.13367 8.67396 6.18238 8.76764 6.21294C8.86132 6.2435 8.9601 6.25531 9.05835 6.2477C9.15659 6.24009 9.25237 6.2132 9.34022 6.16856C9.42808 6.12393 9.50628 6.06243 9.57036 5.98758L11.2504 4.02758V14.9996C11.2504 15.4136 11.5864 15.7496 12.0004 15.7496Z" fill="#F9F9FC"/>
                              <path d="M16 9C15.298 9 14.947 9 14.694 9.169C14.5852 9.24179 14.4918 9.33522 14.419 9.444C14.25 9.697 14.25 10.048 14.25 10.75V15C14.25 15.5967 14.0129 16.169 13.591 16.591C13.169 17.0129 12.5967 17.25 12 17.25C11.4033 17.25 10.831 17.0129 10.409 16.591C9.98705 16.169 9.75 15.5967 9.75 15V10.75C9.75 10.048 9.75 9.697 9.581 9.444C9.50821 9.33522 9.41478 9.24179 9.306 9.169C9.053 9 8.702 9 8 9C5.172 9 3.757 9 2.879 9.879C2 10.757 2 12.17 2 14.999V15.999C2 18.829 2 20.242 2.879 21.121C3.757 22 5.172 22 8 22H16C18.828 22 20.243 22 21.121 21.121C21.999 20.242 22 18.828 22 16V15C22 12.171 22 10.757 21.121 9.879C20.243 9 18.828 9 16 9Z" fill="#F9F9FC"/>
                           </svg>
                           ENVIAR ARQUIVO
                           <input type="file" id="input-file" accept="image/*" multiple>
                        </button>
                        <h4 id='info-image'>
                           O tamanho do arquivo não pode ultrapassar 2mb,
                        </h4>
                        <div class="input-url-container">
                           <span class="dropdown" id='input_url'>
                              adicionar link URL
                              <div class="dropdown-content">
                                    <input class='base_input' type="text" id="input-url" placeholder="Insira a URL da imagem">
                                    <button onclick="adicionarImagemPorURL()">Adicionar</button>
                              </div>
                           </span>
                        </div>
                     </div>
                  </div>    
                  <div class='editar_produto_form_buttons'>
                     <button class="base_botao btn_red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                           <path d="M9 0C4.023 0 0 4.023 0 9C0 13.977 4.023 18 9 18C13.977 18 18 13.977 18 9C18 4.023 13.977 0 9 0ZM12.87 12.87C12.7867 12.9534 12.6878 13.0196 12.579 13.0648C12.4701 13.11 12.3534 13.1332 12.2355 13.1332C12.1176 13.1332 12.0009 13.11 11.892 13.0648C11.7832 13.0196 11.6843 12.9534 11.601 12.87L9 10.269L6.399 12.87C6.23072 13.0383 6.00248 13.1328 5.7645 13.1328C5.52652 13.1328 5.29828 13.0383 5.13 12.87C4.96172 12.7017 4.86718 12.4735 4.86718 12.2355C4.86718 12.1177 4.89039 12.001 4.93549 11.8921C4.98058 11.7832 5.04668 11.6843 5.13 11.601L7.731 9L5.13 6.399C4.96172 6.23072 4.86718 6.00248 4.86718 5.7645C4.86718 5.52652 4.96172 5.29828 5.13 5.13C5.29828 4.96172 5.52652 4.86718 5.7645 4.86718C6.00248 4.86718 6.23072 4.96172 6.399 5.13L9 7.731L11.601 5.13C11.6843 5.04668 11.7832 4.98058 11.8921 4.93549C12.001 4.89039 12.1177 4.86718 12.2355 4.86718C12.3533 4.86718 12.47 4.89039 12.5789 4.93549C12.6878 4.98058 12.7867 5.04668 12.87 5.13C12.9533 5.21332 13.0194 5.31224 13.0645 5.42111C13.1096 5.52998 13.1328 5.64666 13.1328 5.7645C13.1328 5.88234 13.1096 5.99902 13.0645 6.10789C13.0194 6.21676 12.9533 6.31568 12.87 6.399L10.269 9L12.87 11.601C13.212 11.943 13.212 12.519 12.87 12.87Z" fill="white"/>
                        </svg>
                        INATIVAR PRODUTO
                     </button>
                     <button class="base_botao btn_outline_red" type='reset'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                           <path d="M9.5 0C4.523 0 0.5 4.023 0.5 9C0.5 13.977 4.523 18 9.5 18C14.477 18 18.5 13.977 18.5 9C18.5 4.023 14.477 0 9.5 0ZM13.37 12.87C13.2867 12.9534 13.1878 13.0196 13.079 13.0648C12.9701 13.11 12.8534 13.1332 12.7355 13.1332C12.6176 13.1332 12.5009 13.11 12.392 13.0648C12.2832 13.0196 12.1843 12.9534 12.101 12.87L9.5 10.269L6.899 12.87C6.73072 13.0383 6.50248 13.1328 6.2645 13.1328C6.02652 13.1328 5.79828 13.0383 5.63 12.87C5.46172 12.7017 5.36718 12.4735 5.36718 12.2355C5.36718 12.1177 5.39039 12.001 5.43549 11.8921C5.48058 11.7832 5.54668 11.6843 5.63 11.601L8.231 9L5.63 6.399C5.46172 6.23072 5.36718 6.00248 5.36718 5.7645C5.36718 5.52652 5.46172 5.29828 5.63 5.13C5.79828 4.96172 6.02652 4.86718 6.2645 4.86718C6.50248 4.86718 6.73072 4.96172 6.899 5.13L9.5 7.731L12.101 5.13C12.1843 5.04668 12.2832 4.98058 12.3921 4.93549C12.501 4.89039 12.6177 4.86718 12.7355 4.86718C12.8533 4.86718 12.97 4.89039 13.0789 4.93549C13.1878 4.98058 13.2867 5.04668 13.37 5.13C13.4533 5.21332 13.5194 5.31224 13.5645 5.42111C13.6096 5.52998 13.6328 5.64666 13.6328 5.7645C13.6328 5.88234 13.6096 5.99902 13.5645 6.10789C13.5194 6.21676 13.4533 6.31568 13.37 6.399L10.769 9L13.37 11.601C13.712 11.943 13.712 12.519 13.37 12.87Z" fill="#D73232"/>
                        </svg>
                        CANCELAR
                     </button>
                     <button type='submit 'class="base_botao btn_blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3333 9.16667C18.3333 14.2294 14.2294 18.3333 9.16667 18.3333C4.10392 18.3333 0 14.2294 0 9.16667C0 4.10392 4.10392 0 9.16667 0C14.2294 0 18.3333 4.10392 18.3333 9.16667ZM13.5795 6.94925C13.6494 6.85126 13.6994 6.74046 13.7265 6.62316C13.7536 6.50587 13.7574 6.38438 13.7375 6.26564C13.7177 6.1469 13.6747 6.03322 13.6109 5.93111C13.5472 5.82899 13.4639 5.74044 13.3659 5.6705C13.2679 5.60056 13.1571 5.55061 13.0398 5.52349C12.9225 5.49637 12.8011 5.49262 12.6823 5.51245C12.5636 5.53229 12.4499 5.57531 12.3478 5.63908C12.2457 5.70284 12.1571 5.7861 12.0872 5.88408L8.13267 11.4207L6.14808 9.43525C5.9752 9.26827 5.74365 9.17588 5.5033 9.17797C5.26295 9.18005 5.03304 9.27646 4.86308 9.44642C4.69313 9.61637 4.59672 9.84629 4.59463 10.0866C4.59254 10.327 4.68494 10.5585 4.85192 10.7314L7.60192 13.4814C7.69606 13.5754 7.80953 13.6478 7.93445 13.6935C8.05937 13.7393 8.19275 13.7573 8.32533 13.7463C8.4579 13.7353 8.5865 13.6956 8.70218 13.6299C8.81787 13.5642 8.91787 13.4741 8.99525 13.3659L13.5795 6.94925Z" fill="white"/>
                        </svg>
                        SALVAR
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </body>
   <script src="../../js/vendedor/img_input.js"></script>
   <script type="module" src="../../js/vendedor/text_editor.js"></script>
   <script src="../../js/vendedor/promocao_toggle.js"></script>

</html>