# Projeto I.N.A – E-commerce EaoQuadrado


O Projeto Integrador 2025 – Sala 139 (Matutino) do Senac Hub Academy, Grupo **I.N.A.** (Inteligência Não Artificial), consiste em um e‑commerce chamado **EaoQuadrado**, totalmente desenvolvido “na unha” em **PHP**, **JavaScript**, **HTML** e **CSS**.

---

## 1. Principais Papéis e Funcionalidades

| Papel            | Ações principais                                                                                           |
| ---------------- | ---------------------------------------------------------------------------------------------------------- |
| **Cliente**      | - Criar conta e fazer login<br>- Editar perfil (foto e banner)<br>- Navegar e comprar produtos<br>- Avaliar produtos (texto + imagens) |
| **Vendedor**     | - Todas as ações de Cliente<br>- Tornar‑se vendedor (após aprovação do Admin)<br>- Cadastrar/editar/remover produtos (upload múltiplo de imagens)<br>- Destacar produtos no perfil |
| **Administrador**| - Gerenciar usuários (ativar/desativar contas)<br>- Aprovar solicitações de vendedores<br>- Configurar carrossel e destaques na home<br>- Editar informações globais do sistema |

---

## 2. Tecnologias Utilizadas

- **Back‑end:** PHP 8.x, MVC personalizado  
- **Front‑end:** HTML5, CSS3, JavaScript (Vanilla)  
- **Banco de Dados:** MySQL (migrations e seeds em `db/`)  
- **Servidor Web:** Apache/Nginx (mod_rewrite para `public/`)  
- **Dependências:** *(se aplicável, ex.: Composer packages)*  

---

## 3. Visão Geral da Arquitetura

1. **Front Controller**  
   - `public/index.php`  
2. **Core**  
   - Bootstrapping & autoload + `Router` → direciona requisição  
3. **Controller**  
   - `app/controllers/...` → lógica de rota e coordenação de Models/Views  
4. **Model**  
   - `app/models/...` → abstração de acesso a dados  
5. **View**  
   - `app/views/...` → templates PHP/HTML → gera resposta HTML  
6. **Assets estáticos**  
   - `public/css/`, `public/js/`, `public/images/`  

---

## 4. Estrutura de Pastas (resumo)

```text
/  
├─ app/  
│  ├─ components/  
│  ├─ controllers/  
│  ├─ models/  
│  └─ views/  
├─ config/  
│  ├─ routes.php  
│  └─ config.env.ex  
├─ core/  
│  └─ Core.php  
├─ db/  
│  ├─ banco_schema.sql  
│  └─ insert_base.sql  
├─ docs/  
├─ public/  
│  ├─ css/  
│  ├─ image/  
│  ├─ js/  
│  └─ upload/  
├─ utils/  
├─ index.php  
├─ .htaccess  
├─ .gitignore  
└─ upload.zip

```

---

## 5. 🛠️ Configuração do Projeto (XAMPP)

### 5.1. Pré‑requisitos

- XAMPP instalado (Apache 2.x, PHP 8.x, MySQL 8.x)  
- Extensões PHP habilitadas: `pdo_mysql`, `mbstring`, `gd`  

### 5.2. Arquivo de Ambiente

1. Na raiz do projeto, copie e renomeie:  
   ```bash
   cp config.env.ex config.env
```

2. Abra `config.env` e ajuste as credenciais do banco:

   ```dotenv
   DB_HOST=localhost
   DB_NAME=e2_database
   DB_USER=SEU_USUARIO      # ex.: root
   DB_PASS=SUA_SENHA        # deixar vazio se não tiver senha
   DB_CHARSET=utf8mb4
   ```

### 5.3. Extrair Assets de Upload

* Localize `upload.zip` na raiz do projeto.
* Extraia **dentro** de `public/`, garantindo que o conteúdo fique em:

  ```
  public/upload/…
  ```

  *Evite estruturas duplicadas como `public/upload/upload/...`.*

### 5.4. Importar Esquema e Dados Iniciais

#### Via phpMyAdmin

1. Acesse `http://localhost/phpmyadmin`.
2. Crie um banco de dados chamado `e2_database` (ou o nome definido em `config.env`).
3. Importe, na ordem:

   * `db/banco_schema.sql`
   * `db/insert_base.sql`

#### Via Terminal (Windows)

```bash
cd C:\xampp\htdocs\INA
mysql -u SEU_USUARIO -p e2_database < db/banco_schema.sql
mysql -u SEU_USUARIO -p e2_database < db/insert_base.sql
```

### 5.5. Deploy no htdocs

1. Copie toda a pasta do projeto para `C:\xampp\htdocs\INA\`.
2. No **XAMPP Control Panel**, inicie **Apache** e **MySQL**.

### 5.6. Acessando a Aplicação

Abra seu navegador e visite:

```
http://localhost/INA/
```

Se tudo estiver correto, a página inicial do **EaoQuadrado** será exibida.

---

## 6. Sobre Nós

Este projeto foi desenvolvido com dedicação pelos integrantes do Grupo **I.N.A. – Inteligência Não Artificial**, como parte do Projeto Integrador da turma 139 (Matutino) do **Senac Hub Academy – 2025**.

Você pode conhecer mais sobre cada membro da equipe acessando a página **“Sobre Nós”**, disponível em:

- Caminho direto: `INA/SobreNos`
- Ou pelo rodapé do site, clicando no link **“Sobre nós”**
