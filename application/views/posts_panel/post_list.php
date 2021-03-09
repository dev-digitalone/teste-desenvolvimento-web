<a class="btn btn-primary" href="<?php echo base_url('panel/post_create');?>">Criar Públicação</a>
<br><br>
<div class="panel panel-default">
    <div class="panel-heading">Lista de Postagens</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>título</th>
                <th>autor</th>
                <th>criado em</th>
                <th>opções</th>
            </tr>
        </thead>

        <tbody>
            <?php if(isset($posts) && !empty($posts)):?>
                <?php for($c = 0; $c<count($posts); $c++):?>
                    <tr>
                        <th scope="row"><?php echo $c+1;?></th>
                        <td><?php echo $posts[$c]['title'];?></td>
                        <td><?php echo $posts[$c]['author_name'];?></td>
                        <td><?php echo $posts[$c]['created_at'];?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo base_url('panel/post_edit/'.$posts[$c]['id']);?>">editar</a>
                            <a class="btn btn-danger" href="<?php echo base_url('panel/post_delete/'.$posts[$c]['id']);?>">excluir</a>
                        </td>
                    </tr>
                <?php endfor;?>
            <?php endif;?>
        </tbody>
    </table>
</div>

