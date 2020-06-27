<?= $this->extend('/common/default_layout') ?>
<?= $this->section('content') ?>
<style>
    .collapse-content .fa.fa-heart:hover {
        color: #f44336 !important;
    }

    .collapse-content .fa.fa-share-alt:hover {
        color: #0d47a1 !important;
    }
</style>
<!-- Modal Form Post -->
<?= view('post-form') ?>

<!-- Modal Form Edit -->
<?= view('edit-post-form') ?>

<!-- Button Modal -->
<div class="row mt-3" style="margin: 0 auto; display: flex; justify-content: center;">
    <a class="col-md-3 btn btn-primary btn-lg" data-toggle="modal" data-target="#modalPostForm">Crie uma postagem</a>
</div>

<!--Grid row-->
<div class="row mb-4" style="margin: 0 auto; display: flex; justify-content: center;">
    <!--Grid column-->
    <?php foreach ($posts as $post) : ?>
        <div class="col-md-5 mb-5 mt-5 ml-2" id="<?= $post['post_id'] ?>">
            <!-- Card -->
            <div class="card promoting-card">
                <!-- Card content -->
                <div class="card-body d-flex flex-row">
                    <!-- Avatar -->
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
                    <!-- Content -->
                    <div>
                        <!-- Title -->
                        <h4 class="card-title font-weight-bold mb-2"><?= $post['title'] ?></h4>
                        <!-- Date -->
                        <p class="card-text"><i class="far fa-clock pr-2"></i><?= date('d/m/Y H:i', strtotime($post['created_at'])) ?> @<?= $post['name'] ?></p>
                    </div>
                </div>
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top rounded-0" src="<?= $post['img_url'] ?>" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!-- Card content -->
                <div class="card-body">
                    <div class="collapse-content">
                        <!-- Text -->
                        <p class="card-text">
                            <?= $post['description'] ?>
                        </p>
                        <!-- Button -->
                        <?php if ($post['email'] == session()->get('email')) : ?>
                            <a data-toggle="modal" data-target="#modalEditForm">
                                <i class="fas fa-edit text-muted float-left p-1 my-1" data-toggle="tooltip" data-placement="top" title="Edit this post">
                                </i>
                            </a>
                            <a href="#!">
                                <i class="fas fa-trash text-muted float-left p-1 my-1" data-toggle="tooltip" data-placement="top" title="Remove this post">
                                </i>
                            </a>
                        <?php endif; ?>
                        <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                        <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
    <?php endforeach; ?>
</div>
<!--Grid row-->
<?= $this->endSection() ?>