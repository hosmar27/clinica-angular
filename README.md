# 🦷 Sistema Web de Clínica

## 📌 Descrição do Projeto

Aplicação Web simples desenvolvida para gerenciamento de uma clínica, permitindo o cadastro de pacientes e o agendamento de consultas.

O projeto foi desenvolvido utilizando arquitetura cliente-servidor, separando frontend e backend por meio de uma API REST.

---

# 🎯 Objetivo da Atividade

Desenvolver uma aplicação Web contendo:

- Pelo menos 1 CRUD completo  
- Pelo menos 1 operação utilizando transação no banco de dados  
- API REST  
- Controle de acesso via login/token  
- Uso de padrões de projeto  
- Versionamento com Git  
- Pipeline de CI/CD  

---

# 🏗️ Arquitetura da Aplicação

Arquitetura Monolítica com separação em camadas:

Frontend em Angular
⬇  
Backend em Laravel
⬇  
Banco de Dados MySQL  

A comunicação entre frontend e backend é realizada via HTTP utilizando JSON.

---

# 🖥️ Tecnologias Utilizadas

## Frontend

- Angular  
- Angular Router  
- Angular HttpClient  
- RxJS  
- TypeScript  

O frontend é uma Single Page Application (SPA), responsável por:

- Interface do usuário  
- Consumo da API REST  
- Controle de rotas  
- Armazenamento e envio do token de autenticação  

---

## Backend

- PHP  
- Laravel  
- Laravel Sanctum 
- Eloquent ORM  
- Carbon
- Composer  

O backend é responsável por:

- Implementação da API REST  
- Regras de negócio  
- Controle de autenticação  
- Comunicação com o banco de dados  
- Execução de transações  

---

## Banco de Dados

- MySQL  

Banco de dados relacional utilizado para armazenamento persistente das informações.

---
# 📋 Requisitos do Sistema – Clínica Web

## 📌 Requisitos Funcionais (RF)

Requisitos funcionais descrevem o que o sistema deve fazer.

### RF01 – Autenticação de Usuário
O sistema deve permitir que usuários realizem login utilizando e-mail e senha.

### RF02 – Cadastro de Pacientes
O sistema deve permitir cadastrar novos pacientes contendo, no mínimo:
- Nome
- CPF
- Telefone
- Data de nascimento

### RF03 – Listagem de Pacientes
O sistema deve permitir visualizar a lista de pacientes cadastrados.

### RF04 – Atualização e Remoção de Pacientes
O sistema deve permitir editar e excluir pacientes já cadastrados.

### RF05 – Agendamento de Consultas
O sistema deve permitir criar agendamentos vinculando um paciente a uma data e horário disponíveis.

---

## 📌 Requisitos Não Funcionais (RNF)

Requisitos não funcionais descrevem como o sistema deve funcionar.

### RNF01 – Segurança
O sistema deve utilizar autenticação baseada em token (JWT via Laravel Sanctum) para proteger rotas restritas.

### RNF02 – Integridade dos Dados
O sistema deve utilizar transações no banco de dados para garantir consistência nas operações críticas, como criação de agendamentos.

### RNF03 – Desempenho
As requisições da API devem responder em tempo adequado para aplicações web (tempo de resposta inferior a 2 segundos em ambiente normal).

### RNF04 – Arquitetura
O sistema deve seguir arquitetura cliente-servidor com separação entre frontend (Angular) e backend (Laravel API REST).

### RNF05 – Versionamento e Integração Contínua
O sistema deve utilizar controle de versão com Git e possuir pipeline de CI/CD configurado no GitHub Actions.
