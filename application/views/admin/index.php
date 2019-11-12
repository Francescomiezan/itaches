<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Authentification</h3>
                    <hr>
                    <?php if($code == 300): ?>
                        <div class="alert alert-danger">Veuillez remplir correctement les champs</div>
                    <?php elseif ($code == 204): ?>
                        <div class="alert alert-danger">Nom d'utlisateur ou mot de passe incorrect</div>
                    <?php elseif ($code == 200): ?>
                        <div class="alert alert-success">Vous êtes connecté !</div>
                    <?php endif; ?>
                    <?= form_open() ?>
                        <div class="form-group">
                            <label for="">Nom d'utilisateur</label>
                            <input type="text" class="form-control" required name="username">
                        </div>
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password" class="form-control" required name="password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-sm  btn-green" type="submit">Se connecter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>