<a class="btn btn-primary" href="<?php echo base_url('panel/user_register');?>">cadastrar usuário</a>
<br><br>
<div class="panel panel-default">
    <div class="panel-heading">Lista de Usuários</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>nome</th>
                <th>email</th>
                <th>opções</th>
            </tr>
        </thead>

        <tbody>
            <?php if(isset($users) && !empty($users)):?>
                <?php for($c = 0; $c<count($users); $c++):?>
                    <tr>
                        <th scope="row"><?php echo $c+1;?></th>
                        <td><?php echo $users[$c]['name'];?></td>
                        <td><?php echo $users[$c]['email'];?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo base_url('panel/user_edit/'.$users[$c]['id']);?>">editar</a>
                            <a class="btn btn-danger" href="<?php echo base_url('panel/user_delete/'.$users[$c]['id']);?>">excluir</a>
                        </td>
                    </tr>
                <?php endfor;?>
            <?php endif;?>
        </tbody>
    </table>
</div>

