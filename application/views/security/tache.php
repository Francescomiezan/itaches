<div>

    <h3>Ajouter une tâche</h3>
    <hr>

    <div class="border col-6 white">
        <div class="p-3">
            <?php if($code == 200): ?>
            <div class="alert alert-success">votre Tache a été Envoyé !</div>
            <?php endif; ?>
            <?= form_open() ?>
                <div class="form-group">
                    <label for="">Nom de la tâche</label>
                    <input type="text" class="form-control" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="">Service</label>
                    <select name="departement" class="form-control" id="">
                        <?php foreach ($departements as $dep): ?>
                            <option value="<?= $dep['id_departement'] ?> "><?= $dep['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-green btn-sm" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>


</div>