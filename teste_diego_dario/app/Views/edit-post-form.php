<?php
    $postsId = array('id' => '13' );
?>
<div class="modal fade" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Alterar Post <?=$posts[0]['post_id']?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ."/editpost/".$posts[0]['post_id'] ?> method="post">
                <div class="modal-body mx-3">

                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input name="title" type="text" id="title" class="form-control validate" require value="<?= $posts[0]['title'] ?>">
                        <label data-error="wrong" data-success="right" for="title">Título</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input name="img_url" type="text" id="img_url" class="form-control validate" require value="<?= $posts[0]['img_url'] ?>">
                        <label data-error="wrong" data-success="right" for="img_url">Imagem Source</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="description" name="description" class="md-textarea form-control" rows="4"><?= $posts[0]['description'] ?></textarea>
                        <label data-error="wrong" data-success="right" for="description">Sua Mensagem</label>
                    </div>

                    <input type="hidden" id="author_id" name="author_id" value="<?= session('id'); ?>">

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" value="submit">Salvar Edição <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>