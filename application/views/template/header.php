<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $title;?></title>
        <!--bootstrap-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>"/>
    </head>

    <body>


        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo base_url(); ?>" class="navbar-brand">HOME</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                        <ul class="nav navbar-nav">
                            <?php if(!empty($this->session->email)):?>
                            <li <?php echo (!empty($title) && $title == 'Gerenciar Usuários') ? 'class="active"' : '';?>><a href="<?php echo base_url('panel/user_list');?>">Gerenciar Usuários</a></li>
                            <li <?php echo (!empty($title) && $title == 'Gerenciar Publicações') ? 'class="active"' : '';?>><a href="<?php echo base_url('panel/post_list');?>">Gerenciar Publicações</a></li>
                            <li><a href="<?php echo base_url('login/logout');?>">Sair</a></li>
                            <?php elseif(empty($this->session->email)):?>
                            <li <?php echo (!empty($title) && $title == 'Registrar') ? 'class="active"' : '';?>><a href="<?php echo base_url('register');?>">Registrar</a></li>
                            <li <?php echo (!empty($title) && $title == 'Login') ? 'class="active"' : '';?>><a href="<?php echo base_url('login');?>">Login</a></li>
                            <?php endif;?>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <div class="container">