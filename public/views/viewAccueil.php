<div id="main-container">
    <div id="container">
        <h1 id="title">Les chroniques d'Akira</h1>
        <form method="post" id="form-id" action="https://camille-marro.alwaysdata.net/personnage">
            <input type="text" name="id-personnage" id="id-personnage" placeholder="nom ou ID du personnage">
            <button type="submit" id="ask-id-button">Chercher</button>
        </form>
        <div id="error-container">
            <?php
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</div>