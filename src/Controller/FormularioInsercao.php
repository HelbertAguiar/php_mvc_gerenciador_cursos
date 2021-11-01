<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerComHTML implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void{
        echo  $this->renderizaHTML('cursos/Formulario.php', [
            'titulo' => 'Insira um novo curso' 
        ]);
    }
}
