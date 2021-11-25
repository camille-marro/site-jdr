<div id="container">
    <div id="cancel-button-container">
        <form method="post" id="form-cancel" action="https://camille-marro.alwaysdata.net/">
            <button id="cancel-button" type="submit" onclick="cancel()">Retour</button>
        </form>
    </div>
    <div id="perso-first-line-container">
        <div id="perso-first-line">
            <div id="perso-name"><?php if(isset($data[0])) echo ucfirst($data[0]['nom']);?> <span id="dp">:</span></div>
            <div id="perso-magie"><?php if(isset($data[0])) echo $data[0]['mag_name']?></div>
        </div>
        <div id="perso-magie-counter">Contre coup : <?php if(isset($data[0])) echo $data[0]['mag_counter'] ?></div>
    </div>
    <div id="perso-desc"><?php if(isset($data[0])) echo $data[0]['desc'] ?></div>
    <div id="perso-quest">Quête personnelle : <?php if(isset($data[0])) echo $data[0]['quete'] ?></div>

    <div id="perso-comp">
        <div id="perso-comp-table-div">
            <table id="perso-comp-table">
                <tr class="perso-comp-row">
                    <th class="perso-comp-cell agi">AGILITÉ</th>
                    <th class="perso-comp-cell int">INTELLIGENCE</th>
                    <th class="perso-comp-cell for">FORCE</th>
                    <th class="perso-comp-cell cha">CHARISME</th>
                    <th class="perso-comp-cell mag">MAGIE</th>
                </tr>
                <tr class="perso-comp-row">
                    <td class="perso-comp-cell"><?php if(isset($data[0])) echo $data[0]['agi']?></td>
                    <td class="perso-comp-cell"><?php if(isset($data[0])) echo $data[0]['int']?></td>
                    <td class="perso-comp-cell"><?php if(isset($data[0])) echo $data[0]['for']?></td>
                    <td class="perso-comp-cell"><?php if(isset($data[0])) echo $data[0]['cha']?></td>
                    <td class="perso-comp-cell"><?php if(isset($data[0])) echo $data[0]['mag']?></td>
                </tr>
            </table>
        </div>
        <div id="perso-comp-s-main-container">
            <div class="perso-comp-s-second-container">
                <div class="perso-comp-s-container">
                    <div class="perso-comp-s-title agi">Agilité</div>
                    <div class="perso-comp-s-table-div">
                        <table class="perso-comp-s-table" id="perso-comp-s-agi">
                            <tr>
                                <th class="perso-comp-s-table-cell agil">Nom</th>
                                <th class="perso-comp-s-table-cell agil">Points de base</th>
                                <th class="perso-comp-s-table-cell agil">Points finaux</th>
                            </tr>
                            <?php
                            if(isset($data[1])) {
                                foreach($data[1]['agi'] as $competence) {
                                    echo '<tr>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['nom'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['valeur'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . ($competence['valeur'] * $data[0]['agi']) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="perso-comp-s-container">
                    <div class="perso-comp-s-title int">Intelligence</div>
                    <div class="perso-comp-s-table">
                        <table class="perso-comp-s-table" id="perso-comp-s-int">
                            <tr>
                                <th class="perso-comp-s-table-cell inte">Nom</th>
                                <th class="perso-comp-s-table-cell inte">Points de base</th>
                                <th class="perso-comp-s-table-cell inte">Points finaux</th>
                            </tr>
                            <?php
                            if(isset($data[1])) {
                                foreach($data[1]['int'] as $competence) {
                                    echo '<tr>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['nom'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['valeur'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . ($competence['valeur'] * $data[0]['int']) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="perso-comp-s-second-container">
                <div class="perso-comp-s-container">
                    <div class="perso-comp-s-title for">Force</div>
                    <div class="perso-comp-s-table">
                        <table class="perso-comp-s-table" id="perso-comp-s-for">
                            <tr>
                                <th class="perso-comp-s-table-cell forc">Nom</th>
                                <th class="perso-comp-s-table-cell forc">Points de base</th>
                                <th class="perso-comp-s-table-cell forc">Points finaux</th>
                            </tr>
                            <?php
                            if(isset($data[1])) {
                                foreach($data[1]['for'] as $competence) {
                                    echo '<tr>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['nom'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['valeur'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . ($competence['valeur'] * $data[0]['for']) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="perso-comp-s-container">
                    <div class="perso-comp-s-title cha">Charisme</div>
                    <div class="perso-comp-s-table">
                        <table class="perso-comp-s-table" id="perso-comp-s-cha">
                            <tr>
                                <th class="perso-comp-s-table-cell char">Nom</th>
                                <th class="perso-comp-s-table-cell char">Points de base</th>
                                <th class="perso-comp-s-table-cell char">Points finaux</th>
                            </tr>
                            <?php
                            if(isset($data[1])) {
                                foreach($data[1]['cha'] as $competence) {
                                    echo '<tr>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['nom'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . $competence['valeur'] . '</td>';
                                    echo '    <td class="perso-comp-s-table-cell">' . ($competence['valeur'] * $data[0]['cha']) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="inventory-container">
        <div id="inventory-first-line-container">
            <div id="inventory">Inventaire :</div>
            <div id="gold-container"><?php if(isset($data[0])) echo $data[0]['glods'] ?> glods</div>
            <div id="gold-modifier-container">
                <div id="add-remove-container">
                    <div id="add-gold" onclick="add_gold()">▲</div>
                    <div id="remove-gold" onclick="remove_gold()">▼</div>
                </div>
                <div id="save-gold">
                    <form action="https://camille-marro.alwaysdata.net/personnage" method="post" id="gold-form">
                        <input id="gold-form-input-id" type="hidden" name="id-personnage" value="<?php if(isset($data[0])) echo $data[0]['ID']?>">
                        <input id="gold-form-input" type="hidden" name="glods" value="<?php if(isset($data[0])) echo $data[0]['glods'] ?>">
                        <button id="gold-form-button" type="submit" value="">SAUVEGARDER</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="items-container">
            <?php
            if (isset($data[2])) {
                foreach ($data[2] as $item) {
                    echo '<div class="item-infos">';
                    echo '<div class="item-name">' . $item['nom'] . ' :</div>';
                    echo '<div class="item-desc">' . $item['desc'] . '</div>';
                    if ($item['quantite'] > 1) echo '<div class="item-count">(x' . $item['quantite'] . ')</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/assets/js/refresh_glods.js"></script>