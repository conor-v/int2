    <section class="header__box position">
        <div class="header__wrapper">
            <h2 class="header__box__title">Palingtrekken</h2>
            <p class="header__box__text">Bent u op zoek naar een hobby, een manier om
            stoom af te blazen? Dan bent u aan het juiste adres.
            De vereniging heeft een groot assortiment aan events voor u klaarstaan!
            </p>
            <a class="header__box__button" href="index.php?page=events">Check onze events</a>
            <?php if (!empty($_SESSION['info'])) { ?>
                <p class="succes"><?php echo $_SESSION['info'];?></p>
            <?php };?>  
        </div>
        <img src="assets/img/headerhome.png" alt="bloedende paling">
    </section>
</header>

<main>  
    <section class="info">
        <h2 class="hidden">Info deel</h2>
        <article class="info__box position">
            <div class="info__box__text__wrapper">
                <h3 class="info__box__title">Vereniging &#8216;de wakkere paling&#8217;</h3>
                <p class="info__box__text">&#8216;De wakkere paling&#8217; is niet zomaar een vereniging,
                deze staat open voor energieke dertigplussers.
                We organiseren doorheen het jaar top events
                met een grote variatie, dus niet alleen sporten maar ook bv. eten, drinken,...
                De sport is naar een moderner niveau
                getilt voor een betere ervaring.
                </p>
            </div>
            <img src="assets/img/handenillustratie.png" alt="vereniging handen">
        </article>
        <article class="info__box position">
            <img src="assets/img/scrollillustratie.png" alt="scroll met paling er op">
            <div class="info__box__text__wrapper">
                <h3 class="info__box__title">De oorsprong van palingtrekken</h3>
                <p class="info__box__text">Een goede atleet kent de geschiedenis van
                zijn sport. Dit geldt ook voor palingtrekken.
                Het is ontstaan in Amsterdam, daar werd
                een paling boven een rivier gehangen met de bedoeling de
                paling er vanaf te trekken zonder zelf in het water te vallen.
                In de 19de eeuw verbood de overheid dit
                wegens dierengeweld en ontstonden rellen.
                </p>
            </div>
        </article>
    </section>

    <section class="main-event position">
        <article class="main-event__box">
            <h2 class="main-event__box__title">Main event</h2>
            <p class="main-event__box__tekst">Het komt er weer aan, het event waar iedere palingtrekker
            op wacht. De battle royal van het palingtrekken,
            in dit event wordt er een groot opblaas
            parcours geplaatst met op het einde een groot zeil 
            met bruine zeep. Hier moeten de deelnemers vechten 
            of samenwerken voor de paling van de 
            drone te trekken. Je ziet een paar groepen die deelnemen aan het
            event hiernaast afgebeeld. Wees snel en koop je ticket nu.
            </p>
        </article>
    
        <article class="main-event__logos">
            <h2 class="hidden">groep logo's</h2>   
            <img class="logo1" src="assets/groep_logos/steel.png" alt="steel logo">
            <img class="logo2" src="assets/groep_logos/buildforest.png" alt="buildforest logo">
            <img class="logo3" src="assets/groep_logos/scruw.png" alt="scruw logo">
            <img class="logo4" src="assets/groep_logos/bouwbi.png" alt="bouwbi logo">
            <img class="logo5" src="assets/groep_logos/craftype.png" alt="crafttype logo">
            <img class="logo6" src="assets/groep_logos/mannenshvac.png" alt="mannenshvac logo">
            <img class="logo7" src="assets/groep_logos/bellevo.png" alt="bellevo logo">     
        </article>
    </section>

    <section class="ticket">
        <h2 class="ticket__title">Ticket verkoop</h2>
        <div class="position">
            <article class="ticket__box ticket__box__position">
                <h3 class="ticket__box__title">Enkel</h3>
                <p class="ticket__box__prijs">15&#8364;</p>
                <ul class="ticket__list__items ticket__box__position">
                    <li class="ticket__list__item">1 Persoon</li>
                    <li class="ticket__list__item">Toegang tot BBQ</li>
                    <li class="ticket__list__item">1 Gratis pint</li>
                    <li class="ticket__list__item">Toegang tot main event</li>
                </ul>
                <a class="ticket__bestel" href="index.php?page=tickets&amp;type=1">Bestel nu</a>
            </article>

            <article class="ticket__box ticket__box__revers ticket__box__position">
                <h3 class="ticket__box__title">Groep</h3>
                <p class="ticket__box__prijs">140&#8364;</p>
                <ul class="ticket__list__items ticket__box__position">
                    <li class="ticket__list__item">10 Personen</li>
                    <li class="ticket__list__item">Toegang tot BBQ</li>
                    <li class="ticket__list__item">10 Gratis pinten</li>
                    <li class="ticket__list__item">Toegang tot main event</li>
                </ul>
                <a class="ticket__bestel" href="index.php?page=tickets&amp;type=2">Bestel nu</a>
            </article>

            <article class="ticket__box ticket__box__position">
                <h3 class="ticket__box__title">Vip</h3>
                <p class="ticket__box__prijs">35&#8364;</p>
                <ul class="ticket__list__items ticket__box__position">
                    <li class="ticket__list__item">1 Persoon</li>
                    <li class="ticket__list__item">Toegang tot BBQ</li>
                    <li class="ticket__list__item">Gratis eten tijdens event</li>
                    <li class="ticket__list__item">Toegang tot VIP plaatsen</li>
                </ul>
                <a class="ticket__bestel" href="index.php?page=tickets&amp;type=3">Bestel nu</a>
            </article>
        </div>
    </section>
</main>