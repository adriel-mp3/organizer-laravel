# Banco de Dados

## 1. Contexto

O sistema de gerenciamento de tarefas foi modelado para permitir que cada usuário possua acesso exclusivo às suas próprias tarefas.

A estrutura segue um modelo hierárquico e coeso:

- O **User** é a entidade raiz.
- A **Task** pertence obrigatoriamente a um único usuário.
- O **Comment** pertence a uma única tarefa.
- Não há compartilhamento de tarefas entre usuários.

---

## 2. Modelo Conceitual

User (1) ──── (N) Task  
Task (1) ──── (N) Comment  
User (1) ──── (N) Comment  

Hierarquia estrutural:

User  
└── Task  
  └── Comment  

---

## 3. Entidades

### 3.1 User

Representa o usuário autenticado no sistema.

**Atributos:**

- id (PK)
- name
- email (único)
- password
- created_at
- updated_at

**Relacionamentos:**

- Um usuário pode possuir múltiplas tarefas (1:N).
- Um usuário pode possuir múltiplos comentários (1:N).

---

### 3.2 Task

Representa uma tarefa pertencente a um único usuário.

**Atributos:**

- id (PK)
- user_id (FK → users.id)
- title
- description (nullable)
- status
- created_at
- updated_at

**Relacionamentos:**

- Uma tarefa pertence a um único usuário (N:1).
- Uma tarefa pode possuir múltiplos comentários (1:N).

**Observações:**

- Uma tarefa não pode existir sem um usuário associado.
- O campo `status` deve aceitar apenas valores definidos pelo domínio:
  - pending
  - in_progress
  - completed

---

### 3.3 Comment

Representa um comentário associado a uma tarefa.

**Atributos:**

- id (PK)
- task_id (FK → tasks.id)
- user_id (FK → users.id)
- content
- created_at
- updated_at

**Relacionamentos:**

- Um comentário pertence a uma única tarefa (N:1).
- Um comentário pertence a um único usuário (N:1).

**Observações:**

- Um comentário só pode existir dentro de uma tarefa válida.
- O usuário do comentário deve ser o proprietário da tarefa.

---

## 4. Regras de Integridade

- `tasks.user_id` deve possuir chave estrangeira com `ON DELETE CASCADE`.
- `comments.task_id` deve possuir chave estrangeira com `ON DELETE CASCADE`.
- `comments.user_id` deve referenciar um usuário válido.
- Toda consulta de tarefas deve ser filtrada pelo `user_id`.
- Não é permitido acessar tarefas pertencentes a outros usuários.

---

## 5. Considerações Técnicas

- Banco de dados relacional (MySQL ou PostgreSQL).
- Estrutura versionada por meio de Migrations.
- Dados iniciais opcionais via Seeders.
- Índices recomendados:
  - tasks.user_id
  - tasks.status
  - tasks.created_at
  - comments.task_id