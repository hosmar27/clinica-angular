# 🏥 Clínica Angular (clinica-angular)

Sistema de gerenciamento para clínicas odontológicas com separação de acesso para dentistas e pacientes. Este projeto utiliza uma arquitetura de Single Page Application (SPA) comunicando-se com uma API REST.

---

## 🏗️ Arquitetura da Aplicação

Arquitetura estruturada com separação em camadas:

**Frontend em Angular** ⬇  
**Backend em Laravel** ⬇  
**Banco de Dados MySQL** A comunicação entre frontend e backend é realizada via HTTP utilizando o formato JSON.

---

## 🖥️ Tecnologias Utilizadas

### Frontend
O frontend é uma Single Page Application (SPA), responsável pela interface do usuário, consumo da API REST, controle de rotas e gerenciamento do token de autenticação.
- **Framework:** Angular  
- **Roteamento:** Angular Router  
- **Requisições:** Angular HttpClient  
- **Reatividade:** RxJS  
- **Linguagem:** TypeScript

### Backend
O backend é responsável pela implementação da API REST, regras de negócio, controle de autenticação, comunicação com o banco de dados e execução de transações.
- **Linguagem:** PHP  
- **Framework:** Laravel  
- **Autenticação:** Laravel Sanctum 
- **ORM:** Eloquent ORM  
- **Manipulação de Datas:** Carbon
- **Gerenciador de Dependências:** Composer  

### Banco de Dados
Banco de dados relacional utilizado para armazenamento persistente das informações.
- **SGBD:** MySQL  

---

## 📋 Requisitos do Sistema

### 📌 Requisitos Funcionais (RF)
- **RF01 – Autenticação de Usuário:** O sistema deve permitir que usuários realizem login utilizando e-mail e senha.
- **RF02 – Cadastro de Pacientes:** O sistema deve permitir cadastrar novos pacientes contendo, no mínimo: Nome, CPF, Telefone e Data de nascimento.
- **RF03 – Listagem de Pacientes:** O sistema deve permitir aos dentistas visualizar a lista de pacientes cadastrados.
- **RF04 – Atualização e Remoção de Pacientes:** O sistema deve permitir aos dentistas editar e excluir pacientes já cadastrados.
- **RF05 – Agendamento de Consultas:** O sistema deve permitir criar agendamentos vinculando um paciente a uma data e horário disponíveis.
- **RF06 - Cadastro de Dentistas:** O sistema deve permitir cadastrar novos dentistas contendo, no mínimo: Nome, CPF, Telefone e CIP (Cédula de Identidade Profissional).
- **RF07 - Nível de usuário:** O sistema deve ter pelo menos dois níveis de acesso (dentista e paciente).

### 📌 Requisitos Não Funcionais (RNF)
- **RNF01 – Segurança:** O sistema deve utilizar autenticação baseada em token (JWT via Laravel Sanctum) para proteger rotas restritas.
- **RNF02 – Integridade dos Dados:** O sistema deve utilizar transações no banco de dados para garantir consistência nas operações críticas, como criação de agendamentos.
- **RNF03 – Desempenho:** As requisições da API devem responder em tempo adequado para aplicações web (tempo de resposta inferior a 2 segundos em ambiente normal).
- **RNF04 – Arquitetura:** O sistema deve seguir arquitetura cliente-servidor com separação entre frontend (Angular) e backend (Laravel API REST).
- **RNF05 – Versionamento e CI/CD:** O sistema deve utilizar controle de versão com Git e possuir pipeline de integração contínua configurado no GitHub Actions.

---

## 📐 Arquitetura do Sistema – Modelo C4

O sistema foi estruturado com base no Modelo C4, organizando a arquitetura em níveis de abstração.

### 🌍 Nível 1 – Contexto
Os usuários (com base no nível de acesso) acessam o sistema web para realizar operações como autenticação, cadastro de pacientes, cadastro de dentistas e agendamento de consultas.
- **Elementos:** Usuário (Dentista e Paciente) e Sistema Web de Clínica.

### 🧱 Nível 2 – Containers
- **Frontend (Angular):** Implementado como SPA, consome a API REST e gerencia a autenticação via token.
- **Backend (Laravel API):** Implementa a API REST, realiza autenticação com Sanctum, controla acessos e executa transações.
- **Banco de Dados (MySQL):** Armazena dados persistentes (usuários, pacientes, dentistas e agendamentos).
- **Fluxo:** `Usuário → Angular → Laravel API → MySQL`

### 🧩 Nível 3 – Componentes
Neste nível, detalha-se a estrutura interna do backend (Laravel).

**Principais Componentes:**
- **AuthController:**
  - Responsável pela autenticação de usuários.
  - Geração e validação de tokens.
- **PatientController:**
  - Gerencia o CRUD de pacientes.
- **DentistController:**
  - Responsável pelo cadastro e gerenciamento de dentistas.
- **AppointmentController:**
  - Responsável pela criação de agendamentos.
  - Executa operações com transações no banco.
- **Models (Eloquent ORM):**
  - Representam as entidades do sistema.
  - Fazem a comunicação com o banco de dados.
- **Middleware de Autenticação:**
  - Protege rotas.
  - Valida tokens de acesso.

### 💻 Nível 4 – Código
Este nível representa a implementação em código (classes, métodos e funções).

Para este projeto, não é necessário detalhar esse nível, pois os níveis anteriores já são suficientes para compreensão da arquitetura.

### 🎯 Conclusão
A aplicação do Modelo C4 permite uma visão clara da arquitetura do sistema, desde o contexto geral até os componentes internos, facilitando o entendimento, manutenção e evolução da aplicação.
