<?php
namespace App\Model;

class CargoDAO
{
    public function create(Cargo $c)
    {
        $sql = "INSERT INTO cargo (nome, descricao) VALUES (?, ?)";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->bindValue(1, $c->getNome());
        $stmt->bindValue(2, $c->getDescricao());
        $return = $stmt->execute();
        if($return){
            return "Inserido com sucesso";
        }else{
            return "Erro de execução";
        }
    }

    public function read()
    {

    }

    public function update(Cargo $c)
    {

    }

    public function delete($id)
    {

    }
}