{
    const init = () => {
      let $button = document.querySelector('.filter__form__submit');
      $button.classList.add('has-js');

      $season = document.querySelector('.filter__season');

      if ($season) {
        $season.addEventListener(`change`,handleSeasonFilter);
      }
      
      const $rad = document.filterform.categorie;

      for (let i = 0; i < $rad.length; i++){
        $rad[i].addEventListener(`change`,handleCategorieFilter);
      }
    }

    //2 EVENT LISTENER FUNCTIES DIE DOOR VERWIJZEN
    const handleSeasonFilter = e => {
      getEvents();
    }

    const handleCategorieFilter = e => {
      getEvents();
    }

    //GET_EVENTS
    const getEvents = async () => {
      const $error = document.querySelector('.error');
      const filterForm = document.filterform;
      const data = new FormData(filterForm);
      const entries = [...data.entries()];
      const qs = new URLSearchParams(entries).toString();
      const url = `${filterForm.getAttribute('action')}?${qs}`;
     
      const response = await fetch(url, {
        headers: new Headers({
          Accept: 'application/json'
        })
      });
      const events = await response.json();
      window.history.pushState({},'', url);
      showEvents(events);
      if (events.length === 0){
        $error.innerHTML = 'Er zijn geen events gevonden!';
      }else {
        $error.innerHTML = '';
      }
    }

    //SHOW_EVENTS
    const showEvents = data => {
      const $container =  document.querySelector('.events__box');
      
      if ($container.innerHTML != "") {
        $container.innerHTML = "";
      }

      data.forEach(function(event) {
        MakeEvent(event);
      })
    }

    //MAKE_EVENT 
    const MakeEvent = event => {
      const $container =  document.querySelector('.events__box');

      //ARTICLE
      const $article = document.createElement('article');
      $article.className = 'events__box__event'
      $container.appendChild($article);

      //IMG
      const $img = document.createElement('img');
      $img.src = `${event['img_pad']}`;
      $img.alt = `${event['name']}`;
      $img.className = 'box__event__img';
      $article.appendChild($img);

      //H3
      const $h3 = document.createElement('h3');
      $h3.className = 'box__event__tilte';
      $h3.innerHTML = `${event['name']}`;
      $article.appendChild($h3);

      //DIV
      const $div = document.createElement('div');
      $div.className = 'event__seca__wrapper';
      $article.appendChild($div);

      //P : SEASON
      const $pSeas = document.createElement('p');
      $pSeas.className = 'event__seca';
      $pSeas.innerHTML = `${event['season']}`;
      $div.appendChild($pSeas);

      //P : CATEGORIE
      const $pcate = document.createElement('p');
      $pcate.className = 'event__seca';
      $pcate.innerHTML = `${event['categorie']}`;
      $div.appendChild($pcate);

      //A
      const $a = document.createElement('a');
      $a.className = 'event__link';
      $a.innerHTML = 'Meer info';
      $a.href = `index.php?page=details&id=${event['id']}`;
      $article.appendChild($a);

      /*
        <article class="events__box__event">
          <img class="box__event__img" src="<?php echo $event['img_pad'];?>" alt="<?php echo $event['name'];?>">
          <h3 class="box__event__tilte"><?php echo $event['name'];?></h3>
          <div class="event__seca__wrapper">
            <p class="event__seca"><?php echo $event['season'] ?></p>
            <p class="event__seca"><?php echo $event['categorie'] ?></p>
          </div>
          <a class="event__link" href="index.php?page=details&amp;id=<?php echo $event['id'];?>">Meer info</a>
        </article>
      */
    }

    init();
}