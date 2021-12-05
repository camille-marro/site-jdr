<div id="container">
    <form id="form-chapitre" action="https://camille-marro.alwaysdata.net/lore">
        <label for="chapitre">Choisir un chapitre :</label>
        <select id="chapitre" name="chapitre">
            <?php
                if(isset($data)) {
                    if ($data[0] != 'selected') {
                        foreach ($data[0] as $chapter) {
                            echo '<option value="' . $chapter['titre'] . '">' . $chapter['titre'] . '</option>';
                        }
                    }
                }
            ?>
        </select>
        <button id="form-button" type="button" onclick="submitform()">Sélectionner</button>
    </form>

    <div id="chapitres-container">
        <?php
            if (isset($data)) {
                foreach ($data[0] as $chapter) {
                    echo '<div class="chapitre-infos" id="' . $chapter['titre'] . '">';
                    echo '  <div class="chapitre-name">' . $chapter['titre'] . '</div>';
                    echo '  <div class="chapitre-content">';
                    echo '    <div class="chapitre-map"><img alt="image : ' . $chapter['titre'] . '" src="' . $chapter['lien_carte'] . '"></div>';
                    echo '    <div class="chapitre-story">' .  $chapter['contenu'] . '</div>';
                    echo '  </div>';
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>

<script type="text/javascript" src="/public/assets/js/lore.js"></script>