<?php
require_once dirname(__DIR__, 2).'/includes.php';

use App\Model\CentroDeCusto;
use App\Model\CentroDeCustoDAO;
use App\Model\Cargo;
use App\Model\CargoDAO;
use App\Model\Departamento;
use App\Model\DepartamentoDAO;
use App\Model\Usuario;
use App\Model\UsuarioDAO;

if($_POST['type'] == 'cargo')
{
    $c = new Cargo();
    $c->setId($_POST['id']);
    $c->setNome($_POST['nome']);
    $c->setDescricao($_POST['desc']);
    $cdao = new CargoDAO();
    if($cdao->update($c)){
        echo json_encode(['error' => false, 'msg' => 'Cargo editado!']);
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Cargo não deletado, erro de conexão!']);
    }
}