<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="assets/img/headerhome.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <header class="<?php echo $currentPage ?>"> 
        <h1 class="hidden"><?php echo $currentPage?></h1>
        <nav class="header__nav position">
            <a href="index.php?page=movie-detail"><img src="assets/img/logo.png" alt="logo de wakkere paling"></a>
            <ul class="nav__list__items">
                <li class="nav__list__item" > 
                    <a class="list__item__link link--border <?php if($currentPage == 'home') echo 'item__link--active' ?>"  href="index.php">Home  </a>
                </li>
                <li class="nav__list__item" >
                    <a class="list__item__link link--border <?php if($currentPage == 'events') echo 'item__link--active' ?>" href="index.php?page=events">Events </a>
                </li>
                <li class="nav__list__item" >
                    <a class="list__item__link link--border <?php if($currentPage == 'scorebord') echo 'item__link--active' ?>" href="index.php?page=scorebord&amp;set=1">Scorebord</a>
                </li>
            </ul>
        </nav>

    <?php echo $content; ?>

    <footer>
        <section>
            <h2 class="hidden">footer</h2>
            <article class="footer__A">
                <div class="footer__A__box">
                    <h3 class="hidden">footer deel1</h3>
                    <ul class="footer__list__items">
                        <li>Links</li>
                        <li><a class="footer__item__link item__link--links" href="index.php?page=index">Home</a></li>
                        <li><a class="footer__item__link item__link--links" href="index.php?page=events">Events</a></li>
                        <li><a class="footer__item__link item__link--links" href="index.php?page=scorebord&amp;set=1">Scorebord</a></li>
                    </ul>

                    <ul class="footer__list__items">
                        <li>Sponser</li>
                        <li class="footer__item__link">Jupoter</li>
                        <li class="footer__item__link">Foxo cooling</li>
                        <li class="footer__item__link">Dricco</li>
                    </ul>

                    <ul class="footer__list__items">
                        <li>Contact</li>
                        <li class="footer__item__link">tel: &#43;32475342345</li>
                        <li class="footer__item__link">fax: +3237534234</li>
                        <li class="footer__item__link">email: dewakkere@paling.be</li>
                    </ul>

                    <div>
                        <a class="socialmedia__link" href="https://twitter.com/?lang=nl" target="_blank"><img src="assets/img/twitter.png" alt="Twitter"></a>
                        <a class="socialmedia__link" href="https://www.facebook.com/" target="_blank"><img src="assets/img/facebook.png" alt="Facebook"></a>
                        <a class="socialmedia__link" href="https://www.instagram.com/" target="_blank"><img src="assets/img/instagram.png" alt="Instagram"></a>
                    </div>
                </div>
            </article>

            <article class="footer__B">
                <div class="footer__B__box">
                    <h3 class="hidden">footer deel2</h3>
                    <p>&copy; 2019 de wakkere paling . All Rights Reserved</p>
                </div>
            </article>
        </section>
    </footer>
</body>
</html>