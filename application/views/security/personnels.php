<div>

    <div class="d-flex justify-content-between align-items-center">
        <h3>Liste du personnel</h3>
        <a href="<?= site_url('security/personnel') ?>" class="btn btn-sm btn-green">Ajouter</a>
    </div>
    <hr>

    <div class="border white">
        <table class="table">
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Departement</th>
                <th>Poste</th>
                <th>Contact</th>
                <th>Email</th>
            </tr>
            <?php foreach ($personnels as $perso): ?>
            <tr>
                <td><?= $perso['matricule'] ?></td>
                <td><?= $perso['nom'] ?></td>
                <td><?= $perso['prenom'] ?></td>
                <td><?= $this->departement->get(array("id_departement"=>$perso['departement_id']))['nom'] ?></td>
                <td><?= $perso['poste'] ?></td>
                <td><?= $perso['contact'] ?></td>
                <td><?= $perso['mail'] ?></td>
                <td>
                    <a href="<?= site_url('security/personnel/'.$perso['id_personnel']) ?>" class="black-ic"><span class="fa fa-edit"></span></a>
                </td>
                <td>
                    <a href="<?= site_url('security/supprimer/'.$perso['id_personnel']) ?>" class="black-ic"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>


</div>
