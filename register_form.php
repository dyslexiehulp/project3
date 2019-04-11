<div class="row">
    <div class="col-12">
        <h1>Registratie</h1>
    </div>
</div>
<!-- dit is het registratie formulier -->
<div class="row">
    <div class="col-6">
        <form action="./register.php" method="post">
            <div class="form-group">
            <!--invoer van het email adres -->
                <label for="InputEmail1">E-mailadres</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                       placeholder="Voer uw e-mailadres in..." name="email" required>
                <small id="emailHelp" class="form-text text-muted">Wij zullen nooit uw e-mailadres delen met anderen.</small>
            </div>
            <!-- bevestiging dat je je wilt registreren op de website -->
            <button type="submit" class="btn btn-primary">Sla op!</button>
        </form>
    </div>


    <div class="col-6">
        <!-- Plaatje -->
        <img src="./images/esje.jpg" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
    </div>
</div>