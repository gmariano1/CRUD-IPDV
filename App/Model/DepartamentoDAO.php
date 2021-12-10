<?php
namespace App\Model;

class DepartamentoDAO
{
    public function create(Departamento $c)
    {
        $sql = "INSERT INTO departamento (nome, centro_de_custo_id) VALUES (?, ?)";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->bindValue(1, $c->getNome());
        $stmt->bindValue(2, $c->getCentroDeCustoId());
        $return = $stmt->execute();
        if($return){
            return "Inserido com sucesso";
        }else{
            return "Erro de execução";
        }
    }

    public function read()
    {
        $sql = "SELECT * FROM departamento";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $return = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $return;
        }else{
            return "Não existem registros";
        }

    }

    public function update(Departamento $c)
    {

        if(!is_null($c->getNome()))
        {
            $sql = "UPDATE departamento SET nome = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
        }

        if(!is_null($c->getCentroDeCustoId()))
        {
            $sql = "UPDATE departamento SET centro_de_custo_id = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getCentroDeCustoId());
            $stmt->bindValue(2, $c->getId());
            $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }
        return "Atualizado com sucesso";
        
    }

    public function delete($id)
    {
        $sql = "DELETE FROM departamento WHERE id = ?";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        $return = $stmt->execute();
        if($return){
            return "Deletado com sucesso";
        }else{
            return "Erro ao deletar";
        }
    }
}