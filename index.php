<?php

require_once "dbloader.php";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': // READ
        $obj = isset($_GET['object']) ? $_GET['object'] : '*';
        $id = $_GET['id'];

        $sql = "
            SELECT *
            FROM pessoa
            WHERE id = :id";

        $pdoStatement = $dbh->prepare($sql);
        $pdoStatement->execute([
            'id' => $id
        ]);

        echo var_dump($pdoStatement->fetchAll(PDO::FETCH_ASSOC)[0]);
        break;

    case 'POST': // CREATE
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];

        $sql = "
            INSERT INTO pessoa (nome, cpf)
            VALUES (:nome, :cpf)";

        $pdoStatement = $dbh->prepare($sql);

        if ($pdoStatement->execute([
            'nome' => $nome,
            'cpf' => $cpf
        ])) echo "INSERI COM SUCESSO";
        else echo "DEU RUIM GURIZADA";

        break;

    case 'PUT': // UPDATE
        $nome = $_GET['nome'];
        $cpf = $_GET['cpf'];

        $sql = "
            UPDATE pessoa
            SET cpf = :cpf 
            WHERE nome = :nome
        ";

        $pdoStatement = $dbh->prepare($sql);

        echo var_dump($pdoStatement->execute([
            'nome' => $nome,
            'cpf' => $cpf
        ]));
        break;

    case 'DELETE': // DELETE
        $nome = $_GET['nome'];

        $sql = "
            DELETE FROM pessoa
            WHERE nome = :nome
        ";

        $pdoStatement = $dbh->prepare($sql);

        echo var_dump($pdoStatement->execute([
            'nome' => $nome
        ]));
        break;
}

