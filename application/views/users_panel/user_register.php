<a class="btn btn-dark" href="<?php echo base_url('panel');?>">Voltar</a>
<br>
<br/>
<div class="card text-white bg-dark">
    <div class="card-body">
        <h5 class="card-title">Dados do Usuário</h5>
        <?php echo form_open('panel/user_register', array('class' => 'panel-cadastrar')) ?>
            <div class="form-group">
                <label for="name">Nome</label>
                <input required type="text" class="form-control" name="name" id="name"/>
                <span class="text-danger"><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" name="email" id="email"/>
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input required type="password" class="form-control" name="password" id="password"/>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
             <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" name="passconf" class="form-control"/>
                <span class="text-danger"><?php echo form_error('passconf'); ?></span>
             </div>
            <br/>
            <input type="submit" class="btn btn-primary" value="Cadastrar"/>
        </form>
    </div>
</div>

