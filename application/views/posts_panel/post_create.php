<a class="btn btn-primary" href="<?php echo base_url('panel/post_list');?>">Voltar</a>
<br>
<?php echo validation_errors(); ?>
<br/>
<div class="panel panel-default">
    <div class="panel-heading">Inserir Imagem</div>
    <?php echo form_open('panel/post_create', array('class' => 'panel-cadastrar')) ?>
        <div class="input-group">
            <label for="title">Title</label>
            <input required type="text" class="form-control" name="title" id="title"/>
            <span class="text-danger"><?php echo form_error('title'); ?></span>
        </div>
        <div class="input-group">
            <label for="description">Descrição</label>
            <input required type="text" class="form-control" name="description" id="description"/>
            <span class="text-danger"><?php echo form_error('description'); ?></span>
        </div>
        <div class="input-group">
            <label for="img_url">URL Imagem</label>
            <input required type="text" class="form-control" name="img_url" id="img_url"/>
            <span class="text-danger"><?php echo form_error('img_url'); ?></span>
        </div>
        <br/>
        <input type="submit" class="btn btn-default" value="Inserir"/>
    </form>
</div>

