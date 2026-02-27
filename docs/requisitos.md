# Documento de Requisitos

## 1. Visão Geral

O sistema consiste em uma aplicação para gerenciamento de tarefas, permitindo que usuários autenticados criem, organizem e acompanhem suas atividades.

A aplicação será composta por uma API backend desenvolvida em Laravel e uma interface frontend básica para interação com o sistema.

---

## 2. Objetivo

Fornecer uma solução para gerenciamento de tarefas que permita:

- Organização de atividades por status
- Acompanhamento do progresso das tarefas
- Registro de comentários
- Filtragem eficiente das informações

O sistema deve ser estruturado seguindo boas práticas de arquitetura, organização e qualidade de código.

---

## 3. Escopo

- Cadastro e autenticação de usuários
- CRUD completo de tarefas
- Definição e atualização de status das tarefas
- Filtros por status e data de criação
- Registro de comentários vinculados às tarefas
- Persistência em banco de dados relacional
- Containerização da aplicação com Docker
- Versionamento estruturado utilizando GitFlow

---

## 4. Requisitos Funcionais (RF)

RF-01: O sistema deve permitir o cadastro e autenticação de usuários.

RF-02: O sistema deve permitir que usuários criem tarefas.

RF-03: O sistema deve permitir visualizar detalhes de uma tarefa.

RF-04: O sistema deve permitir editar tarefas existentes.

RF-05: O sistema deve permitir excluir tarefas.

RF-06: O sistema deve permitir definir e atualizar o status de uma tarefa, sendo:
- Pendente
- Em andamento
- Concluída

RF-07: O sistema deve permitir filtrar tarefas por status.

RF-08: O sistema deve permitir filtrar tarefas por data de criação.

RF-09: O sistema deve permitir adicionar comentários a uma tarefa.

RF-10: O sistema deve exibir os comentários vinculados a uma tarefa.

---

## 5. Requisitos Não Funcionais (RNF)

RNF-01: A aplicação deve ser desenvolvida utilizando a versão mais recente do Laravel.

RNF-02: O sistema deve utilizar banco de dados relacional (MySQL ou PostgreSQL).

RNF-03: A estrutura do banco deve ser gerenciada através de Migrations e Seeders.

RNF-04: O ambiente deve ser containerizado utilizando Docker.

RNF-05: O projeto deve conter instruções claras de instalação e execução.

RNF-06: O versionamento deve seguir o fluxo GitFlow.

RNF-07: O código deve seguir boas práticas de arquitetura (DDD, MVSC), princípios SOLID e padrões de projeto adequados.

RNF-08: O sistema deve conter testes automatizados utilizando PHPUnit ou Pest.

---

## 6. Considerações Técnicas

- PHP 8.3+
- Laravel (versão estável mais recente)
- Banco de dados relacional
- Docker + docker-compose
- GitFlow como estratégia de versionamento