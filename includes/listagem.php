<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
        default:
            # code...
            break;
    }
}
?>

<section>
    <form method="get">
        <div class="row">
            <div class="col">
                <label>buscar</label>
                <input type="text" name="busca" class="form-control" value="<?=$busca?>">
            </div>
            <div class="col">
                <label>status</label>
                <select name="status" class="form-control">
                    <option value="">Ativa/Inativa</option>
                    <option value="s" <?=$FiltroStatus == 's' ? 'selected' : '' ?>>Ativo</option>
                    <option value="n" <?=$FiltroStatus == 'n' ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            <div class="col d-flex align-items-end">
                <button type="submit" class="btn btn-primary">filtrar</button>
            </div>
        </div>
    </form>
</section>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>


<section>
    <a href="cadastrar">
        <button class="btn btn-success">Cadastrar</button>
    </a>
    <?php if(count($vagas) == 0) { ?>
        <div class="alert alert-secondary mt-3"> Nenhuma vaga encontrada </div>
    <?php } else { ?>
            <table class="table bg-light mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th> <!-- Para editar e excluir -->
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($vagas as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->titulo; ?></td>
                            <td><?php echo $value->descricao; ?></td>
                            <td><?php echo date('d/m/y - H:i:s', strtotime($value->data)); ?></td>
                            <td><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>

                                <a href="excluir.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
</section>