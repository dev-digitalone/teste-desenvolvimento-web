<br/>
<a class="btn btn-primary" href="<?php echo base_url('panel/user_register');?>">Cadastrar Usuário</a>
<br/>
<br/>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Lista de Usuários</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">opções</th>
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
</div>

