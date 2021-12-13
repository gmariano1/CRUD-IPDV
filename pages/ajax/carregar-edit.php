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
    $cargo = new Cargo();
    $cargo->setId($_POST['id_aux']);
    $cargoDao = new CargoDAO();
    echo json_encode($cargoDao->edit($cargo->getId()));
}