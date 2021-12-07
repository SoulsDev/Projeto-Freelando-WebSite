<?php
    include('Filtro.php');

    $busca = Filtro::BuscarPorNome('a');

    while($row = $busca->fetch(PDO::FETCH_BOTH)) {
        print_r($row);
    }
?>