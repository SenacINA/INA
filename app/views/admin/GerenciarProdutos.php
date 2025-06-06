<?php
require_once __DIR__ . '/../controllers/CarrosselController.php';

// Inicializa o controller
$controller = new CarrosselController();

// Obtém os anúncios para exibição na tabela
$anuncios = $controller->listarAnuncios();

// Processa a pesquisa se for submetida
$usuario = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pesquisar'])) {
    $id = $_POST['id_usuario'] ?? '';
    $email = $_POST['email_usuario'] ?? '';
    $usuario = $controller->buscarUsuario($id, $email);
}

// Processa a atualização se for submetida
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {
    try {
        $dados = [
            'id_cliente' => $_POST['id_cliente'],
            'id_carrossel' => $_POST['id_carrossel'],
            'nome' => $_POST['nome'],
            'cargo' => $_POST['cargo'],
            'data_expiracao' => $_POST['data_expiracao'],
            'plano' => $_POST['plano']
        ];
        
        $controller->atualizarAnuncio($dados);
        $mensagemSucesso = "Anúncio atualizado com sucesso!";
    } catch (Exception $e) {
        $mensagemErro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
  $titulo = "Gerenciar Produtos - E ao Quadrado";
  $css = ["/css/admin/GerenciarProdutos.css"];
  require_once('./utils/head.php');
?>
<body>
  <?php include_once("$PATH_COMPONENTS/php/navbar.php"); ?>
  
  <main class="gerenciar_carrossel_body_container">
    <!-- Mensagens de feedback -->
    <?php if (!empty($mensagemSucesso)): ?>
      <div class="mensagem-sucesso"><?= htmlspecialchars($mensagemSucesso) ?></div>
    <?php endif; ?>
    <?php if (!empty($mensagemErro)): ?>
      <div class="mensagem-erro"><?= htmlspecialchars($mensagemErro) ?></div>
    <?php endif; ?>

    <div class="gerenciar_pedidor_firula_holder">
      <div class="gerenciar_carrossel_header_holder">
        <div class="gerenciar_carrossel_header_title_1">
          <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/carrossel_icon.svg"/>
          <h1 class="gerenciar_carrossel_text_header">GERENCIAR CARROSSEL</h1>
        </div>
        <div class="gerenciar_carrossel_linha_sublinhado"></div>
      </div>
      
      <div class="gerenciar_carrossel_body_holder">
        <div class="gerenciar_carrossel_main_content">
          <div class="gerenciar_carrossel_quadrado_container">
            <!-- Formulário de Pesquisa -->
            <div class="gerenciar_carrossel_pesquisar_pedidos">
              <div class="gerenciar_carrossel_subtitulo_generico">
                <div class="gerenciar_carrossel_linha_vertical"></div>
                <div class="gerenciar_carrossel_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/lista_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Pesquisar</h2>
                </div>
              </div>
              
              <form method="post" class="gerenciar_carrossel_forms_pesquisa_pedidos">
                <div class="gerenciar_carrossel_form_cliente">
                  <h2>Digite o ID e o E-mail do usuário para encontrá-lo.</h2>
                  <label class="font_subtitulo font_celadon">ID do Usuário</label>
                  <input type="text" name="id_usuario" spellcheck="false" class="base_input" 
                         value="<?= htmlspecialchars($usuario['id_cliente'] ?? '') ?>">
                </div>
                <div class="gerenciar_carrossel_inputs_esquerda">
                  <div class="gerenciar_carrossel_input_status">
                    <label for="select_cod" class="font_subtitulo font_celadon">Email</label>
                    <input class="gerenciar_carrossel_select_status base_input" 
                           type="text" name="email_usuario"
                           value="<?= htmlspecialchars($usuario['email'] ?? '') ?>">
                  </div>
                </div>
                <button type="submit" name="pesquisar" class="base_button">Pesquisar</button>
              </form>
            </div>
            
            <!-- Informações do Usuário -->
            <div class="gerenciar_carrossel_estatisticas">
              <div class="gerenciar_carrossel_subtitulo_generico">
                <div class="gerenciar_carrossel_linha_vertical"></div>
                <div class="gerenciar_carrossel_subtitle_holder">
                  <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/perfil_icon.svg"/>
                  <h2 class="font_subtitulo font_celadon">Informações Do usuário</h2>
                </div>
              </div>
              
              <div class="gerenciar_carrossel_perfil">
                <img src="<?=$PATH_PUBLIC?>/image/admin/gerenciar_carrossel/perfil_img.svg">
              </div>
              
              <?php if ($usuario): ?>
              <form method="post" class="gerenciar_carrossel_forms_pesquisa_pedidos">
                <input type="hidden" name="id_cliente" value="<?= $usuario['id_cliente'] ?>">
                <input type="hidden" name="id_carrossel" value="<?= $usuario['id_carrossel'] ?>">
                
                <div class="gerenciar_carrossel_form_cliente">
                  <label class="font_subtitulo font_celadon">Nome</label>
                  <input type="text" name="nome" class="base_input"
                         value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>">
                </div>
                
                <div class="gerenciar_carrossel_input_status base_input_select">
                  <label for="select_cod" class="font_subtitulo font_celadon">Plano</label>
                  <select name="plano" class="gerenciar_carrossel_select_status base_input">
                    <option value="Semanal" <?= ($usuario['plano'] ?? '') === 'Semanal' ? 'selected' : '' ?>>Semanal</option>
                    <option value="Mensal" <?= ($usuario['plano'] ?? '') === 'Mensal' ? 'selected' : '' ?>>Mensal</option>
                    <option value="Bimestral" <?= ($usuario['plano'] ?? '') === 'Bimestral' ? 'selected' : '' ?>>Bimestral</option>
                  </select>
                </div>
                
                <div class="gerenciar_carrossel_flex">                  
                  <div class="gerenciar_carrossel_input_mes">
                    <label class="font_subtitulo font_celadon">Data de Expiração</label>
                    <input type="date" name="data_expiracao" class="gerenciar_carrossel_mes_select base_input"
                           value="<?= htmlspecialchars($usuario['data_expiracao'] ?? '') ?>">
                  </div>
                </div>
                
                <div class="gerenciar_carrossel_form_cliente">
                  <label class="font_subtitulo font_celadon">Cargo</label>
                  <input type="text" name="cargo" class="base_input"
                         value="<?= htmlspecialchars($usuario['cargo'] ?? '') ?>">
                </div>
                
                <button type="submit" name="atualizar" class="base_button">Atualizar</button>
              </form>
              <?php else: ?>
                <p class="font_texto">Nenhum usuário selecionado. Pesquise por ID ou e-mail.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Tabela de Anúncios -->
    <div class="gerenciar_carrossel_header_title_2">
      <img class="base_icon" src="<?=$PATH_PUBLIC?>/image/geral/icons/anuncio_icon.svg"/>
      <h1 class="gerenciar_carrossel_text_header font_titulo">Gerenciar Anúncios</h1>
    </div>
    
    <div class="gerenciar_carrossel_table">
      <form method="get" class="gerenciar_carrossel_table_filtro bg_carolina">
        <p class="gerenciar_carrossel_filtro_titulo font_subtitulo">Organizar por:</p>
        <select name="ordenar_por">
          <option value="ip" <?= ($_GET['ordenar_por'] ?? '') === 'ip' ? 'selected' : '' ?>>IP</option>
          <option value="nome" <?= ($_GET['ordenar_por'] ?? '') === 'nome' ? 'selected' : '' ?>>Nome</option>
          <option value="categoria" <?= ($_GET['ordenar_por'] ?? '') === 'categoria' ? 'selected' : '' ?>>Categoria</option>
          <option value="cargo" <?= ($_GET['ordenar_por'] ?? '') === 'cargo' ? 'selected' : '' ?>>Cargo</option>
          <option value="data_inicio" <?= ($_GET['ordenar_por'] ?? '') === 'data_inicio' ? 'selected' : '' ?>>Data de Início</option>
          <option value="data_expiracao" <?= ($_GET['ordenar_por'] ?? '') === 'data_expiracao' ? 'selected' : '' ?>>Data de Expiração</option>
          <option value="plano" <?= ($_GET['ordenar_por'] ?? '') === 'plano' ? 'selected' : '' ?>>Plano</option>
        </select>
        <select name="direcao">
          <option value="ASC" <?= ($_GET['direcao'] ?? 'ASC') === 'ASC' ? 'selected' : '' ?>>Crescente</option>
          <option value="DESC" <?= ($_GET['direcao'] ?? '') === 'DESC' ? 'selected' : '' ?>>Decrescente</option>
        </select>
        <button type="submit" class="base_button">Filtrar</button>
      </form>
      
      <div class="base_tabela">
        <table>
          <colgroup>
            <col class="gerenciar_carrossel_table_col-1">
            <col class="gerenciar_carrossel_table_col-2">
            <col class="gerenciar_carrossel_table_col-3">
            <col class="gerenciar_carrossel_table_col-4">
            <col class="gerenciar_carrossel_table_col-5">
            <col class="gerenciar_carrossel_table_col-6">
            <col class="gerenciar_carrossel_table_col-7">
          </colgroup>
          <thead>
            <tr>
              <th>IP</th>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Cargo</th>
              <th>Data de Início</th>
              <th>Data de Expiração</th>
              <th>Plano</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($anuncios)): ?>
              <?php foreach ($anuncios as $anuncio): ?>
                <tr>
                  <td><?= htmlspecialchars($anuncio['ip'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['nome'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['categoria'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['cargo'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['data_inicio'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['data_expiracao'] ?? 'N/A') ?></td>
                  <td><?= htmlspecialchars($anuncio['plano'] ?? 'N/A') ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center">Nenhum anúncio encontrado</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>