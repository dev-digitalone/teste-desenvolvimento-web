<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalDeletePost<?=$indice?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Deletar post <?=$posts[$indice]['title']?>?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="<?= base_url()."/deletepost/".$posts[$indice]['post_id'] ?>" class="btn  btn-outline-danger">Sim</a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Não</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->