<div class="card text-white bg-dark">
    <div class="card-body">
    <h5 class="card-title"><?php echo $title;?></h5>
    <?php echo form_open('login', array('class' => 'panel-cadastrar')) ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input required type="email" class="form-control" name="email" id="email"/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input required type="password" class="form-control" name="password" id="senha"/>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>
        <br/>
        <input type="submit" class="btn btn-primary" value="Logar"/>
        <br/>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
        <?php echo '<label class="text-success">'.$this->session->flashdata("message").'</label>';?>
        <br/>
        <a class="text-primary" href="<?php echo base_url('register/recover');?>">Esqueci minha senha</a>
    </form>
    </div>
</div>
