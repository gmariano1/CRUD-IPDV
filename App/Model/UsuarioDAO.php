<?php
namespace App\Model;

class UsuarioDAO
{
    public function create(Usuario $c)
    {
        $sql = "INSERT INTO usuario (nome, email, data_de_nascimento, senha, cpf, cargo_id, departamento_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->bindValue(1, $c->getNome());
        $stmt->bindValue(2, $c->getEmail());
        $stmt->bindValue(3, $c->getDataDeNascimento());
        $stmt->bindValue(4, $c->getSenha());
        $stmt->bindValue(5, $c->getCPF());
        $stmt->bindValue(6, $c->getCargoId());
        $stmt->bindValue(7, $c->getDepartamentoId());
        $return = $stmt->execute();
        return $return;
    }

    public function read()
    {
        $sql = "SELECT * FROM usuario";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $return = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $return;
        }else{
            return "Não existem registros";
        }

    }

    public function login($email)
    {
        $sql = "SELECT email, senha FROM usuario WHERE email = ?";
        $stmt = Conexao::getConnection()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $return = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $return;
        }else{
            return null;
        }
    }

    public function update(Usuario $c)
    {

        if(!is_null($c->getNome()))
        {
            $sql = "UPDATE usuario SET nome = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getNome());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
        }

        if(!is_null($c->getEmail()))
        {
            $sql = "UPDATE usuario SET email = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getEmail());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }

        if(!is_null($c->getDataDeNascimento()))
        {
            $sql = "UPDATE usuario SET data_de_nascimento = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getDataDeNascimento());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }

        if(!is_null($c->getCPF()))
        {
            $sql = "UPDATE usuario SET cpf = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getCPF());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }

        if(!is_null($c->getCargoId()))
        {
            $sql = "UPDATE usuario SET cargo_id = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getCargoId());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }

        if(!is_null($c->getDepartamentoId()))
        {
            $sql = "UPDATE usuario SET departamento_id = ? WHERE id = ?";
            $stmt = Conexao::getConnection()->prepare($sql);
            $stmt->bindValue(1, $c->getDepartamentoId());
            $stmt->bindValue(2, $c->getId());
            $return = $stmt->execute();
            if(!$return){
                return "Erro ao atualizar";
            }
            
        }
        return true;
        
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Usuario WHERE id = ?";
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