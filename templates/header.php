<header class="header">
    <div class="header-wrapper">
        <div class="header-logo">
            <a href="/">Wonders World</a>
        </div>

        <nav class="nav">
            <div>
                <ul class="nav__container">
                    <li class="nav__container__item"><a class="container__item-link" href="#">Categories</a></li>
                    <li class="nav__container__item"><a class="container__item-link" href="/random-wonder.php">Random Wonder</a>
                    </li>
                </ul>
            </div>
            <?php if(empty($_SESSION['auth'])) :?>
            <div class="nav__sing-in">
                <a href="/sign-in.php">Sign in</a>
                <a href="/sign-in.php">Register</a>
            </div>
<?php else: ?>
            <div class="nav__sing-in">
                <a href="/admin.php"><?php echo $_SESSION['user_login']?></a>
                <a href="/sign-out.php">Sign out</a>
            <?php endif;?>

        </nav>
    </div>
</header>