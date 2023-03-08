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

<!-- TODO: find out how templates get referenced -->

<body>

    <!-- <header>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
        </ul>
    </header> -->

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

                            <a class="nav-link text-light" href="/">Home</a>
                        </li>

                        <?php if (Session::get('user') === null) : ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/login">Login</a>
                            </li>
                        <?php endif ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="/login/basket">Basket</a>
                        </li> -->


                    </ul>

                    <?php if (Session::get('user') !== null) : ?>
                        <div class="text-light">
                            <div>
                                <?php
                                echo Session::get('user')["NAME"];
                                ?>

                            </div>
                            <a href="/users?action=logout">logout</a>
                        </div>
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

    <footer class="footer pt-3 text-center">
        Copyright by Gana 2023
    </footer>
</body>

</html>