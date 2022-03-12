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
    $c->setNome($_POST['nome']);
    $c->setDescricao($_POST['desc']);
    $cController = new CargoController();
    if($cController->update($c)){
        echo json_encode(['error' => false, 'msg' => 'Cargo editado!']);
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
    $u->setNome($_POST['nome']);
    $u->setEmail($_POST['email']);
    $u->setDataDeNascimento($_POST['data_de_nascimento']);
    $u->setCPF($_POST['cpf']);
    $u->setCargoId($_POST['cargo_id']);
    $u->setDepartamentoId($_POST['departamento_id']);
    $uController = new UsuarioController();
    if($uController->update($u)){
        echo json_encode(['error' => false, 'msg' => 'Usuário editado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Usuário não deletado, erro de conexão!']);
        return;
    }
}

if($_POST['type'] == 'departamento')
{
    $d = new Departamento();
    $d->setId($_POST['id']);
    $d->setNome($_POST['nome']);
    $d->setCentroDeCustoId($_POST['centro_de_custo_id']);
    $dController = new DepartamentoController();
    if($dController->update($d)){
        echo json_encode(['error' => false, 'msg' => 'Departamento editado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Departamento não deletado, erro de conexão!']);
        return;
    }
}

if($_POST['type'] == 'centro_de_custo')
{
    $c = new CentroDeCusto();
    $c->setId($_POST['id']);
    $c->setNome($_POST['nome']);
    $cController = new CentroDeCustoController();
    if($cController->update($c)){
        echo json_encode(['error' => false, 'msg' => 'Centro de custo editado!']);
        return;
    }else{
        echo json_encode(['error' => true, 'msg_error' => 'Centro de custo não deletado, erro de conexão!']);
        return;
    }
}