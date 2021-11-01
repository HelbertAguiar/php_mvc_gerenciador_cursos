<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class Persistencia implements InterfaceControladorRequisicao{

    private $entityManager;

    public function __construct(){
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao():void {
        // pegar dados do formulário
        $name_tag_input = 'descricao';
        $descricao = filter_input(INPUT_POST, $name_tag_input ,FILTER_SANITIZE_STRING);
        // montar modelo curso
        $curso = new Curso();
        $curso->setDescricao($descricao);
        // inserir no banco
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $_SESSION['mensagem'] = 'Curso atualizado com sucesso'; 
        } else {
            $this->entityManager->persist($curso);
            $_SESSION['mensagem'] = 'Curso inserido com sucesso'; 
        }

        $_SESSION['tipo_mensagem'] = 'success'; 
        $this->entityManager->flush();

        header('Location: /listar-cursos');
    }

}

?>