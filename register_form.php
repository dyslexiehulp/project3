<div class="row">
    <div class="col-12">
        <h1>Registratie</h1>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <form action="./registeren.php?content=register" method="post">
            <div class="form-group">
                <label for="formGroupusernameInput">Gebruikersnaam</label>
                <input type="text" class="form-control" id="formGroupusernameInput" placeholder="Gebruikersnaam" name="username" required>
            </div>
            <div class="form-group">
                <label for="InputEmail1">E-mailadres</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                       placeholder="Voer uw e-mailadres in..." name="email" required>
                <small id="emailHelp" class="form-text text-muted">Wij zullen nooit uw e-mailadres delen met anderen.</small>
            </div>
            <button type="submit" class="btn btn-primary">Sla op!</button>
        </form>
    </div>


    <div class="col-6">
        <!-- Plaatje -->
        <img src="./images/discus.jpg" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
    </div>
</div>