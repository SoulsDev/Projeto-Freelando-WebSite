<?php
    include('Cargo.php');

    $cargos = addslashes($_POST['cargos']);
    $id = addslashes($_POST['id']);

    $cargos = explode(';', $cargos);

    $experiencia_profissional = new Cargo(0, 0, $id);

    for($i=0; $i<(count($cargos)-1); $i++){
        $itens = explode(',', $cargos[$i]);
        
        $experiencia_profissional->setProfissao($itens[0]);
        $experiencia_profissional->setExperiencia($itens[1]);

        $experiencia_profissional->cadastrarCargo(
            $experiencia_profissional->getProfissao(),
            $experiencia_profissional->getExperiencia(),
            $experiencia_profissional->getIdAutonomo()
        );
    }

    header('Location: ../../../pages/AutonomoPrivado.php');
?>