<?php
require_once dirname(__DIR__, 2).'/includes.php';

use App\Model\CentroDeCusto;
use App\Controller\CentroDeCustoController;
use App\Model\Cargo;
use App\Controller\CargoController;
use App\Model\Departamento;
use App\Controller\DepartamentoController;
use App\Model\Usuario;
use App\Controller\UsuarioController;

if($_POST['type'] == 'cargo')
{
    $c = new Cargo();
    $c->setId($_POST['id']);
    $cController = new CargoController();
    if($cController->delete($c->getId())){
        echo json_encode(['error' => false, 'msg' => 'Cargo deletado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Cargo não deletado, erro de conexão!']);
        return;
    }
    
}

if($_POST['type'] == 'usuario')
{
    $u = new Usuario();
    $u->setId($_POST['id']);
    $uController = new UsuarioController();
    if($uController->delete($u->getId())){
        echo json_encode(['error' => false, 'msg' => 'Usuario deletado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Usuario não deletado, erro de conexão!']);
        return;
    }
    
}

if($_POST['type'] == 'departamento')
{
    $u = new Departamento();
    $u->setId($_POST['id']);
    $uController = new DepartamentoController();
    if($uController->delete($u->getId())){
        echo json_encode(['error' => false, 'msg' => 'Usuario deletado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Usuario não deletado, erro de conexão!']);
        return;
    }
    
}

if($_POST['type'] == 'centro_de_custo')
{
    $c = new CentroDeCusto();
    $c->setId($_POST['id']);
    $cController = new CentroDeCustoController();
    if($cController->delete($c->getId())){
        echo json_encode(['error' => false, 'msg' => 'Centro de custo deletado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Centro de custo não deletado, erro de conexão!']);
        return;
    }
    
}