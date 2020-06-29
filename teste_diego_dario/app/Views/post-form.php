<div class="modal fade" id="modalPostForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">O que está acontecendo?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/insertpost" method="post">
                <div class="modal-body mx-3">

                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input name="title" type="text" id="title" class="form-control validate" require>
                        <label data-error="wrong" data-success="right" for="title">Título</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="description" name="description" class="md-textarea form-control" rows="4"></textarea>
                        <label data-error="wrong" data-success="right" for="description">Sua Mensagem</label>
                    </div>

                    <input type="hidden" id="img_url" name="img_url" value="http://lorempixel.com/600/400/sports">
                    <input type="hidden" id="author_id" name="author_id" value="<?= session('id'); ?>">

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" value="submit">Publicar <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>