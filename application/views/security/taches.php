<div>

    <h3>Liste des taches en cours</h3>
    <hr>

    <div class="border white">
        <table class="table">
            <tr>
                <th>Progression</th>
                <th>Nom</th>
                <th>0rdonneur</th>
                <th>Executeur</th>
                <th>Date et heure d'emission</th>
                <th>Status</th>
            </tr>
            <?php foreach ($taches as $tache): ?>
            <tr>
                <td>
                    <div class="progress md-progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:  <?= $tache['status'] ?>%" aria-valuenow="<?= $tache['status'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </td>
                <td><?= $tache['nom'] ?></td>
                <td><?= $this->departement->get(['id_departement'=>$tache['ordonneur_id']])['nom']  ?></td>
                <td><?= $this->personnel->get(['id_personnel'=>$tache['personnel_id']])['nom']  ?></td>
                <td><?= $tache['createAt'] ?></td>
                <td>
                    <?php if($tache['status'] == 0): ?>
                        <span class="badge badge-primary">Réçu</span>
                    <?php elseif ($tache['status'] == 25): ?>
                        <span class="badge badge-primary">Analyse</span>
                    <?php elseif ($tache['status'] == 50): ?>
                        <span class="badge badge-primary">Marquetage</span>
                    <?php elseif ($tache['status'] == 75): ?>
                        <span class="badge badge-primary">Conception</span>
                    <?php elseif ($tache['status'] == 100): ?>
                        <span class="badge badge-primary">Terminée</span>
                    <?php endif; ?>
                </td>
                <?php if($this->user['categorie'] == 0 || $this->user['categorie'] == 1): ?>
                <td>
                    <div class="dropdown ">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle btn btn-sm btn-orange">Attribuer à</a>
                        <div class="dropdown-menu">
                            <?php foreach ($staff as $perso): ?>
                            <a href="<?= site_url("security/attribuer_tache/".$tache['id_tache']."/".$perso['id_personnel']) ?>" class="dropdown-item"><?= $perso['nom'].' '.$perso['prenom'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </td>
                <?php endif; ?>
                <td>
                    <div class="dropdown ">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle btn btn-sm btn-blue">Etapes</a>
                        <div class="dropdown-menu">
                            <a href="<?= site_url('security/etapes/'.$tache['id_tache'].'/25') ?>" class="dropdown-item">Analyse</a>
                            <a href="<?= site_url('security/etapes/'.$tache['id_tache'].'/50') ?>" class="dropdown-item">Marquetage</a>
                            <a href="<?= site_url('security/etapes/'.$tache['id_tache'].'/75') ?>" class="dropdown-item">Conception</a>
                            <a href="<?= site_url('security/etapes/'.$tache['id_tache'].'/100') ?>" class="dropdown-item">Terminé</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>


</div>