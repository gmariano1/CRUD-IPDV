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
    $cargo = new Cargo();
    $cargo->setId($_POST['id_aux']);
    $cargoController = new CargoController();
    echo json_encode($cargoController->edit($cargo->getId()));
}

if($_POST['type'] == 'usuario')
{
    $usuario = new Usuario();
    $usuario->setId($_POST['id_aux']);
    $usuarioController = new UsuarioController();
    echo json_encode($usuarioController->edit($usuario->getId()));
}

if($_POST['type'] == 'departamento')
{
    $departamento = new Departamento();
    $departamento->setId($_POST['id_aux']);
    $departamentoController = new DepartamentoController();
    echo json_encode($departamentoController->edit($departamento->getId()));
}

if($_POST['type'] == 'centro_de_custo')
{
    $centro_de_custo = new CentroDeCusto();
    $centro_de_custo->setId($_POST['id_aux']);
    $centro_de_custoController = new CentroDeCustoController();
    echo json_encode($centro_de_custoController->edit($centro_de_custo->getId()));
}