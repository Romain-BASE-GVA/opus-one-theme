<?php /* Template Name: Agenda */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div data-barba="container" data-barba-namespace="agenda" data-bg="#6E32FF" data-text-color="#fff" data-logo-title="Agenda">
      <!--
        data-bg= Couleur de fond / different pour chaque taxo (humour, spectacle, ....)
        data-text-color= blanc
        data-logo-title= le nom de la taxo (humour, spectacle, ....) ou Agenda si page de l aganda en entier
    -->
    <main class="main main--agenda">
      <div class="filter-bar">
        <div class="filter-events">
          <button class="event-cat-trigger">
            <span class="event-cat-trigger__label">Catégories</span>
            <span class="event-cat-trigger__current-cat">Tout</span>
          </button>
          <div class="event-cat-list">

          <!-- la liste des autres taxo, la taxo actuelle a la class="is-active" -->
            <ul>
              <li><a href="#" title="Tout" class="is-active">Tout</a></li>
              <li><a href="#" title="Concert">Concert</a></li>
              <li><a href="#" title="Spectacle">Spectacle</a></li>
              <li><a href="agenda-humour.html" title="Humour">Humour</a></li>
              <li><a href="#" title="Famille">Famille</a></li>
              <li><a href="#" title="Exposition">Exposition</a></li>
            </ul>

        
          </div>
        </div>
        <div class="search-events">
            <!-- Search input statique, la recherceh se fait sur tous les evenement donc le resulktat de la page rehcerche est la page agenda global, (sans taxonomie)  -->
          <div class="search-events__input-wrapper">
            <input class="search-events__input" type="text" placeholder="Recherche">
          </div>
          <button class="search-events__submit" title="Rechercher">
            <span class="search-events__label">Rechercher</span>
            <span class="search-events__icon">
              <svg class="search-events__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.9 16.9">
                <defs>
                  <style>
                    .cls-1 {
                      fill: #fff;
                      fill-rule: evenodd;
                    }
                  </style>
                </defs>
                <path class="cls-1"
                  d="M16.9,15.49l-4.3-4.3c.9-1.2,1.4-2.66,1.4-4.19,0-1.87-.73-3.63-2.05-4.95C10.62,.73,8.87,0,7,0S3.37,.73,2.05,2.05C-.68,4.78-.68,9.22,2.05,11.95c1.32,1.32,3.08,2.05,4.95,2.05,1.53,0,2.98-.5,4.19-1.4l4.3,4.3,1.41-1.41Zm-9.9-3.49c-1.34,0-2.59-.52-3.54-1.46-1.95-1.95-1.95-5.12,0-7.07,.94-.94,2.2-1.46,3.54-1.46s2.59,.52,3.54,1.46,1.46,2.2,1.46,3.54-.52,2.59-1.46,3.54-2.2,1.46-3.54,1.46Z" />
              </svg>
            </span>
          </button>
        </div>
        <div class="mobile-page-nav"></div>
      </div>
      <!-- chaque mois est encapsuler dans un div -->
      <div class="event-month" data-month-name="Janvier" id="janvier-2022">
        <!-- 
                    data-month-name="Janvier" - nom du mois en capital
                    id="janvier-2022" - mois et annee - lowercase, utiliser pour les ancres
    -->
        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Jan<br>vier</span><!--MOBILE-->
          <span class="event-month__word event-month__word--desktop"><!-- DESKTOP -->
            <span class="event-month__letter">J</span>
            <span class="event-month__letter">a</span>
            <span class="event-month__letter">n</span>
            <span class="event-month__letter">v</span>
            <span class="event-month__letter">i</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">r</span>
          </span>
        </h3>

        <ul class="event-list">
        <!-- Et Ensuite la liste des evenements, certaine info sont la 2x la version mobile et desktop sont legerement different et ne permettaient pas de faire un seul template -->
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time> <!-- date de l'event -->
                  <span class="event__hashtag event__hashtag--mobile">#concert</span> <!-- categorie de l event -->
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li> <!-- le lieux -->
                <li class="event__top-info__item event__top-info__item--availability is-not-available"> <!-- class="is-not-available si pas disponible, is-available si dispo -->
                  <span>Disponible</span> <!-- Dispo, reporte ou annule -->
                </li>
                <!-- la liste des reports -->
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Zaz">Zaz</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Pogo Car Crash Control">Pogo Car Crash Control</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneve</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Angele">Angele</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

        </ul>

      </div>
      <div class="event-month" data-month-name="Mars" id="mars-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Mars</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">M</span>
            <span class="event-month__letter">a</span>
            <span class="event-month__letter">r</span>
            <span class="event-month__letter">s</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Avril" id="avril-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Avril</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">A</span>
            <span class="event-month__letter">v</span>
            <span class="event-month__letter">r</span>
            <span class="event-month__letter">i</span>
            <span class="event-month__letter">l</span>
          </span>
        </h3>

        <ul class="event-list">

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Zaz">Zaz</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Pogo Car Crash Control">Pogo Car Crash Control</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneve</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Angele">Angele</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

        </ul>

      </div>
      <div class="event-month" data-month-name="Mai" id="mai-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Mai</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">M</span>
            <span class="event-month__letter">a</span>
            <span class="event-month__letter">i</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Juin" id="juin-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Juin</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">J</span>
            <span class="event-month__letter">u</span>
            <span class="event-month__letter">i</span>
            <span class="event-month__letter">n</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Juillet" id="juillet-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Juil<br>let</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">J</span>
            <span class="event-month__letter">u</span>
            <span class="event-month__letter">i</span>
            <span class="event-month__letter">l</span>
            <span class="event-month__letter">l</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">t</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Aout" id="aout-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Aout</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">A</span>
            <span class="event-month__letter">o</span>
            <span class="event-month__letter">u</span>
            <span class="event-month__letter">t</span>
          </span>
        </h3>

        <ul class="event-list">

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <?xml version="1.0" encoding="UTF-8"?><svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Zaz">Zaz</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Zurich</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Pogo Car Crash Control">Pogo Car Crash Control</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneve</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Angele">Angele</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>

        </ul>

      </div>
      <div class="event-month" data-month-name="Septembre" id="septembre-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Sept<br>embre</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">S</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">p</span>
            <span class="event-month__letter">t</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">m</span>
            <span class="event-month__letter">b</span>
            <span class="event-month__letter">r</span>
            <span class="event-month__letter">e</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Sold-out</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Octobre" id="octobre-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Oct<br>obre</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">O</span>
            <span class="event-month__letter">c</span>
            <span class="event-month__letter">t</span>
            <span class="event-month__letter">o</span>
            <span class="event-month__letter">b</span>
            <span class="event-month__letter">r</span>
            <span class="event-month__letter">e</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Décembre" id="decembre-2022">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Décem<br>bre</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">D</span>
            <span class="event-month__letter">é</span>
            <span class="event-month__letter">c</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">m</span>
            <span class="event-month__letter">b</span>
            <span class="event-month__letter">r</span>
            <span class="event-month__letter">e</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="event-month" data-month-name="Janvier" id="janvier-2023">

        <h3 class="event-month__title">
          <span class="event-month__word event-month__word--mobile">Janv<br>ier</span>
          <span class="event-month__word event-month__word--desktop">
            <span class="event-month__letter">J</span>
            <span class="event-month__letter">a</span>
            <span class="event-month__letter">n</span>
            <span class="event-month__letter">v</span>
            <span class="event-month__letter">i</span>
            <span class="event-month__letter">e</span>
            <span class="event-month__letter">r</span>
          </span>
        </h3>

        <ul class="event-list">
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-not-available">
                  <span>Disponible</span>
                </li>
                <ul class="event__top-info__item event__postpone">
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                  <li class="event__postpone__item">
                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164.24 128.77">
                      <path
                        d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                    </svg>
                    <span>Report du Jeu 14 janvier 2021</span>
                  </li>
                </ul>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Wejdene">Wejdene</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
          <li class="event">
            <div class="event__call-back event__call-back--mobile">
              <div class="double-buttons">
                <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                  title="">Informations</a>
                <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
              </div>
            </div>
            <div class="event__top">
              <ul class="event__top-info">
                <li class="event__top-info__item event__top-info__item--when">
                  <time>02.03.22</time>
                  <span class="event__hashtag event__hashtag--mobile">#concert</span>
                </li>
                <li class="event__top-info__item event__top-info__item--where"><span>Geneva</span></li>
                <li class="event__top-info__item event__top-info__item--availability is-available">
                  <span>Disponible</span>
                </li>
              </ul>
              <span class="event__hashtag event__hashtag--desktop">#concert</span>
            </div>
            <div class="event__bottom">
              <h3 class="event__title">
                <a href="single-event.html" title="Red Hot Chili Peppers">Red Hot Chili Peppers</a>
              </h3>
              <div class="event__call-back event__call-back--desktop">
                <div class="double-buttons">
                  <a href="single-event.html" class="double-bouttons__btn double-bouttons__btn--info"
                    title="">Informations</a>
                  <a href="#" class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </main>

  </div>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>