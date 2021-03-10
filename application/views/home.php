<div class="container-fluid post-area">
    <?php if(isset($posts) && !empty($posts)):?>
        <?php foreach($posts as $post):?>
            <div class="card post">
                <img class="card-img-top" src="<?php echo $post['img_url'];?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['title'];?></h5>
                    <div class="card-text"><?php echo $post['description'];?></div>
                    <span class="post-author">Publicado por: <?php echo $post['author_name'];?></span>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>


