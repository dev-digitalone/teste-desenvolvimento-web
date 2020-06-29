<?php $mysession = session()->get('name'); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <title>Test CI Application - <?php echo $title; ?></title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        button:focus {
            outline: 0;
        }

        .navbar .dropdown-menu .form-control {
            width: 200px;
        }

        .icon-trash:hover {
            color: #f44336 !important;
        }

        .icon-edit:hover {
            color: #0d47a1 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-blog"></i></a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                &#9776;
            </button>
            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="nav navbar-nav pills-success">
                    <li class="nav-item"><a href="<?= base_url() ?>/" class="nav-link">Home</a></li>
                    <?php if (session()->get('email')) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/dashboard" class="nav-link">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>/contact" class="nav-link">Contato</a></li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <?= session()->get('name')
                        ? view('common/header-user', ['mysession' => $mysession])
                        : view('common/header-login')
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Validation -->
    <?php if (\Config\Services::validation()->getErrors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->get('messageRegisterOk')) : ?>
        <div class="alert alert-info" role="alert">
            <?php echo "<strong>" . session()->getFlashdata('messageRegisterOk') . "</strong>"; ?>
        </div>
    <?php endif; ?>

    <?php if (session()->get('loginFail')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "<strong>" . session()->getFlashdata('loginFail') . "</strong>"; ?>
        </div>
    <?php endif; ?>

    <?php if (session()->get('postFail')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "<strong>" . session()->getFlashdata('postFail') . "</strong>"; ?>
        </div>
    <?php endif; ?>

    <!-- Modal Login-->
    <?= view('common/login') ?>

    <!-- Main Container -->
    <div class="main-container" id="main-container">
        <!-- PAGE CONTENT BEGINS -->
        <?= $this->renderSection('content') ?>
        <!-- PAGE CONTENT ENDS -->
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.digitalone.com.br/"> Digital One</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- basic scripts -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>

</html>