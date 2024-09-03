<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario_bruto = $_POST['salario_bruto'];
    $inss = $_POST['inss'];

    // Calcular o salário líquido
    $salario_liquido = $salario_bruto - $inss;

    // Inserir os dados no banco de dados
    $sql = 'INSERT INTO funcionarios (nome, cargo, salario_bruto, inss, salario_liquido) VALUES (:nome, :cargo, :salario_bruto, :inss, :salario_liquido)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nome' => $nome,
        'cargo' => $cargo,
        'salario_bruto' => $salario_bruto,
        'inss' => $inss,
        'salario_liquido' => $salario_liquido
    ]);

    echo 'Dados do funcionário inseridos com sucesso!';
}
?>
<a href="inserir_funcionario.html">Inserir Novo Funcionário</a>
