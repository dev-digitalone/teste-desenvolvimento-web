<?php require_once("Includes/DB.php") ?>
<?php require_once("Includes/Functions.php") ?>
<?php require_once("Includes/Sessions.php") ?>
<?php ConfirmacaoDeLogin(); ?>

<?php
$PostId = $_GET["id"];

if (isset($_POST["Submit"])) {
  $Title = $_POST["Title"];
  $Post = $_POST["Description"];
  $Author =  $_SESSION["Username"];
  $Image = $_FILES["Image"]["name"];
  $Target = "Uploads/" . basename($_FILES["Image"]["name"]);

  date_default_timezone_set("America/Sao_Paulo");
  $CurrentTime = time();
  $DateTime = strftime("%d/%b/%Y", $CurrentTime);

  if (empty($Title & $Post)) {
    $_SESSION["MensagemDeErro"] = "Preencha todos os campos corretamente.";
    Redirect("Perfil.php");
  };

  if (strlen($Title & $Post) < 10) {
    $_SESSION["MensagemDeErro"] = "Campo muito curto, mínimo de 10 caracteres.";
    Redirect("Perfil.php");
  }

  if (strlen($Title) >= 50) {
    $_SESSION["MensagemDeErro"] = "Campo muito longo, máximo de 50 caracteres.";
    Redirect("Perfil.php");
  }

  if (strlen($Post) >= 1000) {
    $_SESSION["MensagemDeErro"] = "Campo muito longo, máximo de 1000 caracteres.";
    Redirect("Perfil.php");
  } else {
    $ConectarDB;

    $sql = "UPDATE posts SET title='$Title',  description='$Post' WHERE id='$PostId'";

    $Executar = $ConectarDB->query($sql);
    // move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

    if ($Executar) {
      $_SESSION["Sucesso"] = "Post atualizado com sucesso!";
      Redirect("Perfil.php");
    } else {
      $_SESSION["MensagemDeErro"] = "Erro";
    }
  }
};

?>

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
        <a class="nav-link" href="Perfil.php?author=<?php echo $_SESSION["Username"] ?>">Perfil<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 input-group-sm ">
      <a href="Logout.php" class="btn btn-danger mx-3 btn-sm" type="submit">Log out</a>
      <a href="Perfil.php?author=<?php echo $_SESSION['Username'] ?>" class="mr-3"><?php echo $_SESSION["Username"] ?></a>
    </form>
    </ul>
  </nav>

  <div class="card">
    <div class="card-body">
      <p class="card-text">Editar post</p>
    </div>
  </div>

  <section class="container py-2 mb-4">
    <?php
    echo MensagemDeErro();
    echo Sucesso();

    $ConectarDB;
    $sql = "SELECT * FROM posts WHERE id=$PostId";
    $stmt = $ConectarDB->query($sql);
    while ($Dados = $stmt->fetch()) {
      $EditarTitulo = $Dados["title"];
      $EditarImage = $Dados["img_url"];
      $EditarDescricao = $Dados["description"];
    }

    ?>
    <div class="form-group row">
      <form action="Editar.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="Title">Título: </label><br>
          <input value="<?php echo $EditarTitulo ?>" class="form control" id="Title" name="Title" type="text">
        </div>
        <div class="form-group">
          <label for="Description">Descrição: </label><br>
          <textarea id="Description" name="Description" class="form-control" aria-label="With textarea"><?php echo $EditarDescricao ?></textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="Image" id="Image">
          <label class="custom-file-label" for="Image">Arquivo</label>
        </div><br>
        <button name="Submit" type="Submit" class="mt-2 btn btn-sm btn-primary">Enviar</button>
        <button type="button" class="mt-2 btn btn-sm btn-primary">Voltar</button>
    </div>
    </form>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>