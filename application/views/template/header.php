<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $title;?></title>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body class="text-white bg-secondary" id="background">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a href="<?php echo base_url(); ?>" class="navbar-brand">HOME</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse w-100 order-1 order-md-0" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto">
                            <?php if(!empty($this->session->email)):?>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Gerenciar Usuários') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('panel/user_list');?>">Gerenciar Usuários</a></li>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Gerenciar Publicações') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('panel/post_list');?>">Gerenciar Publicações</a></li>
                            <?php endif;?>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <?php if(empty($this->session->email)):?>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Registrar') ? 'active"' : '';?>"><a class="nav-link" href="<?php echo base_url('register');?>">Registrar</a></li>
                            <li class="nav-item <?php echo (!empty($title) && $title == 'Login') ? 'active' : '';?>"><a class="nav-link" href="<?php echo base_url('login');?>">Login</a></li>
                            <?php endif;?>
                            <?php if(!empty($this->session->email)):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->email;?></a>
                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url('login/logout');?>">Sair</a>
                                </div>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <br/>
    <div class="container-fluid" id="background">