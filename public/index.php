<?
session_start();
require '../connect/connect.php';
require_once '../vendor/autoload.php';
require 'mail.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12 category-content">
                <h1 class="section-title">registration</h1>
                <div class="row">

                    <div class="col-md-12 mb-5">
                        <form action="" class="" method="post">
                         
                            <div class=" mb-3 ">
                                <input type="text" name="name" class="form-control" placeholder="имя">
                            </div>
                            <div class=" mb-3 ">
                                <input type="text" name="age" class="form-control" placeholder="возраст">
                            </div>
                            <div class=" mb-3 ">
                                <input type="text" name="phone" class="form-control" placeholder="формат номера +7900000000">
                            </div>
                            
                            <div class="form-check mb-3 d-flex align-items-center">
                                <input class="form-check-input p-3 me-3" type="checkbox" name="check" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <a target="_blank" href="policy.php">Согласие на обработку персональных данных</a>
                                </label>
                            </div>
                            <button class="btn btn-success w-25" type="submit">enter</button>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <? if (!empty($_SESSION['errors'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['errors'];
                                unset($_SESSION['errors']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        <? } ?>
                        <? if (!empty($_SESSION['success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>