<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>

    <?php 
    if (\Config\Services::validation()->getErrors()) { 
    ?>
        <div class="alert alert-danger" role="alert">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (session()->get('messageRegisterOk')) {
    ?>
        <div class="alert alert-info" role="alert">

            <?php echo "<strong>" . session()->getFlashdata('messageRegisterOk') . "</strong>"; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (session()->get('loginFail')) {
    ?>
        <div class="alert alert-danger" role="alert">

            <?php echo "<strong>" . session()->getFlashdata('loginFail') . "</strong>"; ?>
        </div>
    <?php
    }
    ?>

    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url() ?>/loginuser" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username(e-mail):</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="<?php echo base_url() ?>/registration" class="text-info">Register here</a>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>