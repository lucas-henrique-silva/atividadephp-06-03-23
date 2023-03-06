<?php

include 'contatos.php';
include 'contatosdao.php';

$nome = filter_input(INPUT_POST, 'nome');
$telefone = filter_input(INPUT_POST, 'telefone');
$id =  filter_input(INPUT_POST, 'id');
$botao = filter_input(INPUT_POST, 'botao');

$cont = new Contatos(); 
$contdao = new Contatosdao();

$cont -> setNome($nome);
$cont -> setTelefone($telefone);
$cont -> setID($id);


if ($botao=='cadastrar'){
$contdao -> cadastrarcontato($cont);
}else if($botao=='deletar'){
    $contdao -> deletarcontato($cont);
}