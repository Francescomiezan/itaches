<div class="row">

    <div class="col-2 position-fixed h-100 white border-right">
        <div class="p-3">
            <img src="/static/img/logo.png" class="w-100" alt="">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item h5 font-weight-light px-2 py-1">
                <a href="<?= site_url('security/index') ?>" class="nav-link black-text row"><span class="fa fa-dashboard"></span><span class="col-9">Dashboard</span></a>
            </li>
            <?php if($this->user['categorie'] == 1 || $this->user['categorie'] == 0): ?>
            <?php if($this->user['categorie'] == 0): ?>
            <li class="nav-item h5 font-weight-light px-2 py-1">
                <a href="<?= site_url('security/tache') ?>" class="nav-link black-text row"><span class="fa fa-tasks"></span><span class="col-9">Tâche</span></a>
            </li>
            <li class="nav-item h5 font-weight-light px-2 py-1">
                <a href="<?= site_url('security/personnels') ?>" class="nav-link black-text row"><span class="fa fa-user-cog"></span><span class="col-9">Personnel</span></a>
            </li>
            <?php endif; ?>
            <li class="nav-item h5 font-weight-light px-2 py-1">
                <a href="" class="nav-link black-text row"><span class="fa fa-users"></span><span class="col-9">Staff</span></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="col-10 offset-2 p-0" >

        <div class="navbar shadow-none border-bottom white navbar-light">
            <div class="container-fluid">
                <div class="navbar-brand font-weight-bold">Ivoire Garizim</div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="" class="black-text dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user mr-2"></span> <?= $this->user['nom'].' '.$this->user['prenom'] ?></a>
                        <div class="dropdown-menu">
                            <div class="p-3 text-center">
                                <div><span class="fa fa-user fa-2x"></span></div>
                                <span><?= $this->user['poste'] ?></span>
                            </div>
                            <a href="<?= site_url('security/modifier_personnel') ?>" class="dropdown-item"><span class="fa fa-edit mr-2"></span>Modifier mon compte</a>
                            <a href="<?= site_url('security/logout') ?>" class="dropdown-item"><span class="fa fa-sign-out-alt mr-2"></span>Se deconnecter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container mt-3">

            <?= $contenue_security ?>

        </div>

    </div>

</div>
