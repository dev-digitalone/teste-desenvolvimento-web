<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">

    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
          crossorigin="anonymous">

    <title>User session</title>
</head>

<body>
    <?php $mysession = session()->get('name'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">User session</a>
        <button class="navbar-toggler" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarNavAltMarkup" 
                aria-controls="navbarNavAltMarkup" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" 
                       href="<?php echo ($mysession == "admin") ? 
                        base_url('adminsession') : 
                        base_url('customersession'); ?>">
                       Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
                </li>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <span class="navbar-text">
                <?php echo ($mysession == "admin") ? "ADMINISTRATION" : "Mr." . $mysession ?>
            </span>
        </div>
    </nav>