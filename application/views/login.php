<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo $title;?></div>
    <?php echo form_open('login', array('class' => 'panel-cadastrar')) ?>
        <div class="input-group">
            <label for="email">Email</label>
            <input required type="email" class="form-control" name="email" id="email"/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>
        <div class="input-group">
            <label for="pass">Senha</label>
            <input required type="password" class="form-control" name="pass" id="senha"/>
            <span class="text-danger"><?php echo form_error('pass'); ?></span>
        </div>
        <br/>
        <input type="submit" class="btn btn-default" value="Logar"/>
        <br/>
        <br/>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
        <br/>
        <br/>
        <a class="text-primary" href="<?php echo base_url('register/recover');?>">Esqueci minha senha</a>
    </form>
</div>
