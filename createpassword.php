<div class="row">
    <div class="col-12">
        <h1>Wachtwoord kiezen</h1>
    </div>
</div>
<!--het formulier van om het wachtwoord te maken -->
<div class="row">
    <div class="col-6">
        <form action="./createpassword_script.php" method="post">
            <div class="form-group">
            <!-- 1e keer wachtwoord -->
                <label for="InputPassword1">Wachtwoord</label>
                <input type="password" class="form-control" id="InputPassword1" placeholder="Kies een wachtwoord" name="password">
            </div>
            <div class="form-group">
                <!--bevestiging van het wachtwoord -->
                <label for="InputPassword">Herhaal wachtwoord</label>
                <input type="password" class="form-control" id="InputPassword2" placeholder="Herhaal wachtwoord" name="checkpassword">
            </div>
            <!-- afscherming van het account in de url-->
            <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
            <input type="hidden" value="<?php echo $_GET["pw"]; ?>" name="pw">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sla op!</button>
        </form>
    </div>
    </div>
</div>