# Biblioteca - Sistema de Gerenciamento de Livros

Este é um sistema de gerenciamento de biblioteca simples e completo, desenvolvido com um banco de dados relacional. O sistema permite que você gerencie livros, autores, usuários, empréstimos, reservas e avaliações de livros.

## Estrutura do Banco de Dados

O banco de dados para este sistema contém as seguintes tabelas principais:

### 1. Tabela `authors`
A tabela `authors` armazena os dados dos autores dos livros. Ela contém as seguintes colunas:

- `id`: Identificador único do autor.
- `name`: Nome do autor.
- `biography`: Biografia do autor.
- `birth_date`: Data de nascimento do autor.
- `death_date`: Data de falecimento do autor (opcional).

### 2. Tabela `books`
A tabela `books` armazena os livros disponíveis na biblioteca. Ela contém as seguintes colunas:

- `id`: Identificador único do livro.
- `title`: Título do livro.
- `author_id`: ID do autor (referência à tabela `authors`).
- `genre`: Gênero do livro (ex: Ficção, Romance, etc.).
- `publication_date`: Data de publicação do livro.
- `isbn`: ISBN do livro (código único).
- `available_copies`: Número de cópias disponíveis para empréstimo.
- `total_copies`: Número total de cópias do livro.
  
A tabela `books` tem uma chave estrangeira (`author_id`) que faz referência à tabela `authors` para associar cada livro ao seu autor.

### 3. Tabela `users`
A tabela `users` armazena informações sobre os usuários da biblioteca. Ela contém as seguintes colunas:

- `id`: Identificador único do usuário.
- `name`: Nome do usuário.
- `email`: Email do usuário (único).
- `password`: Senha do usuário (armazenada de forma segura).
- `phone`: Número de telefone do usuário (opcional).
- `created_at`: Data de criação da conta do usuário.

### 4. Tabela `book_loans`
A tabela `book_loans` registra os empréstimos de livros realizados pelos usuários. Ela contém as seguintes colunas:

- `id`: Identificador único do empréstimo.
- `book_id`: ID do livro (referência à tabela `books`).
- `user_id`: ID do usuário (referência à tabela `users`).
- `loan_date`: Data do empréstimo.
- `return_date`: Data da devolução do livro (opcional).
- `due_date`: Data de vencimento do empréstimo.
- `status`: Status do empréstimo. Pode ser:
  - `pending`: Empréstimo ainda não devolvido.
  - `returned`: Empréstimo devolvido.
  - `overdue`: Empréstimo vencido.

A tabela `book_loans` possui chaves estrangeiras (`book_id` e `user_id`) que fazem referência às tabelas `books` e `users`, respectivamente.

### 5. Tabela `book_reservations`
A tabela `book_reservations` registra as reservas feitas pelos usuários para livros que estão atualmente emprestados. Ela contém as seguintes colunas:

- `id`: Identificador único da reserva.
- `book_id`: ID do livro (referência à tabela `books`).
- `user_id`: ID do usuário (referência à tabela `users`).
- `reservation_date`: Data da reserva.
- `status`: Status da reserva. Pode ser:
  - `pending`: Reserva aguardando a devolução do livro.
  - `cancelled`: Reserva cancelada.
  - `completed`: Reserva completada.

### 6. Tabela `book_reviews`
A tabela `book_reviews` permite que os usuários deixem avaliações sobre os livros. Ela contém as seguintes colunas:

- `id`: Identificador único da avaliação.
- `book_id`: ID do livro (referência à tabela `books`).
- `user_id`: ID do usuário (referência à tabela `users`).
- `rating`: Nota da avaliação, de 1 a 5.
- `review`: Texto da avaliação.
- `review_date`: Data em que a avaliação foi feita.

### 7. Tabela `notifications`
A tabela `notifications` armazena notificações enviadas para os usuários, como alertas sobre devoluções de livros e outros avisos. Ela contém as seguintes colunas:

- `id`: Identificador único da notificação.
- `user_id`: ID do usuário (referência à tabela `users`).
- `message`: Mensagem da notificação.
- `notification_date`: Data em que a notificação foi enviada.

---

