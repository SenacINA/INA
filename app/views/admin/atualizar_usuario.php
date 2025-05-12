<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Atualizar Vendedores - E ao Quadrado";
  $css = ["/css/admin/atualizar_usuario.css"];
  require_once('./utils/head.php');
?>

<!-- FAZER A RESPONSIVIDADE -->

<body> 
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>

  <main>
    <div class="atualizar_usuario_body">
      
      <div class="atualizar_usuario_titulo">
        <div class="atualizar_usuario_text_titulo">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/atualizar_icon.svg" alt="">
          <h1>ATUALIZAR USUARIO</h1>
        </div>
        <hr class="atualizar_usuario_linha_titulo">
      </div>

      <div class="atualizar_usuario_grid_conteudo">
        <!-- Alternar Permissões -->
        <div class="atualizar_usuario_text" id="atualizar_usuario_text_1"> 
          <hr class="atualizar_usuario_vertical">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Alternar Permissões</h1>
        </div>

        <!-- Pesquisa -->
        <div class="atualizar_usuario_pesquisar_usuario">
          <h2>Digite o ID ou o E-mail do usuário para encontrá-lo, deixe em branco para cadastrar um usuário.</h2>

          <!-- FORM SEARCH -->
          <form id='formPesquisa' class="atualizar_usuario_forms">

            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_1">
              <label>ID Do Usuário</label>
              <input type="text" class="base_input" name="idUsuario">
            </div>
            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_2">
              <label>E-mail</label>
              <input type="text" class="base_input" name="emailUsuario">
            </div>

            <button type="submit" name="btnPesquisar" class="btn_blue base_botao">
              <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
              PESQUISAR
            </button>

          </form>
          <!-- FORM SEARCH -->

        </div>

        <!-- FORM UPDATE -->
        <form action="" method="post" class="corpo_form">
          <div class="atualizar_usuario_dados_pessoais_grid">
            <!-- Dados Pessoais -->
            <div class="atualizar_usuario_text" id="atualizar_usuario_text_2">
              <hr class="atualizar_usuario_vertical">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg" alt="">
              <h1 class="atualizar_usuario_text">Dados Pessoais</h1>
            </div>

            <div class="atualizar_usuario_dados_pessoais">
              <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_1">
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
                  <label>CPF</label>
                  <input type="text" class="base_input">
                </div>
                <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_6">
                  <label>Telefone 2</label>
                  <input type="text" class="base_input">
                </div>
              </div>
            </div>
          </div>

          <!-- Localização -->
          <div class="atualizar_usuario_localizacao_grid">
            <div class="atualizar_usuario_text" id="atualizar_usuario_text_3">
              <hr class="atualizar_usuario_vertical">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/localizacao_icon.svg" alt="">
              <h1 class="atualizar_usuario_text">Localização</h1>
            </div>
            <div class="atualizar_usuario_localizacao">
              <div class="atualizar_usuario_localizacao_conjunto">
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
            </div>    
          </div>

          <!-- Botão Mobile -->
          <div class="atualizar_usuario_text_titulo" id="atualizar_usuario_text_titulo_mobile">
            <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_caneta_icon.svg" alt="">
            <h1>ALTERAR DADOS</h1>
          </div>

          <!-- Permissões -->
          <div class="atualizar_usuario_alterar_permissoes_grid">
            <div class="atualizar_usuario_text" id="atualizar_usuario_text_4">
              <hr class="atualizar_usuario_vertical">
              <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/engrenagem_icon.svg" alt="">
              <h1 class="atualizar_usuario_text">Alterar Permissões</h1>
            </div>

            <div class="atualizar_usuario_forms_permissoes">
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

              <div class="atualizar_usuario_permissoes_conjunto">
                <button class="btn_blue base_botao">
                  <img src="<?=$PATH_PUBLIC?>/image/geral/botoes/v_branco_icon.svg" alt="">
                  CONFIRMAR
                </button>
              </div>
            </div>
          </div>
        </form>
        <!-- FORM UPDATE -->

      </div>
    </div>
  </main>
  <script type='module' src="<?=$PATH_COMPONENTS?>/js/toast.js"></script>
  <script src="<?=$PATH_PUBLIC?>/js/admin/atualizar_usuario.js"></script>
</body>
</html>
