<section class="header__box position">
        <div class="header__wrapper">
            <h1 class="header__box__title">Deelnemen is <span class="header__span--size">beter dan winnen</span></h1>
            <p class="header__box__text">
            Bestel een ticket en kom in ons scorebord te staan.
            Probeer de beste tijd neer te zetten en na het main event
            komt je score online te staan.
            </p>
        </div>
        <img class="header__troffee__img" src="assets/img/leaderbord.png" alt="een 1 2 3 podium met troffee">
    </section>
</header>
<main>
    <section>
        <h2 class="hidden">scorebord</h2>
        <article class="score__paneel position">
            <h3 class="hidden">scorebord header</h3>
            <!-- DATA UIT DB -->
            <p><?php if ($_GET['set'] == 1){
                echo "1 - 15 ";
            } else {
                echo "16 - " . $totaal['totaal'] ;
            }
            ?> van de <?php echo $totaal['totaal'] ?></p>
            <div class="pagina__score__wrapper">
                <p>pagina</p>
                <a class="pagina__score__link <?php if ($_GET['set'] == 1) echo 'score__link--active'?>" href="index.php?page=scorebord&amp;set=1">1</a>
                <a class="pagina__score__link <?php if ($_GET['set'] == 2) echo 'score__link--active'?>" href="index.php?page=scorebord&amp;set=2">2</a>
            </div>
        </article>
        
        <article class="scorebord__box">
            <h3 class="hidden">scorebord info</h3>
            <?php
            $offset = 0;
            if($_GET['set'] == 2){
                $offset = 15;
            }
            foreach($scores as $num=>$score ): ?>
            <div class="scorebord__ranking">
                <p>#<?php $num ++; 
                echo ($offset + $num); ?></p>
                <img src="<?php if ($score['type'] == 'enkel'){
                    echo 'assets/img/enkel.png';
                }else {
                    echo 'assets/img/groep.png';
                } ?>" alt="enkel">
            </div>

            <div class="scorebord__info">
                <div class="scorebord__info__wrapper">
                    <img class="scorebord__info__image" src="<?php if ($score['img_pad'] == '/' || $score['img_pad'] == 'assets/groep_logos/'){
                        echo 'assets/icons/replace.png';
                    } else {
                        echo $score['img_pad'];
                    }
                    ?>" 
                    alt="<?php if ($score['img_pad'] == '/' || $score['img_pad'] == 'assets/groep_logos/'){
                        echo 'geen logo';
                    } else {
                        echo $score['name'];
                    }
                    ?>">
                    <p class="scorebord__info__naam"><?php echo $score['name'] ?></p>
                </div>
                <p class="scorebord__info__text"><?php echo $score['score'] ?></p>
            </div>
            <?php endforeach; ?>
        </article>
        <img class="scorebord__img_footer" src="assets/background/scorefooter.png" alt="groene blob footer">
    </section>
</main>