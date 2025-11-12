# TecendoBaixadas

**Tecendo Baixadas** é uma aplicação open source voltada à articulação, formação e visibilidade de iniciativas territoriais nas Baixadas, integrando ferramentas de comunicação e tecnologia social.

Este repositório contém o código-fonte da aplicação web, desenvolvida com **Laravel**, **PHP**, **Composer** e **Node.js**.

---

## 🚀 Tecnologias principais

- Laravel — framework PHP backend
- Composer — gerenciador de dependências PHP
- Node.js / npm — build e dependências front-end
- Vite ou Laravel Mix — empacotamento front-end (dependendo da versão)
- Banco de dados compatível: MySQL / MariaDB / PostgreSQL / SQLite

---

## 🧩 Pré-requisitos

Antes de começar, instale ou verifique se você possui:

- PHP >= 8.x  
- Composer  
- Node.js >= 18.x  
- NPM >= 9.x  
- Servidor de banco de dados (MySQL ou PostgreSQL)
- Extensões PHP exigidas pelo Laravel (pdo, mbstring, etc.)

---

## ⚙️ Instalação e configuração

1. Clone o repositório:
   git clone https://github.com/tecendobaixadas/tecendobaixadas.git
   cd tecendo-baixadas

2. Instale as dependências PHP:
   composer install

3. Instale as dependências JavaScript:
   npm install

4. Crie o arquivo de ambiente:
   cp .env.example .env

5. Gere a chave da aplicação:
   php artisan key:generate

6. Configure o .env com suas credenciais de banco de dados e URL da aplicação.

7. Execute as migrações e seeders:
   php artisan migrate
   php artisan db:seed

8. Crie o link simbólico para o armazenamento:
   php artisan storage:link

9. Compile os assets front-end:
   npm run build

10. Limpe e otimize o cache da aplicação:
    php artisan optimize:clear

---

## 🧠 Estrutura básica do projeto

app/                → código principal (controllers, models, etc.)
resources/          → views, JS e CSS (frontend)
routes/             → rotas da aplicação
database/           → migrations e seeders
public/             → arquivos públicos (index.php, assets compilados)

---

## 🧰 Comandos úteis

php artisan serve                        → Inicia o servidor local
php artisan migrate:fresh --seed          → Restaura o banco de dados e repovoa
npm run dev                               → Inicia o ambiente de desenvolvimento front-end
npm run build                             → Gera os arquivos otimizados para produção

---

## 💡 Contribuindo

Contribuições são bem-vindas!
Sinta-se à vontade para abrir issues, pull requests ou propor melhorias na documentação.

### Passos para contribuir:

1. Faça um fork deste repositório  
2. Crie uma branch para sua feature:
   git checkout -b minha-feature
3. Faça o commit das suas alterações:
   git commit -m "feat: adiciona nova funcionalidade"
4. Envie para o seu fork e abra um pull request:
   git push origin minha-feature

---

## 📄 Licença

Este projeto está licenciado sob a MIT License.  
Sinta-se livre para usar, modificar e distribuir conforme os termos da licença.

---

## 🌍 Sobre o projeto

Tecendo Baixadas é uma iniciativa de articulação tecnológica e territorial que busca fortalecer redes comunitárias, promover a inclusão digital e dar visibilidade às potências locais das Baixadas.  
O projeto adota princípios de tecnologia social, software livre e autonomia comunitária.

---

Desenvolvido com 💻 e 🌱 por comunidades e colaboradores do projeto Tecendo Baixadas.
