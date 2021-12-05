<div id="container">
    <form method="post" id="form-chapitre" action="https://camille-marro.alwaysdata.net/lore">
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
        <input type="button" onclick="submitform()">
    </form>

    <div id="chapitres-container">
        <?php
            if (isset($data)) {
                foreach ($data[0] as $chapter) {
                    echo '<div class="chapitre-infos" id="' . $chapter['titre'] . '">';
                    echo '  <div class="chapitre-name">' . $chapter['titre'] . '</div>';
                    echo '  <div class="chapitre-content">' .  $chapter['contenu'] . '</div>';
                    echo '</div><br>';
                }
            }
        ?>
    </div>
</div>

<script type="text/javascript" src="/public/assets/js/lore.js"></script>