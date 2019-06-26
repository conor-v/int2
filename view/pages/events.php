    <section class="header__box position">
        <div class="header__wrapper">
            <h1 class="header__box__title header__box__title--event">De wakkere <br><span class="header__box--font">paling events</span></h1>
            <p class="header__box__text--events">
            We hebben vele evenementen doorheen het jaar met verschillende categorieën.
            Kijk eens rond en kies iets dat jou bevalt.
            </p>
        </div>
        <img class="header__event__img" src="assets/img/bierheader.png" alt="bloedende paling">
    </section>
</header>

<main>
    <section class="form__box">
        <h2 class="hidden">filter opties</h2>

        
        <p class="error">
        <?php if (!empty($_SESSION['error'])) { ?>
        <?php echo $_SESSION['error'];?>
        <?php };?>
        </p>

        <form name="filterform" class="form" action="index.php" method="get">
            <input type="hidden" name="page" value="events" />
            <input type="hidden" name="action" value="filterEvents" />
            <select class="filter__season" name="season">
                <option value="alles" >alle seizoenen</option><?php if(!empty($_GET['season'])){ if($_GET['season'] == 'alles'){echo ' selected';}}?>
                <!-- WAARDES UIT DB HALEN -->
                <?php foreach($seasons as $season): ?>
                    <option value="<?php echo $season['season']; ?>"
                <?php
                    if(!empty($_GET['season'])){
                        if($_GET['season'] == $season['season']){
                        echo ' selected';
                        }
                    }
                ?>
                ><?php echo $season['season']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <label for="alles">
                    <input type="radio" id="alles" name="categorie" value="alles" <?php if (isset($_GET['categorie'])) {if ($_GET['categorie'] == 'alles') {echo ' checked';}}?>>
                    <span class="form__toggle__button">Alles</span>
            </label>
            <!-- WAARDES UIT DB HALEN -->
            <?php foreach($categories as $categorie): ?>
                <label for="<?php echo $categorie['categorie'];?>">
                    <input type="radio" id="<?php echo $categorie['categorie'];?>" name="categorie" value="<?php echo $categorie['categorie'];?>" 
                    <?php if (isset($_GET['categorie'])) {
                        if ($_GET['categorie'] == $categorie['categorie']) {
                            echo ' checked';}}?>>
                    <span class="form__toggle__button"><?php echo $categorie['categorie'];?></span>
                </label>
            <?php endforeach;?>
            <input class="filter__form__submit" type="submit" value="submit">
        </form>
    </section>

    <section>
        <h2 class="hidden">events</h2>
        <!-- MET PHP EN DB OPBOUWEN -->
        <div class="events__box">
        <?php foreach( $events as $event ): ?>
            <article class="events__box__event">
                <img class="box__event__img" src="<?php echo $event['img_pad'];?>" alt="<?php echo $event['name'];?>">
                <h3 class="box__event__tilte"><?php echo $event['name'];?></h3>
                <div class="event__seca__wrapper">
                    <p class="event__seca"><?php echo $event['season'] ?></p>
                    <p class="event__seca"><?php echo $event['categorie'] ?></p>
                </div>
                <a class="event__link" href="index.php?page=details&amp;id=<?php echo $event['id'];?>">Meer info</a>
            </article>
        <?php endforeach?>
        </div>
        <img class="event__img" src="assets/background/eventfooter.png" alt="groene blob eventfooter">
    </section>
    <script src="js/app.js"></script>
</main>