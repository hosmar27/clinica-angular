# 🏗️ Arquitetura do Sistema – Modelo C4

O sistema foi estruturado com base no Modelo C4, que organiza a arquitetura em níveis de abstração, facilitando a compreensão da aplicação.

---

## 🌍 Nível 1 – Contexto

Neste nível, o sistema é apresentado de forma geral, mostrando quem interage com ele.

### Elementos:

- Usuário (Dentista e Paciente)
- Sistema Web de Clínica

### Descrição:

Os usuários (com base no nível de acesso) acessam o sistema web para realizar operações como autenticação, cadastro de pacientes, cadastro de dentistas e agendamento de consultas.

---

## 🧱 Nível 2 – Containers

Neste nível, são apresentadas as principais partes do sistema e suas tecnologias.

### Containers:

- **Frontend (Angular)**
  - Responsável pela interface do usuário
  - Implementado como SPA (Single Page Application)
  - Consome a API REST via HTTP/JSON
  - Gerencia autenticação via token

- **Backend (Laravel API)**
  - Responsável pelas regras de negócio
  - Implementa API REST
  - Realiza autenticação com Laravel Sanctum
  - Controla acesso por níveis de usuário (dentista e paciente)
  - Executa transações no banco de dados

- **Banco de Dados (MySQL)**
  - Armazena dados persistentes
  - Gerencia entidades como usuários, pacientes, dentistas e agendamentos

### Fluxo de Comunicação:

Usuário → Angular → Laravel API → MySQL

---

## 🧩 Nível 3 – Componentes

Neste nível, detalha-se a estrutura interna do backend (Laravel).

### Principais Componentes:

- **AuthController**
  - Responsável pela autenticação de usuários
  - Geração e validação de tokens

- **PacienteController**
  - Gerencia o CRUD de pacientes

- **DentistaController**
  - Responsável pelo cadastro e gerenciamento de dentistas

- **AgendamentoController**
  - Responsável pela criação de agendamentos
  - Executa operações com transações no banco

- **Models (Eloquent ORM)**
  - Representam as entidades do sistema
  - Fazem a comunicação com o banco de dados

- **Middleware de Autenticação**
  - Protege rotas
  - Valida tokens de acesso

---

## 💻 Nível 4 – Código

Este nível representa a implementação em código (classes, métodos e funções).

Para este projeto, não é necessário detalhar esse nível, pois os níveis anteriores já são suficientes para compreensão da arquitetura.

---

## 🎯 Conclusão

A aplicação do Modelo C4 permite uma visão clara da arquitetura do sistema, desde o contexto geral até os componentes internos, facilitando o entendimento, manutenção e evolução da aplicação.
