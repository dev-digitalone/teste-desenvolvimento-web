<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>

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
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-it\em">
        <a class="nav-link" href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>">Perfil</a>
      </li>
    </ul>
    <?php if (isset($_SESSION["Username"])) : ?>
      <form class="form-inline my-2 my-lg-0 input-group-sm ">
        <a href="Logout.php" class="btn btn-danger mx-3 btn-sm" type="submit">Log out</a>
        <a href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>" class="mr-3"><?php echo $_SESSION["Username"] ?></a>
      </form>
    <?php else : ?>
      <form class="form-inline my-2 my-lg-0 input-group-sm ">
        <a href="Cadastro.php" class="btn btn-primary mx-3 btn-sm" type="submit">Cadastre-se</a>
        <a href="Login.php" class="mr-3">Entrar</a>
      </form>
    <?php endif; ?>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Digite aqui" aria-label="Pesquisar">
      <button class="btn btn-light my-2 my-sm-0 btn-sm" type="submit">Pesquisar</button>
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
          $Inc = 0;
          if (isset($_GET["search"])) {
            $Search = $_GET["search"];
            $sql = "SELECT * FROM posts WHERE title LIKE :search";
            $stmt = $ConectarDB->prepare(($sql));
            $stmt->bindValue(":search", "%" . $Search . "%");
            $stmt->execute();
          } else {
            $sql = "SELECT * FROM posts ORDER BY created_at desc";
            $stmt = $ConectarDB->query($sql);
          }
          while ($Dados = $stmt->fetch()) {
            $PostID = $Dados["ID"];
            $Title = $Dados["title"];
            $Description = $Dados["description"];
            $Image = $Dados["img_url"];
            $Date = $Dados["created_at"];
            $Author = $Dados["author"];
            $Inc++
          ?>
            <tbody>
              <tr>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostID ?>"><?php echo $Inc; ?></a></td>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostID ?>"><?php echo $Title; ?></td>
                <td><a class="text-dark" href="PostCompleto.php?id=<?php echo $PostID ?>">
                    <?php
                    if (strlen($Description) > 40) $Description = substr($Description, 0, 30) . "...";
                    echo $Description;
                    ?></a></td>
                <td><img src="Uploads/<?php echo $Image; ?>" width="100px" alt=""></td>
                <td><?php echo $Date; ?></td>
                <td><?php echo $Author; ?></td>
                <td>
                  <!-- <button type="button" class="btn btn-link btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
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