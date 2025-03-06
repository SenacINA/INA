<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widp=device-widp, initial-scale=1.0">
    <title>E ao Quadrado</title>
    <link rel="stylesheet" href="../../css/admin/historico_acesso.css">
    <link rel="shortcut icon" href="../../image/geral/icone_eaoquadrado.ico">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Falta Nav-bar -->
    <nav class="atualizar_usuario_nav_bar"></nav> 

        <main class="historico_adm_main_container">
            <div class="historico_adm_relatorio_usuario">
                <div class="historico_adm_relatorio_geral">
                    <img src="../../image/admin/histórico_acesso/icone_tempo.svg">
                    <h2>HISTÓRICO DE ACESSO</h2> 
                    <hr class="historico_acesso_linha_header">
                    <div class="historico_adm_pesquisa_cliente_container">
                    
                        <div class="historico_adm_label">
                    <h2>Pesquisar Usuário</h2>
                            <div id="historicoAdmContainerIp">
                            <label for="ip">IP</label>
                            <input type="text" id="ip">
                            </div>
                        <div id="historicoAdmContainerHorarioDiaAno">
                            <div>
                            <label for="horario">Horário</label>
                                <select id="horario">
                                    <option value="">Horário</option>
                                </select>
                            </div>

                            <div>
                            <label for="dia">Dia</label>
                                <select id="dia">
                                    <option value="">Dia</option>
                                </select>
                            </div>

                            <div>
                            <label for="ano">Ano</label>
                                <select id="ano">
                                    <option value="">Ano</option>
                                </select>
                            </div>
                        </div>
                    </div>
               
                
                <div class="historico_adm_info_usuario">

                    <div class="historico_adm_info_usuario">
                        <h2>Informações do Usuário</h2>
                            <div class="historico_adm_grid">        
                                <div class="historico_adm_item">
                                    <h3>IP</h3>
                                    <p>231.122.0.2</p>
                                </div>

                                <div class="historico_adm_item">
                                    <h3>Data De Acessos</h3>
                                    <p>22/03/2024</p>
                                </div>

                                <div class="historico_adm_item">
                                    <h3>Cargo</h3>
                                    <p>Admin</p>
                                </div>

                                <div class="historico_adm_item">
                                    <h3>Horário</h3>
                                    <p>00:00</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                        <div class="historico_adm_buttons">
                            <button class="historico_adm_cancel">Cancelar</button>
                            <button class="historico_adm_confirm">Confirmar</button> 
                        </div>
                </div>
             
                
            </div>


            </div>
        </div>
        </main>
    </body>
</html>

<body>
  <main>
    <!-- Falta Nav-bar -->
    <nav class="atualizar_usuario_nav_bar"></nav>  

    <div class="atualizar_usuario_body">
      <div class="atualizar_usuario_header">
        <div class="atualizar_usuario_text_header">
          <img src="../../image/admin/atualizar_usuario/header_icon.svg" alt="">
          <h1>ATUALIZAR USUARIO</h1>
        </div>
        <hr class="atualizar_usuario_linha_header">
      </div>

      <div class="bg_mobile_1"></div>
      <div class="bg_mobile_2"></div>
     
      <div class="atualizar_usuario_grid_conteudo">
       
        <div class="atualizar_usuario_text" id="atualizar_usuario_text_1"> 
          <hr class="atualizar_usuario_vertical">
          <img src="../../image/admin/atualizar_usuario/texto_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Alternar Permissões</h1>
        </div>

        <div class="atualizar_usuario_pesquisar_usuario">
          <h2>Digite o ID e o E-mail do usuário para encontra-lo
          Deixe em branco para cadastrar um usuário.</h2>
          <form action="" method="post" class="atualizar_usuario_forms">
            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_1" >
              <label>ID Do Usuário</label>
              <input type="text" placeholder="00001">
            </div>
            <div class="atualizar_usuario_pesquisar_usuario_item" id="atualizar_usuario_pesquisar_usuario_item_2">
              <label>E-mail</label>
              <input type="text" placeholder="admin@gmail.com">
            </div>
          </form>
        </div>
        
        
        <div class="atualizar_usuario_text" id="atualizar_usuario_text_2">
        
          <hr class="atualizar_usuario_vertical">
          <img src="../../image/admin/atualizar_usuario/perfil_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Dados Pessoais</h1>
        </div>
        
        <form action="" method="post" class="atualizar_usuario_dados_pessoais">
  
          <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_1" >
            <label>Nome</label>
            <input type="text" placeholder="THUNDER GAMES">
          </div>

          <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_2">
            <label>Senha</label>
            <input type="text" placeholder="R. Eng. Sampaio Coelho">
          </div>
          
          <div class="atualizar_usuario_dados_pessoais_conjunto">
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_3">
              <label>E-mail</label>
              <input type="text" placeholder="thundergames@gmail.com">
            </div>
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_4">
              <label>Telefone</label>
              <input type="text" placeholder="+55 (19) 99486-4017">
            </div>
          </div>

          <div class="atualizar_usuario_dados_pessoais_conjunto">
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_5">
              <label>CPf</label>
              <input type="text" placeholder="000-000-000-00">
            </div>
            <div class="atualizar_usuario_dados_pessoais_item" id="atualizar_usuario_dados_pessoais_item_6">
              <label>Telefone 2</label>
              <input type="text" placeholder="+55 (19) 99486-4017">
            </div>
          </div>
        </form>

        <div class="atualizar_usuario_text" id="atualizar_usuario_text_3">
          <hr class="atualizar_usuario_vertical">
          <img src="../../image/admin/atualizar_usuario/localizacao_icon.svg" alt="">
          <h1 class="atualizar_usuario_text">Localização</h1>
        </div>

        <form action="" method="post" class="atualizar_usuario_localizacao">
          <div class="atualizar_usuario_localizacao_conjunto">
            <!-- row 1 -->
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_1">
              <label>CEP</label>
              <input type="text" placeholder="04261-080">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_2">
              <label>Estado</label>
              <input type="text" placeholder="São Paulo">
            </div>
          </div>
          
          <div class="atualizar_usuario_localizacao_conjunto">
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_3">
              <label>Cidade</label>
              <input type="text" placeholder="São Paulo">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_4">
              <label>Bairro</label>
              <input type="text" placeholder="Vila Monumento">
            </div>
          </div>

          <div class="atualizar_usuario_localizacao_conjunto">
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_5">
              <label>Endereço</label>
              <input type="text" placeholder="R. Eng. Sampaio Coelho">
            </div>
            <div class="atualizar_usuario_localizacao_item" id="atualizar_usuario_localizacao_item_6">
              <label>Número</label>
              <input type="text" placeholder="122">
            </div>
          </div>
        </form>

        <div class="atualizar_usuario_text" id="atualizar_usuario_text_4">
          <hr class="atualizar_usuario_vertical">
          <img src="../../image/admin/atualizar_usuario/engrenagem_icon.svg" alt="">
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

        <div class="atualizar_usuario_text_header" id="atualizar_usuario_text_header_mobile">
          <img src="../../image/admin/atualizar_usuario/perfil_icon.svg" alt="">
          <h1>ALTERAR DADOS</h1>
        </div>  

        <div class="atualizar_usuario_botao_salvar">
          <button class="atualizar_usuario_salvar">
            <img src="../../image/admin/atualizar_usuario/v_icon.svg" alt="">
            <label>COMFIRMAR</label>
          </button>
        </div>
      </div>
    
    </div>

  </main>
</body>
</html>




<div class="historico_adm_buttons">
    <select name="filtro" id="filtro" class="historico_adm_filtro">
      <option value="">Organizar por:</option>
      <option value="nome">Nome</option>
      <option value="categoria">Data de Cadastro</option>
      <option value="cargo">Cargo</option>
      <option value="plano">E-mail</option>
      <option value="data_inicio">Contato</option>
      <option value="email">Status</option>
    </select>
  </div>
  <div class="historico_adm_table">
    <p><input type="checkbox"></p>
    <p>IP</p>
    <p>CARGO</p>
    <p>DATA DE ACESSOS</p>
    <p>HORÁRIO</p>
    <p>NAVEGADOR</p>
    <p><img src="../../image/admin/histórico_acesso/lata-de-lixo 4.svg" alt="lata_lixo"></p>

    <span><input type="checkbox"></span>
    <span >192.168.0.1</span>
    <span>Cliente</span>
    <span>22/03/2024</span>
    <span>08:32:34</span>
    <span>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36</span>
    <span><img src="../../image/admin/histórico_acesso/lata-de-lixo 6.svg" alt="excluir lixeira">Excluir</span>

    <span><input type="checkbox"></span>
    <span >221.121.2.2</span>
    <span>Cliente</span>
    <span>23/03/2024</span>
    <span>09:27:12</span>
    <span>Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36</span>
    <span><img src="../../image/admin/histórico_acesso/lata-de-lixo 6.svg" alt="excluir lixeira">Excluir</span>

    <span><input type="checkbox"></span>
    <span >112.212.02.14</span>
    <span>Vendedor</span>
    <span>24/03/2024</span>
    <span>11:32:45</span>
    <span>Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36</span>
    <span><img src="../../image/admin/histórico_acesso/lata-de-lixo 6.svg" alt="excluir lixeira">Excluir</span>

</div>