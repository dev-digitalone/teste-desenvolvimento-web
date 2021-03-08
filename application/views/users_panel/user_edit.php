<a class="btn btn-primary" href="<?php echo base_url('panel');?>">Voltar</a>
<br>
<?php echo validation_errors(); ?>
<br/>
<div class="panel panel-default">
    <div class="panel-heading">Dados do Usuário</div>
    <?php echo form_open("panel/user_edit/$id", array('class' => 'panel-cadastrar')) ?>
        <div class="input-group">
            <label for="name">Nome</label>
            <input required type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>"/>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input required type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>"/>

        </div>
        <div class="input-group">
            <label for="pass">Senha</label>
            <input required type="password" class="form-control" name="pass" id="pass" value="<?php echo $password;?>"/>
        </div>
        <br/>
        <input type="submit" class="btn btn-default" value="Alterar"/>
    </form>
</div>