<?php /* Template Name: Newsletter */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div data-barba="container" data-barba-namespace="newsletter" data-bg="#000" data-text-color="#fff" data-logo-title="<?php echo the_title(); ?>">
            <?php if (get_field('titre_header')) : ?>
                <header class="header header--regular">
                    <h1 class="header--regular__title"><?php echo get_field('titre_header'); ?></h1>
                    <?php if (get_field('sous-titre_header')) : ?>
                        <span class="header--regular__sub-title"><?php echo get_field('sous-titre_header'); ?></span>
                    <?php endif; ?>
                </header>
            <?php endif; ?>
            <main class="main main--newsletter">
                <div>
                    <form class="form form--subscribe" name="subscription" id="newsletter-subscribe">
                        <div>
                            <ul class="form__main-list">
                                <li>
                                    <div>
                                        <label class="label label--is-hidden" for="input_11_15_3">Prénom</label>
                                        <input type="text" name="input_15.3" id="input_11_15_3" value="" placeholder="Prénom*" aria-label="Prénom" aria-required="true" required>
                                    </div>
                                    <div>
                                        <label class="label label--is-hidden" for="input_11_15_6">Nom</label>
                                        <input type="text" name="input_15.6" id="input_11_15_6" value="" placeholder="Nom*" aria-label="Nom" aria-required="true" required>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <label class="label label--is-hidden" for="input_11_1">E-mail<span>*</span></label>
                                        <input name="input_1" id="input_11_1" type="text" value="" class="large" aria-required="true" placeholder="E-mail*" aria-invalid="false" required>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <label class="label label--is-hidden" for="input_11_16_5">NPA / Code postal</label>
                                        <input type="text" name="input_16.5" id="input_11_16_5" value="" aria-required="false" placeholder="NPA / Code postal">
                                    </div>
                                    <div>
                                        <label class="label label--is-hidden" for="input_11_16_6">Pays</label>
                                        <select name="input_16.6" id="input_11_16_6" aria-required="false">
                                            <option value="" selected="selected">Pays</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Afrique du Sud">Afrique du Sud</option>
                                            <option value="Albanie">Albanie</option>
                                            <option value="Algérie">Algérie</option>
                                            <option value="Allemagne">Allemagne</option>
                                            <option value="Andorre">Andorre</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctique">Antarctique</option>
                                            <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
                                            <option value="Arabie Saoudite">Arabie Saoudite</option>
                                            <option value="Argentine">Argentine</option>
                                            <option value="Arménie">Arménie</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australie">Australie</option>
                                            <option value="Autriche">Autriche</option>
                                            <option value="Azerbaïdjan">Azerbaïdjan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahreïn">Bahreïn</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgique">Belgique</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Bermudes">Bermudes</option>
                                            <option value="Bhoutan">Bhoutan</option>
                                            <option value="Bolivie">Bolivie</option>
                                            <option value="Bonaire, Saint-Eustache et Saba ">Bonaire, Saint-Eustache et Saba </option>
                                            <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Brésil">Brésil</option>
                                            <option value="Bulgarie">Bulgarie</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Bénin">Bénin</option>
                                            <option value="Cambodge">Cambodge</option>
                                            <option value="Cameroun">Cameroun</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cap-Vert">Cap-Vert</option>
                                            <option value="Chili">Chili</option>
                                            <option value="Chine">Chine</option>
                                            <option value="Chypre">Chypre</option>
                                            <option value="Colombie">Colombie</option>
                                            <option value="Comores">Comores</option>
                                            <option value="Corée du Nord">Corée du Nord</option>
                                            <option value="Corée du Sud">Corée du Sud</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatie">Croatie</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaçao">Curaçao</option>
                                            <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                                            <option value="Danemark">Danemark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominique">Dominique</option>
                                            <option value="Espagne">Espagne</option>
                                            <option value="Estonie">Estonie</option>
                                            <option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option>
                                            <option value="Fidji">Fidji</option>
                                            <option value="Finlande">Finlande</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambie">Gambie</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Grenade">Grenade</option>
                                            <option value="Groenland">Groenland</option>
                                            <option value="Grèce">Grèce</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinée">Guinée</option>
                                            <option value="Guinée équatoriale">Guinée équatoriale</option>
                                            <option value="Guinée-Bissau">Guinée-Bissau</option>
                                            <option value="Guyane">Guyane</option>
                                            <option value="Guyane">Guyane</option>
                                            <option value="Géorgie">Géorgie</option>
                                            <option value="Haïti">Haïti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hongrie">Hongrie</option>
                                            <option value="Inde">Inde</option>
                                            <option value="Indonésie">Indonésie</option>
                                            <option value="Irak">Irak</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Irlande">Irlande</option>
                                            <option value="Islande">Islande</option>
                                            <option value="Israël">Israël</option>
                                            <option value="Italie">Italie</option>
                                            <option value="Jamaïque">Jamaïque</option>
                                            <option value="Japon">Japon</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordanie">Jordanie</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kirghizistan">Kirghizistan</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Koweït">Koweït</option>
                                            <option value="La Barbade">La Barbade</option>
                                            <option value="La Réunion">La Réunion</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Lettonie">Lettonie</option>
                                            <option value="Liban">Liban</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libye">Libye</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lituanie">Lituanie</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macédoine">Macédoine</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaisie">Malaisie</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malte">Malte</option>
                                            <option value="Maroc">Maroc</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritanie">Mauritanie</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexique">Mexique</option>
                                            <option value="Micronésie">Micronésie</option>
                                            <option value="Moldavie">Moldavie</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolie">Mongolie</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Monténégro">Monténégro</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibie">Namibie</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigéria">Nigéria</option>
                                            <option value="Niué">Niué</option>
                                            <option value="Norvège">Norvège</option>
                                            <option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option>
                                            <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                                            <option value="Népal">Népal</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Ouganda">Ouganda</option>
                                            <option value="Ouzbékistan">Ouzbékistan</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Pays-Bas">Pays-Bas</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pologne">Pologne</option>
                                            <option value="Polynésie française">Polynésie française</option>
                                            <option value="Porto Rico">Porto Rico</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Pérou">Pérou</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Roumanie">Roumanie</option>
                                            <option value="Royaume-Uni">Royaume-Uni</option>
                                            <option value="Russie">Russie</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="République Dominicaine">République Dominicaine</option>
                                            <option value="République centrafricaine">République centrafricaine</option>
                                            <option value="République du Congo">République du Congo</option>
                                            <option value="République démocratique du Congo">République démocratique du Congo</option>
                                            <option value="République démocratique populaire du Laos">République démocratique populaire du Laos</option>
                                            <option value="République tchèque">République tchèque</option>
                                            <option value="Sahara occidental">Sahara occidental</option>
                                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                                            <option value="Saint Martin">Saint Martin</option>
                                            <option value="Saint Pierre et Miquelon">Saint Pierre et Miquelon</option>
                                            <option value="Saint-Christophe-et-Nevis">Saint-Christophe-et-Nevis</option>
                                            <option value="Saint-Marin">Saint-Marin</option>
                                            <option value="Saint-Siège">Saint-Siège</option>
                                            <option value="Saint-Vincent-et-les Grenadines">Saint-Vincent-et-les Grenadines</option>
                                            <option value="Sainte Hélène">Sainte Hélène</option>
                                            <option value="Sainte-Lucie">Sainte-Lucie</option>
                                            <option value="Salvador">Salvador</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa américaines">Samoa américaines</option>
                                            <option value="Sao Tomé et Principe">Sao Tomé et Principe</option>
                                            <option value="Serbie">Serbie</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapour">Singapour</option>
                                            <option value="Sint Maarten">Sint Maarten</option>
                                            <option value="Slovaquie">Slovaquie</option>
                                            <option value="Slovénie">Slovénie</option>
                                            <option value="Somalie">Somalie</option>
                                            <option value="Soudan">Soudan</option>
                                            <option value="Soudan du Sud">Soudan du Sud</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Suisse">Suisse</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Suède">Suède</option>
                                            <option value="Syrie">Syrie</option>
                                            <option value="Sénégal">Sénégal</option>
                                            <option value="Tadjikistan">Tadjikistan</option>
                                            <option value="Tanzanie">Tanzanie</option>
                                            <option value="Taïwan">Taïwan</option>
                                            <option value="Tchad">Tchad</option>
                                            <option value="Terres Australes Françaises">Terres Australes Françaises</option>
                                            <option value="Territoire britannique de l’océan Indien">Territoire britannique de l’océan Indien</option>
                                            <option value="Thaïlande">Thaïlande</option>
                                            <option value="Timor oriental">Timor oriental</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinité et Tobago">Trinité et Tobago</option>
                                            <option value="Tunisie">Tunisie</option>
                                            <option value="Turkménistan">Turkménistan</option>
                                            <option value="Turquie">Turquie</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Wallis et Futuna">Wallis et Futuna</option>
                                            <option value="Yémen">Yémen</option>
                                            <option value="Zambie">Zambie</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <option value="Égypte">Égypte</option>
                                            <option value="Émirats arabes unis">Émirats arabes unis</option>
                                            <option value="Équateur">Équateur</option>
                                            <option value="Érythrée">Érythrée</option>
                                            <option value="État palestinien">État palestinien</option>
                                            <option value="États-Unis">États-Unis</option>
                                            <option value="Éthiopie">Éthiopie</option>
                                            <option value="Île Bouvet">Île Bouvet</option>
                                            <option value="Île Christmas">Île Christmas</option>
                                            <option value="Île Maurice">Île Maurice</option>
                                            <option value="Île Norfolk">Île Norfolk</option>
                                            <option value="Île de Géorgie du Sud">Île de Géorgie du Sud</option>
                                            <option value="Île de Man">Île de Man</option>
                                            <option value="Îles Cayman">Îles Cayman</option>
                                            <option value="Îles Cocos">Îles Cocos</option>
                                            <option value="Îles Cook">Îles Cook</option>
                                            <option value="Îles Falkland">Îles Falkland</option>
                                            <option value="Îles Féroé">Îles Féroé</option>
                                            <option value="Îles Heard et McDonald">Îles Heard et McDonald</option>
                                            <option value="Îles Mariannes du Nord">Îles Mariannes du Nord</option>
                                            <option value="Îles Marshall">Îles Marshall</option>
                                            <option value="Îles Pitcairn">Îles Pitcairn</option>
                                            <option value="Îles Salomon">Îles Salomon</option>
                                            <option value="Îles Turques et Caïques">Îles Turques et Caïques</option>
                                            <option value="Îles Vierges américaines">Îles Vierges américaines</option>
                                            <option value="Îles Vierges britanniques">Îles Vierges britanniques</option>
                                            <option value="Îles de Svalbard et Jan Mayen">Îles de Svalbard et Jan Mayen</option>
                                            <option value="Îles mineures américaines">Îles mineures américaines</option>
                                            <option value="Îles Åland">Îles Åland</option>
                                        </select>
                                    </div>

                                </li>
                                <li>
                                    <h5 class="form__title">Centre(s) d'intérêt:</h5>
                                </li>
                                <li>
                                    <label>Pop</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_33" type="radio" value="POP" checked="checked" id="choice_11_33_0">
                                                <label for="choice_11_33_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_33" type="radio" value="" id="choice_11_33_1">
                                                <label for="choice_11_33_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Reggae</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_34" type="radio" value="REGGAE" checked="checked" id="choice_11_34_0">
                                                <label for="choice_11_34_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_34" type="radio" value="" id="choice_11_34_1">
                                                <label for="choice_11_34_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Rock</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_17" type="radio" value="ROCK" checked="checked" id="choice_11_17_0">
                                                <label for="choice_11_17_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_17" type="radio" value="" id="choice_11_17_1">
                                                <label for="choice_11_17_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Hip-hop / Rap</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_19" type="radio" value="HIPHOP_RAP" checked="checked" id="choice_11_19_0">
                                                <label for="choice_11_19_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_19" type="radio" value="" id="choice_11_19_1">
                                                <label for="choice_11_19_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Chanson</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_20" type="radio" value="CHANSON" checked="checked" id="choice_11_20_0">
                                                <label for="choice_11_20_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_20" type="radio" value="" id="choice_11_20_1">
                                                <label for="choice_11_20_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Jazz / Soul / Funk</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_21" type="radio" value="JAZZ_SOUL_FUNK" checked="checked" id="choice_11_21_0">
                                                <label for="choice_11_21_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_21" type="radio" value="" id="choice_11_21_1">
                                                <label for="choice_11_21_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Electro</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_31" type="radio" value="ELECTRONIQUE" checked="checked" id="choice_11_31_0">
                                                <label for="choice_11_31_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_31" type="radio" value="" id="choice_11_31_1">
                                                <label for="choice_11_31_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Folk</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_40" type="radio" value="FOLK" checked="checked" id="choice_11_40_0">
                                                <label for="choice_11_40_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_40" type="radio" value="" id="choice_11_40_1">
                                                <label for="choice_11_40_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Ciné concert</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_39" type="radio" value="CINE_CONCERT" checked="checked" id="choice_11_39_0">
                                                <label for="choice_11_39_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_39" type="radio" value="" id="choice_11_39_1">
                                                <label for="choice_11_39_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Comédie musicale</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_42" type="radio" value="COMEDIE_MUSICALE" checked="checked" id="choice_11_42_0">
                                                <label for="choice_11_42_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_42" type="radio" value="" id="choice_11_42_1">
                                                <label for="choice_11_42_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Enfants / Familles</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_25" type="radio" value="ENFANTS" checked="checked" id="choice_11_25_0">
                                                <label for="choice_11_25_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_25" type="radio" value="" id="choice_11_25_1">
                                                <label for="choice_11_25_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Humour</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_24" type="radio" value="HUMOUR" checked="checked" id="choice_11_24_0">
                                                <label for="choice_11_24_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_24" type="radio" value="" id="choice_11_24_1">
                                                <label for="choice_11_24_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Expositions</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_26" type="radio" value="EXPOSITION" checked="checked" id="choice_11_26_0">
                                                <label for="choice_11_26_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_26" type="radio" value="" id="choice_11_26_1">
                                                <label for="choice_11_26_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Spectacle (danse, théâtre, cirque, ...)</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_22" type="radio" value="SPECTACLE_DANSE_THEATRE" checked="checked" id="choice_11_22_0">
                                                <label for="choice_11_22_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_22" type="radio" value="" id="choice_11_22_1">
                                                <label for="choice_11_22_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <h5 class="form__title">Zones géographiques:</h5>
                                </li>
                                <li>
                                    <label>Suisse romande</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_47" type="radio" value="PUBLIC_OPUSONE" checked="checked" id="choice_11_47_0">
                                                <label for="choice_11_47_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_47" type="radio" value="" id="choice_11_47_1">
                                                <label for="choice_11_47_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <label>Suisse alémanique</label>
                                    <div class="yes-no">
                                        <ul>
                                            <li>
                                                <input name="input_49" type="radio" value="PUBLIC_OPUSONE_DE" checked="checked" id="choice_11_49_0">
                                                <label for="choice_11_49_0">Oui</label>
                                            </li>
                                            <li>
                                                <input name="input_49" type="radio" value="" id="choice_11_49_1">
                                                <label for="choice_11_49_1">Non</label>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                </li>
                            </ul>
                        </div>
                        <div">
                            <button type="submit" class="form__submit btn">Confirmer</button>
                        </div>
                    </form>
                </div>

            </main>

        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>