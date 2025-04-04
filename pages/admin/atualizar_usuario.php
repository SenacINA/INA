<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E ao Quadrado</title>
  <link rel="stylesheet" href="../../css/admin/atualizar_usuario.css">
  <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/geral/base.js"></script>
</head>
<body> 
  <!-- Até 375px -->
  <!-- Caminho de Icon Correto -->
  
  <?php
    include_once('../../pages/geral/navbar.php');
  ?>
  <main>
    <div class="atualizar_usuario_body">
      <div class="atualizar_usuario_titulo">
        <div class="atualizar_usuario_text_titulo">
          <img class="base_icon" src="../../image/geral/icons/atualizar_icon.svg" alt="">
          <h1>ATUALIZAR USUARIO</h1>
        </div>
        <hr class="atualizar_usuario_linha_titulo">
      </div>

      <div class="bg_mobile_1"></div>
      <div class="bg_mobile_2"></div>
     
      <div class="atualizar_usuario_grid_conteudo">
        <div class="atualizar_usuario_text" id="atualizar_usuario_text_1"> 
          <hr class="atualizar_usuario_vertical">
          <img class="base_icon" src="../../image/geral/icons/lista_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Alternar Permissões</h1>
        </div>

        <div class="atualizar_usuario_pesquisar_usuario">
          <h2>Digite o ID e o E-mail do usuário para encontra-lo,
          Deixe em branco para cadastrar um usuário.</h2>
          <form action="" method="post" class="atualizar_usuario_forms">
            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_1">
              <label>ID Do Usuário</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_2">
              <label>E-mail</label>
              <input type="text" class="base_input">
            </div>
          </form>
        </div>
        
        <div class="atualizar_usuario_text" id="atualizar_usuario_text_2">
          <hr class="atualizar_usuario_vertical">
          <img class="base_icon" src="../../image/geral/icons/perfil_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Dados Pessoais</h1>
        </div>
        
        <form action="" method="post" class="atualizar_usuario_dados_pessoais">
          <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_1" >
            <label>Nome</label>
            <input type="text" class="base_input">
          </div>

          <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_2">
            <label>Senha</label>
            <input type="text" class="base_input">
          </div>
          
          <div class="atualizar_usuario_dados_pessoais_conjunto">
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_3">
              <label>E-mail</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_4">
              <label>Telefone</label>
              <input type="text" class="base_input">
            </div>
          </div>

          <div class="atualizar_usuario_dados_pessoais_conjunto">
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_5">
              <label>CPf</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_6">
              <label>Telefone 2</label>
              <input type="text" class="base_input">
            </div>
          </div>
        </form>

        <div class="atualizar_usuario_text" id="atualizar_usuario_text_3">
          <hr class="atualizar_usuario_vertical">
          <img class="base_icon" src="../../image/geral/icons/localizacao_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Localização</h1>
        </div>

        <form action="" method="post" class="atualizar_usuario_localizacao">
          <div class="atualizar_usuario_localizacao_conjunto">
            <!-- row 1 -->
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_1">
              <label>CEP</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_2">
              <label>Estado</label>
              <input type="text" class="base_input">
            </div>
          </div>
          
          <div class="atualizar_usuario_localizacao_conjunto">
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_3">
              <label>Cidade</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_4">
              <label>Bairro</label>
              <input type="text" class="base_input">
            </div>
          </div>

          <div class="atualizar_usuario_localizacao_conjunto">
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_5">
              <label>Endereço</label>
              <input type="text" class="base_input">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_6">
              <label>Número</label>
              <input type="text" class="base_input">
            </div>
          </div>
        </form>

        <div class="atualizar_usuario_text_titulo" id="atualizar_usuario_text_titulo_mobile">
          <img class="base_icon" src="../../image/geral/icons/lista_caneta_icon.svg" alt="">
          <h1>ALTERAR DADOS</h1>
        </div> 

        <div class="atualizar_usuario_text" id="atualizar_usuario_text_4">
          <hr class="atualizar_usuario_vertical">
          <img class="base_icon" src="../../image/geral/icons/engrenagem_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Alterar Permissões</h1>
        </div>

        <form action="" method="post" class="atualizar_usuario_forms_permissoes">
            <div class="atualizar_usuario_permissoes_conjunto">
              <div class="atualizar_usuario_forms_item_permissoes">
                <div class="toggle_container">
                  <label class="toggle">
                    <input type="checkbox" id="atualizar_usuario_gerenciar_carrossel">
                    <span class="toggle_slider"></span>
                  </label>
                </div>
                <div class="label_container">
                  <label for="atualizar_usuario_gerenciar_carrossel">Desativar Usuário</label>
                </div>
              </div>

              <div class="atualizar_usuario_forms_item_permissoes">
                <div class="toggle_container">
                  <label class="toggle">
                    <input type="checkbox" id="atualizar_usuario_gerenciar_usuarios">
                    <span class="toggle_slider"></span>
                  </label>
                </div>
                <div class="label_container">
                  <label for="atualizar_usuario_gerenciar_usuarios">Cliente</label>
                </div>
              </div>
            </div>
            
            <div class="atualizar_usuario_permissoes_conjunto">
              <div class="atualizar_usuario_forms_item_permissoes">
                <div class="toggle_container">
                  <label class="toggle">
                    <input type="checkbox" id="atualizar_usuario_gerenciar_produtos">
                    <span class="toggle_slider"></span>
                  </label>
                </div>
                <div class="label_container">
                  <label for="atualizar_usuario_gerenciar_produtos">Vendedor</label>
                </div>
              </div>

              <div class="atualizar_usuario_forms_item_permissoes">
                <div class="toggle_container">
                  <label class="toggle">
                    <input type="checkbox" id="atualizar_usuario_historico_acessos">
                    <span class="toggle_slider"></span>
                  </label>
                </div>
                <div class="label_container">
                  <label for="atualizar_usuario_historico_acessos">Administrador</label>
                </div>
              </div>  
            </div>
          </div>
        </form>
        <div class="atualizar_usuario_botao_salvar">
          <button class="atualizar_usuario_salvar base_botao">
            <img src="../../image/geral/botoes/v_branco_icon.svg" alt="">
            <label>CONFIRMAR</label>
          </button>
        </div>
      </div>
    </div> 
    </div>
  </main>

</body>
</html>
