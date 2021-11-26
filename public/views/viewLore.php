<div id="container">
    <form method="post" id="form-chapitre" action="https://camille-marro.alwaysdata.net/lore">
        <label for="chapitre">Choisir un chapitre :</label>
        <select id="chapitre" name="chapitre">
            <?php
                if(isset($data)) {
                    foreach ($data[0] as $chapter) {
                        echo '<option value="' . $chapter['titre'] . '">' . $chapter['titre'] . '</option>';
                    }
                }
            ?>
        </select>
        <input type="submit">
    </form>
</div>