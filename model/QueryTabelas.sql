--Fornecedores
SELECT forn.id,
    forn.razao_social,
    forn.nome_fantasia,
    forn.cnpj,
    forn.representante,
    forn.email,
    forn.endereco,
    forn.bairro,
    forn.id_estados,
    forn.atividade,
    estado.nome as estado
FROM fornecedores AS forn
    INNER JOIN estado on estado.id = forn.id_estados
WHERE cnpj = '$cnpj';
--Produtos
SELECT prod.id as id_produto,
    prod.nome as produto,
    prod.codigo as codigo,
    categ.nome as categoria,
    categ.id as id_categoria,
    subcateg.nome as sub_categoria,
    subcateg.id as id_sub_categoria,
    forn.nome_fantasia as fornecedor,
    forn.id as id_fornecedor
FROM produtos as prod
    INNER JOIN categorias as categ ON prod.id_categoria = categ.id
    INNER JOIN sub_categorias as subcateg ON prod.id_sub_categoria = subcateg.id
    INNER JOIN fornecedores as forn ON prod.id_fornecedor = forn.id
WHERE codigo = '$codigo';
--Clientes
SELECT cli.id,
    cli.nome,
    cli.email,
    cli.data_nascimento,
    cli.cpf,
    cli.endereco,
    cli.bairro,
    cli.id_estados,
    estado.uf as estados
FROM clientes as cli
    INNER JOIN estado ON id_estados = estado.id
WHERE client.cpf = '$cpf';
--Funcionários
SELECT func.id,
    func.nome,
    func.email,
    func.data_nascimento,
    func.cpf,
    func.endereco,
    func.bairro,
    func.ativo,
    func.id_estados,
    func.id_cargo,
    cargo.id as id_cargo,
    cargo.nome as cargo,
    estado.uf as estados
FROM funcionarios as func
    INNER JOIN estado ON id_estados = estado.id
    INNER JOIN cargo ON id_cargo = cargo.id
WHERE cpf = '$cpf';
--Usuários
SELECT id,
    id_funcionario,
    id_cargo,
    email,
    senha
FROM usuarios
WHERE email = '$email';