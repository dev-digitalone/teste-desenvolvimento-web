<a class="btn btn-dark" href="<?php echo base_url('panel/post_list');?>">Voltar</a>
<br>
<br/>
<div class="card text-white bg-dark">
    <div class="card-body">
        <h5 class="card-title">Inserir Imagem</h5>
        <?php echo form_open('panel/post_create', array('class' => 'panel-cadastrar')) ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input required type="text" class="form-control" name="title" id="title"/>
                <span class="text-danger"><?php echo form_error('title'); ?></span>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input required type="text" class="form-control" name="description" id="description"/>
                <span class="text-danger"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="img_url">URL Imagem</label>
                <input required type="text" class="form-control" name="img_url" id="img_url"/>
                <span class="text-danger"><?php echo form_error('img_url'); ?></span>
            </div>
            <br/>
            <input type="submit" class="btn btn-primary" value="Inserir"/>
            <br/>
            <br/>
            <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
            <br/>
        </form>
    </div>
</div>

