<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>
<?php ConfirmacaoDeLogin(); ?>


<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>título</title>
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="Home.php">JR</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>" class="nav-link">Perfil</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <a href="Logout.php" class="btn btn-danger mx-3 btn-sm" type="submit">Log out</a>
      <a href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>" class="mr-3"><?php echo $_SESSION["Username"] ?></a>
    </form>
  </nav>

  <div class="container my-3">
    <div class="row">
      <div class="col-md-3">
        <a href="NovoPost.php" class="btn btn-primary btn-block">
          Novo post
        </a>
      </div>
    </div>
  </div>

  <section class="container py-2 mb-4">
    <div class="row">
      <div class="col-lg-12">
        <?php
        echo MensagemDeErro();
        echo Sucesso();
        ?>
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Título</th>
              <th>Post</th>
              <th>Imagem</th>
              <th>Data</th>
              <th>Autor</th>
              <th></th>
            </tr>
          </thead>
          <?php
          $ConectarDB;
          $Author = $_SESSION['Username'];
          $Inc = 0;
          $sql = "SELECT * FROM posts WHERE author='$Author' ORDER BY created_at desc";
          $stmt = $ConectarDB->query($sql);
          $stmt->execute();
          while ($Dados = $stmt->fetch()) {
            $PostId = $Dados["ID"];
            $Title = $Dados["title"];
            $Description = $Dados["description"];
            $Image = $Dados["img_url"];
            $Date = $Dados["created_at"];
            $Inc++
          ?>
            <tbody>
              <tr>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostId ?>"><?php echo $Inc; ?></a></td>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostId ?>"><?php echo $Title; ?></td>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostId ?>">
                    <?php
                    if (strlen($Description) > 40) $Description = substr($Description, 0, 30) . "...";
                    echo $Description;
                    ?></a></td>
                <td><img src="Uploads/<?php echo $Image; ?>" width="100px" alt=""></td>
                <td><?php echo $Date; ?></td>
                <td><?php echo $Author; ?></td>
                <td>
                  <a href="Editar.php?id=<?php echo $PostId; ?>" type="button" class="btn btn-link btn-sm">Edit</a>
                  <a href="Deletar.php?id=<?php echo $PostId; ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>