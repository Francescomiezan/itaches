<div>

    <h3>Ajouter une personne</h3>
    <hr>

    <div class="border col-8 white">
        <div class="p-3">
            <?php if($code == 200): ?>
                <div class="alert alert-success">Personne modifié !</div>
            <?php endif; ?>
            <?= form_open() ?>
                <div class="form-group">
                    <label for="">Matricule</label>
                    <input type="text" value="<?= isset($personnel) ? $personnel['matricule'] :'' ?>" class="form-control" name="matricule" required>
                </div>
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" value="<?= isset($personnel) ? $personnel['nom'] :'' ?>" class="form-control" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" value="<?= isset($personnel) ? $personnel['prenom'] :'' ?>" class="form-control" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="number" value="<?= isset($personnel) ? $personnel['contact'] :'' ?>" class="form-control" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="<?= isset($personnel) ? $personnel['mail'] :'' ?>" class="form-control" name="mail" required>
                </div>
                <div class="form-group">
                    <label for="">Département</label>
                    <select name="departement" class="form-control" id="">
                        <?php foreach ($departements as $dep): ?>
                            <option <?= isset($personnel)&& $dep['id_departement']  == $personnel['departement_id'] ? 'selected' : '' ?> value="<?= $dep['id_departement'] ?> "><?= $dep['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Poste</label>
                    <input type="text" value="<?= isset($personnel) ? $personnel['poste'] :'' ?>" class="form-control" name="poste" required>
                </div>
                <div class="form-group">
                    <label for="">Categorie</label>
                    <input type="number" value="<?= isset($personnel) ? $personnel['categorie'] :'' ?>" class="form-control" name="categorie" required>
                </div>
                  <div class="text-center">
                      <button class="btn btn-green btn-sm" type="submit">Modifier</button>
                  </div>
            </form>
        </div>
    </div>


</div>
