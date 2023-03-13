<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="/css/base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>
        <?= Config::get('site') ?>
    </title>
</head>

<body>
    <header>

        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <nav class="navbar bg-body-tertiary">
                    <div class="container">
                        <a class="navbar-brand" href="#">

                        </a>
                    </div>
                </nav>
                <div class="collapse navbar-collapse d-flex" id="navbarNavDropdown">
                    <ul class="nav flex-grow-1">
                        <li class="nav-item">

                            <a class="nav-link text-light" href="/">Products</a>
                        </li>

                        <?php if (Session::get('user') !== null) : ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/orders">Orders</a>
                            </li>
                        <?php endif ?>



                    </ul>

                    <?php if (Session::get('user') !== null) : ?>
                        <div class="text-light d-flex">
                            <a class="m-2 p-2 btn btn-primary" href="/orders/confirm">
                                Cart:
                                <?php
                                echo count(Session::get('cart'));
                                ?>
                            </a>
                            <p class=" m-2 p-2">
                                <?php
                                echo Session::get('user')["id"];
                                ?>
                            </p>
                            <p class="m-2 p-2">
                                <?php
                                echo Session::get('user')["NAME"];
                                ?>
                            </p>
                        </div>
                        <a href="/users?action=logout" class="me-2 btn btn-primary">logout</a>
                    <?php else : ?>
                        <a class="nav-link text-light" href="/login">Login</a>
                    <?php endif ?>
                </div>
            </div>
        </nav>

    </header>

    <main class="container mt-5 d-flex">
        <div class="flex-grow-1">
            <?php if (Session::hasMessage()) : ?>
                <div class="alert alert-info" role="alert">
                    <?= Session::flash(); ?>
                </div>
            <?php endif ?>

            <!-- html ruu template-g render hiih func-->
            <?= $data['site_html_content'] ?>

        </div>
    </main>

    <footer class="footer pt-3 text-center" style="position:fixed">
        Copyright by Gana 2023
    </footer>
</body>

</html>