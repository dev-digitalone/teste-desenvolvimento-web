<?php
session_start();

function MensagemDeErro()
{
  if (isset($_SESSION["MensagemDeErro"])) {
    $msg = "<div class=\"alert alert-danger\">";
    $msg .= htmlentities($_SESSION["MensagemDeErro"]);
    $msg .= "</div>";
    $_SESSION["MensagemDeErro"] = null;
    return $msg;
  }
}

function Sucesso()
{
  if (isset($_SESSION["Sucesso"])) {
    $msg = "<div class=\"alert alert-success\">";
    $msg .= htmlentities($_SESSION["Sucesso"]);
    $msg .= "</div>";
    $_SESSION["Sucesso"] = null;
    return $msg;
  }
}
