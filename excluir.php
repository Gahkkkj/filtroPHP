<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Vaga;
    //Validacao ID  
    if (!isset($_GET['id']) ||!is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

        //consulta vaga
        $obVaga = Vaga::getVaga($_GET['id']);
        
        //Validacao da Vaga
        if(!$obVaga instanceof Vaga) {
            header('location: index.php?status=error');
            exit;
        }   

        //Validacao do post 
        if(isset($_POST['excluir'])) {
            $obVaga->excluir();
            header('location: index.php?status=success');
            exit;
        }
   
    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarexclusao.php';
    require __DIR__.'/includes/footer.php';
    
    ?>