<?= $this->extend('/common/default_layout') ?>
<?= $this->section('content') ?>

<!-- Forgot Pass -->
<section class="mb-5 ">
    <h2 class="h6-responsive font-weight-bold text-center my-4">Resetar Password</h2>
    <form class="text-center" action="resetlink" method="post">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="form-group col-md-5 mb-5 ">
                <div class="md-form mb-0">
                    <input type="email" id="name" name="email" class="form-control">
                    <label for="email"><h5>Seu melhor E-mail</h5></label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-md-2" name="submit">Submit</button>
    </form>
</section>
<?= $this->endSection() ?>