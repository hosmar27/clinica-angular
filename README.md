🦷 Sistema Web de Clínica
📌 Descrição do Projeto

Aplicação Web simples desenvolvida para gerenciamento de uma clínica, permitindo o cadastro de pacientes e o agendamento de consultas.

O projeto foi desenvolvido utilizando arquitetura cliente-servidor, separando frontend e backend por meio de uma API REST.

🎯 Objetivo da Atividade

Desenvolver uma aplicação Web contendo:

Pelo menos 1 CRUD completo

Pelo menos 1 operação utilizando transação no banco de dados

API REST

Controle de acesso via login/token

Uso de padrões de projeto

Versionamento com Git

Pipeline de CI/CD

🏗️ Arquitetura da Aplicação

Arquitetura Monolítica com separação em camadas:

Frontend (Angular SPA)
⬇
Backend (Laravel API REST)
⬇
Banco de Dados MySQL

A comunicação entre frontend e backend é realizada via HTTP utilizando JSON.

🖥️ Tecnologias Utilizadas
Frontend

Angular

Angular Router

Angular HttpClient

RxJS

TypeScript

O frontend é uma Single Page Application (SPA), responsável por:

Interface do usuário

Consumo da API REST

Controle de rotas

Armazenamento e envio do token de autenticação

Backend

PHP

Laravel

Eloquent ORM

Laravel Sanctum

Composer

O backend é responsável por:

Implementação da API REST

Regras de negócio

Controle de autenticação

Comunicação com o banco de dados

Execução de transações

Banco de Dados

MySQL

Banco de dados relacional utilizado para armazenamento persistente das informações.

🔐 Controle de Acesso

O sistema possui autenticação baseada em token utilizando Laravel Sanctum.

Fluxo de autenticação:

Usuário realiza login.

O backend gera um token de acesso.

O frontend armazena o token.

O token é enviado no header das requisições protegidas:

Authorization: Bearer {token}

Rotas protegidas utilizam middleware de autenticação.

🔁 CRUD Implementado

CRUD de Pacientes:

Criar paciente

Listar pacientes

Atualizar paciente

Remover paciente

Endpoints REST:

GET    /api/pacientes
POST   /api/pacientes
PUT    /api/pacientes/{id}
DELETE /api/pacientes/{id}

O padrão REST foi aplicado utilizando métodos HTTP adequados.

🔄 Transação Implementada

Operação: Criação de Agendamento

Durante a criação de um agendamento:

Um novo registro é criado na tabela de agendamentos

O horário selecionado é atualizado para "ocupado"

Essa operação é executada dentro de uma transação do banco de dados utilizando:

DB::transaction(...)

Caso ocorra erro em qualquer etapa, o rollback é executado automaticamente, garantindo integridade dos dados.

🧱 Padrões de Projeto Utilizados

MVC (Model-View-Controller) no backend

Arquitetura em Camadas

RESTful API

Repository implícito via Eloquent ORM

SPA (Single Page Application)

🔁 Versionamento e Repositório

O projeto utiliza:

Git para controle de versão

GitHub como repositório remoto

O repositório contém:

Código fonte

README

Documentação básica

Configuração de CI/CD

🚀 CI/CD

Foi configurado pipeline utilizando GitHub Actions.

O workflow executa:

Instalação de dependências

Build da aplicação

Execução de testes básicos (quando aplicável)

Isso garante integração contínua do projeto.

📂 Estrutura Geral

Backend:

Controllers

Models

Migrations

Rotas API

Frontend:

Componentes

Serviços

Guards

Interceptors

📚 Conceitos Aplicados

Aplicação Web Cliente-Servidor

API REST

Autenticação via Token

Banco de Dados Relacional

Transações

Arquitetura Monolítica

Integração Contínua

✅ Conclusão

O projeto atende aos requisitos da atividade, demonstrando:

Desenvolvimento de aplicação Web completa

Implementação de CRUD

Uso de transações

Controle de autenticação

Aplicação de padrões de projeto

Uso de versionamento e CI/CD
