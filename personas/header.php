<header>
    <div class="container">
        <nav class="nav">
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </div>
            <?php

            $rol = $_SESSION["rol"];


            if ($rol == 1) {
                ?>
                <a href="../php/rolFuncionario/indexfuncionario.php" class="logo">SENA SST</a>

                <?php
            } elseif ($rol == 4) {
                ?>
                <a href="../php/rolFuncionario/indexadministrador.php" class="logo">SENA SST</a>
                <?php
            }
            ?>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="indexbrigad.php" class="nav-link ">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="indexbrigad.php" class="nav-link active">Brigadistas</a>
                </li>

            </ul>
        </nav>
    </div>
</header>
<section class="heroo" id="heroo">
    <div class="container">
        <h2 class="h2-sub">
            <span class="fil">B</span>ienvenido a:
        </h2>
        <h1 class="head">Brigadistas</h1>
        <div class="he-des">
            <h5></h5>

        </div>
    </div>
</section>