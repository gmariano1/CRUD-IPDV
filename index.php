<?php require_once './components/header.php'; ?>
<h1>Hello World</h1>
<button type="button" class="btn btn-primary">Primary</button>
<?php 
    use App\Model\Cargo;
    use App\Model\CargoDAO;
    use App\Model\Conexao;
    $cargo = new Cargo();
    $cargo->setNome('Programador');
    $cargo->setDescricao('Bug o dia inteiro');
    $cargoDAO = new cargoDAO();
    var_dump($cargoDAO->create($cargo));
    //$conn = new Conexao();
    //var_dump($conn->seeConn());
?>
<?php require_once './components/footer.php'; ?>