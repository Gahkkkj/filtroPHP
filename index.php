<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Vaga;
    $vagas = Vaga::getVagas();
    // echo "<pre>"; print_r($vagas); echo "</pre>"; exit;
    
//busca
$busca = filter_input(INPUT_GET, 'busca');

//Filtro status
$FiltroStatus = filter_input(INPUT_GET, 'status');
$FiltroStatus = in_array($FiltroStatus,['s','n']) ? $FiltroStatus : '';


//condiçoes sql 
$condicoes = [
   strlen($busca) ? 'nome LIKE "%'.str_replace (' ','%',$busca).'%"' : null,
   strlen($FiltroStatus) ? 'enum = "'.$FiltroStatus.'"' : null 
];

$condicoes = array_filter($condicoes);

 //clausula where
$where = implode(' AND ',$condicoes);

//obetem categoria
$Vagas = Vaga::getVagas($where);


    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/listagem.php';
    require __DIR__.'/includes/footer.php';
    
    ?>