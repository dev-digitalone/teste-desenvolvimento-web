<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $title;?></title>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>"/>
    </head>

    <body>


        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a href="<?php echo base_url(); ?>" class="navbar-brand">HOME</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <?php if(!empty($this->session->email)):?>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Gerenciar Usuários') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('panel/user_list');?>">Gerenciar Usuários</a></li>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Gerenciar Publicações') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('panel/post_list');?>">Gerenciar Publicações</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login/logout');?>">Sair</a></li>
                            <?php elseif(empty($this->session->email)):?>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Registrar') ? 'active"' : '';?>"><a class="nav-link" href="<?php echo base_url('register');?>">Registrar</a></li>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Login') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('login');?>">Login</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <div class="container-fluid">