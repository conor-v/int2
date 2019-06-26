<section class="header__box position">
        <h2 class="ticket_title">Ticket registratie</h2>
    </section>
</header>
<main>
    <section class="ticket__form__box">
        <h3 class="hidden">bestel form</h3>
        <form class="ticket__form" action="index.php?page=tickets&type=<?php echo $_GET['type']?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="insertTicket" />

            <div class="form__wrapper">
                <label class="form__label" for="inputNaam">Naam</label>
                <input class="form__input" type="text" id="inputNaam" name="naam" placeholder="Kevin De laete" required>
                <span class="error"><?php
                if (!empty($errors['name'])) {
                    echo $errors['name'];
                }
                ?></span>
            </div>

            <div class="form__wrapper">
                <label class="form__label" for="inputEmail">Email</label>
                <input class="form__input" type="email" id="inputEmail" name="email" placeholder="KevinDelaete@hotmail.com" required>
                <span class="error"><?php
                if (!empty($errors['email'])) {
                    echo $errors['email'];
                }
                ?></span>
            </div>

            <div class="form__wrapper">
                <label class="form__label" for="inputStraat">Straat + nr</label>
                <input class="form__input" type="text" id="inputStraat" name="straat" placeholder="Beverstraat 55" required>
                <span class="error"><?php
                if (!empty($errors['street'])) {
                    echo $errors['street'];
                }
                ?></span>
            </div>

            <div class="form__wrapper">
                <label class="form__label" for="inputPostcode">Postcode</label>
                <input class="form__input" type="number" id="inputPostcode" name="postcode" placeholder="2000" max="9999" required>
                <span class="error"><?php
                if (!empty($errors['zipcode'])) {
                    echo $errors['zipcode'];
                }
                ?></span>
            </div>

            <div class="form__wrapper">
                <label class="form__label" for="inputGemeente">Gemeente</label>
                <input class="form__input" type="text" id="inputGemeente" name="gemeente" placeholder="Antwerpen" required>
                <span class="error"><?php
                if (!empty($errors['town'])) {
                    echo $errors['town'];
                }
                ?></span>
            </div>

            <?php if ($_GET['type'] == 2){?>
            <div class="form__wrapper">
                <label class="form__label" for="fileimg">upload bedrijfs logo</label>
                <input type="file" id="fileimg" name="image">
                <span class="error"><?php
                    if (!empty($fileError)) {
                        echo $fileError;
                    }
                    ?></span>
            </div>
            <?php }?>

            <div class="form__checkbox">
                <input type="checkbox" name="18+" value="18+" required><span class="checkbox__span">U bent 18+ of ouder</span>
                <span class="error"><?php
                if (!empty($errors['18+'])) {
                    echo $errors['18+'];
                }
                ?></span>
            </div>

            <input class="form__submit" type="submit" value="Bestellen">
        </form>
        <script src="js/validate.js" ></script>
    </section>
</main>