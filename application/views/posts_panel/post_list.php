<a class="btn btn-primary" href="<?php echo base_url('panel/post_create');?>">Criar Públicação</a>
<br/>
<br/>
<div class="card text-white bg-dark">
    <div class="card-body table-responsive-sm">
        <h5 class="card-title">Lista de Postagens</h5>
        <table class="table table-striped table-dark table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">título</th>
                    <th scope="col">autor</th>
                    <th scope="col">criado em</th>
                    <th scope="col">opções</th>
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
</div>

