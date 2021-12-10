<?php
    include('DadoAcademico.php');
   
    $cursos = addslashes($_POST['cursos']);
    $id = addslashes($_POST['id']);
    
    $cursos = explode(';', $cursos);

    $dado_academico = new DadoAcademico('ensino', 'inicial', 'inicial', 0, $id);

    for($i=0; $i<(count($cursos)-1); $i++){
    
        $itens = explode(',', $cursos[$i]);

        $dado_academico->setNivel($itens[0]);
        $dado_academico->setCurso($itens[1]);
        $dado_academico->setCargaHoraria($itens[2]);

        $dado_academico->cadastrarDadoAcademico(
            $dado_academico->getEnsino(),
            $dado_academico->getNivel(),
            $dado_academico->getCurso(),
            $dado_academico->getCargaHoraria(),
            $dado_academico->getIdAutonomo()
        );
    }


    header('Location: ../../../pages/AutonomoPrivado.php');
?>