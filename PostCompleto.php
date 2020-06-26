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
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <a href="Logout.php" class="btn btn-danger mx-3 btn-sm" type="submit">Log out</a>
      <a href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>" class="mr-3"><?php echo $_SESSION["Username"] ?></a>
    </form>
  </nav>

  <?php
  $ConectarDB;
  $Inc = 0;
  if (isset($_GET["search"])) {
    Redirect("Home.php");
    $Search = $_GET["search"];
    $sql = "SELECT * FROM posts WHERE title LIKE :search";
    $stmt = $ConectarDB->prepare(($sql));
    $stmt->bindValue(":search", "%" . $Search . "%");
    $stmt->execute();
  } else {
    $PostId = $_GET["id"];
    if (!isset($PostId)) {
      Redirect("Home.php");
    }
    $sql = "SELECT * FROM posts WHERE ID=$PostId";
    $stmt = $ConectarDB->query($sql);
  }
  while ($Dados = $stmt->fetch()) {
    $PostID = $Dados["ID"];
    $Title = $Dados["title"];
    $Description = $Dados["description"];
    $Image = $Dados["img_url"];
    $Date = $Dados["created_at"];
    $Author = $Dados["author"];
    $Inc++;
  }
  ?>
  <section class="container py-2 mb-4">
    <?php
    echo MensagemDeErro();
    echo Sucesso();
    ?>

    <div class="row">
      <div class="col-md">
        <div class="card">
          <img width="300px" src="Uploads/<?php echo htmlentities($Image); ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo htmlentities($Title) ?></h3>
            <?php if (!isset($Title)) {
              Redirect("Home.php");
            }
            ?>
            <small class="text-muted"><?php echo htmlentities($Author) ?></small>
            <p class="card-text"><?php echo htmlentities($Description) ?></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>