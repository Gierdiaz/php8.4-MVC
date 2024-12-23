
# Comandos MySQL no Docker

## Acessar o terminal do container MySQL

Você pode acessar o terminal do container e executar comandos MySQL diretamente de lá:

```bash
docker exec -it mysql-db bash
```

Dentro do container, o cliente MySQL já está instalado. Para conectar ao banco de dados:

```bash
mysql -u usuario -p
```

Ou, para executar comandos diretamente com Docker (sem entrar no container):

```bash
docker exec -it mysql-db mysql -u usuario -p
```

## Comandos para Gerenciar Bancos de Dados

### Criar um banco de dados:

```sql
CREATE DATABASE nome_do_banco;
```

### Listar bancos de dados:

```sql
SHOW DATABASES;
```

### Selecionar um banco de dados (para usá-lo):

```sql
USE nome_do_banco;
```

### Excluir um banco de dados:

```sql
DROP DATABASE nome_do_banco;
```

## Comandos para Gerenciar Tabelas

### Criar uma tabela:

```sql
CREATE TABLE nome_da_tabela (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Listar tabelas no banco selecionado:

```sql
SHOW TABLES;
```

### Visualizar a estrutura de uma tabela:

```sql
DESCRIBE nome_da_tabela;
```

ou

```sql
SHOW COLUMNS FROM nome_da_tabela;
```

### Renomear uma tabela:

```sql
RENAME TABLE nome_antigo TO nome_novo;
```

### Excluir uma tabela:

```sql
DROP TABLE nome_da_tabela;
```

### Adicionar uma coluna a uma tabela:

```sql
ALTER TABLE nome_da_tabela ADD nova_coluna VARCHAR(100);
```

### Remover uma coluna de uma tabela:

```sql
ALTER TABLE nome_da_tabela DROP COLUMN nome_da_coluna;
```

### Editar o tipo de uma coluna:

```sql
ALTER TABLE nome_da_tabela MODIFY coluna VARCHAR(255);
```

## Comandos para Inserir, Visualizar, Editar e Excluir Dados

### Inserir dados em uma tabela:

```sql
INSERT INTO nome_da_tabela (nome, email) VALUES ('João', 'joao@email.com');
```

### Visualizar dados em uma tabela

#### Todos os dados:

```sql
SELECT * FROM nome_da_tabela;
```

#### Apenas algumas colunas:

```sql
SELECT nome, email FROM nome_da_tabela;
```

#### Com filtros:

```sql
SELECT * FROM nome_da_tabela WHERE nome = 'João';
```

#### Ordenar resultados:

```sql
SELECT * FROM nome_da_tabela ORDER BY nome ASC;
```

#### Limitar a quantidade de resultados:

```sql
SELECT * FROM nome_da_tabela LIMIT 5;
```

### Atualizar dados em uma tabela:

```sql
UPDATE nome_da_tabela
SET email = 'novoemail@email.com'
WHERE nome = 'João';
```

### Excluir dados de uma tabela

#### Deletar uma linha específica:

```sql
DELETE FROM nome_da_tabela WHERE nome = 'João';
```

#### Deletar todos os dados da tabela (mas manter a estrutura):

```sql
DELETE FROM nome_da_tabela;
```

## Outros Comandos Úteis

### Contar registros em uma tabela:

```sql
SELECT COUNT(*) FROM nome_da_tabela;
```

### Remover valores duplicados:

```sql
SELECT DISTINCT coluna FROM nome_da_tabela;
```

### Limpar a tabela (remover todos os dados rapidamente):

```sql
TRUNCATE TABLE nome_da_tabela;
```

### Exibir o nome do banco de dados atual:

```sql
SELECT DATABASE();
```

## Fluxo de Trabalho Básico

### Criar o banco:

```sql
CREATE DATABASE exemplo;
USE exemplo;
```

### Criar uma tabela:

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(255),
    senha VARCHAR(255)
);
```

### Inserir dados:

```sql
INSERT INTO usuarios (nome, email, senha) VALUES ('Maria', 'maria@email.com', '123456');
```

### Consultar os dados:

```sql
SELECT * FROM usuarios;
```

### Atualizar um dado:

```sql
UPDATE usuarios SET email = 'maria.novo@email.com' WHERE nome = 'Maria';
```

### Excluir um registro:

```sql
DELETE FROM usuarios WHERE nome = 'Maria';
```