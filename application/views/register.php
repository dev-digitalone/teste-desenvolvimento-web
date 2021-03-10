<div class="card">
   <div class="card-body">
      <div class="card-title">Cadastro de  Usuário</div>
      <?php echo form_open('register/validation', array('class' => 'panel-cadastrar')) ?>
         <div class="form-group">
            <label>Digite seu Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" />
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
          <div class="form-group">
            <label>Digite um endereço de email válido</label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" />
            <span class="text-danger"><?php echo form_error('email'); ?></span>
         </div>
         <div class="form-group">
            <label>Digite sua senha</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" />
            <span class="text-danger"><?php echo form_error('password'); ?></span>
         </div>
         <div class="form-group">
            <label>Confirme sua senha</label>
            <input type="password" name="passconf" class="form-control" value="<?php echo set_value('password'); ?>" />
            <span class="text-danger"><?php echo form_error('passconf'); ?></span>
         </div>
         <br/>
         <div class="form-group">
            <input type="submit" name="register" value="Cadastrar" class="btn btn-default" />
         </div>
      </form>
   </div>
</div>