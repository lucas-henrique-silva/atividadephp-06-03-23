<?php
include 'conexao.php';

class contatosdao{
    /*CRUD - create read update delete*/

    /*C create */
    public function cadastrarcontato(Contatos $c){
        $sql = 'insert into contato(nome, telefone) 
        values(?, ?)';

        $banco = new Conexao();
        $conContatos = $banco->getConexao();

        $valores = $conContatos->prepare($sql);
        $valores->bindValue(1, $c->getNome());
        $valores->bindValue(2, $c->getTelefone());

        $result = $valores->execute();

        if($result){
            echo "cadastrado com sucesso";
        }else{
            echo "erro ao cadastrar";
        }
    }//cadastrar

    /*R read */
    public function consultaContatos(){
        $sql = "select * from contatos";

        $banco = new Conexao();
        $conContatos = $banco->getConexao();

        $valores = $conContatos->prepare($sql);
        $valores->execute();
        
        if($valores->rowCount()>0){
            $valores->fetchAll(\PDO::FETCH_ASSOC);
            return $valores;
        }
    }//consultar

    /*U update */
    public function atualizarcontato(Contatos $c){
        $sql = 'update contato set nome=?, 
        telefone=? where id=?';

        $banco = new Conexao();
        $conContatos = $banco->getConexao();

        $valores = $conContatos->prepare($sql);
        $valores->bindValue(1, $c->getNome());
        $valores->bindValue(2, $c->getTelefone());
        $valores->bindValue(3, $c->getId());

        $result = $valores->execute();

        if($result){
            echo "atualizado com sucesso";
        }else{
            echo "erro ao atualizar";
        }
    }//atualizar

        /*D delete */
        public function deletarcontato(Contatos $c){
            $sql = 'delete from contato where id=?';

            $banco = new Conexao();
            $conContatos = $banco->getConexao();
    
            $valores = $conContatos->prepare($sql);
            $valores->bindValue(1, $c->getId());
    
            $result = $valores->execute();
    
            if($result){
                echo "deletado com sucesso";
            }else{
                echo "erro ao deletar";
            }
        }//atualizar

}