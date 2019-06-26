    <section class="detail__header">
        <h2 class="detail__title"><?php echo $event['name'] ?></h2>
        <p class="detail__date"><?php echo $event['date'] ?></p>
    </section>
</header>
<main>
    <section class="detail__box">
        <h3 class="hidden">event details</h3>
        <div class="detail__wrapper">
            <p class="detail__text"><?php echo $event['description'] ?></p>
            <div class="detail__box__seca">
                <p class="detail__seca"><?php echo $event['season'] ?></p>
                <p class="detail__seca"><?php echo $event['categorie'] ?></p>
            </div>
            <a class="detail__link" href="index.php?page=events"> &#8656; terug</a>
        </div>
    </section>
</main>