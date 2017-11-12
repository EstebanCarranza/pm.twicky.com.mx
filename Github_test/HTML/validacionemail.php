<?php

$email= $_POST['email'];


if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
  echo("Email valido");
} else {
  echo("Email invalido");
}
?> 
