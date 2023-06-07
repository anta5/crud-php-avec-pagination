<?php 
// PAGE D'ACCUEIL
// inclusion initiale
include_once("./includes/init.inc.php");

// recupération de tous les employés
try {
    $stmt = $pdo->query("SELECT * FROM employes");
} catch(PDOException $e) {
    afficheErreur($e->getMessage());
}

$employes = $stmt->fetchAll();

// debug
if($env === 'dev') {
    incomingData();
}

// titre de la page
$titrePrincipal = 'Accueil';

// id du body
$bodyId = 'home';

// Affichage de la page
// Header:
include_once("./includes/header.php");
?>

<!-- Contenu de la page -->
<div class="container-col">
    <div class="container-struct form-container">
        <h3>Ajouter un employé</h3>

        <!-- Zone de notif erreur -->
        <?php if(count($errors)): ?>
            <div class="w-100 mt-3 mb-3 form-error-container">
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- Zone de notif succes -->
        <?php if(count($success)): ?>
            <div class="w-100 mt-3 mb-3 form-success-container">
                <ul>
                    <?php foreach($success as $succes): ?>
                        <li><?= $succes ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- bouton de retour  à la liste -->
        <a href="<?= HTTP_SITE_URL ?>">
        <button type="button" class="btn btn-primary mt-3 ms-3 mb-5"> <-- Retour à la liste</button>
        </a>

        <!-- Formulaire d'ajout d'employés -->
        <form method="post" id="createForm">

            <div class="input-group mb-3">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control <?= isset($errors['nom']) ? 'red-border' : '' ?>" aria-label="nom" aria-describedby="nom" name="nom" value="<?= $formValue['nom'] ?>" required>
                <?php if(isset($errors['nom'])): ?>
                    <div style="color: red; font-size: 10px; width: 100%;"><?= $errors['nom'] ?></div>
                <?php endif ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control <?= isset($errors['prenom']) ? 'red-border' : '' ?>" aria-label="prenom" aria-describedby="prenom" name="prenom" value="<?= $formValue['prenom'] ?>"  required>
                <?php if(isset($errors['prenom'])): ?>
                    <div style="color: red; font-size: 10px; width: 100%;"><?= $errors['prenom'] ?></div>
                <?php endif ?>
            </div>

            <select class="form-select mb-3 <?= isset($errors['sexe']) ? 'red-border' : '' ?>" aria-label="choix" name="sexe" value="<?= $formValue['sexe'] ?>" required>
                <option value="" selected>Sexe: veuillez choisir une option</option>

                <?php foreach($tabGenre as $k => $v): ?>
                <option value="<?= $k ?>"><?= $v ?></option>
                <?php endforeach ?>
            </select>

            <div class="input-group mb-3">
                <span class="input-group-text" id="service">Service</span>
                <input type="text" class="form-control <?= isset($errors['service']) ? 'red-border' : '' ?>" aria-label="service" aria-describedby="service" name="service" value="<?= $formValue['service'] ?>"  required>
                <?php if(isset($errors['service'])): ?>
                    <div style="color: red; font-size: 10px; width: 100%;"><?= $errors['service'] ?></div>
                <?php endif ?>
            </div>

            <div class="form-group mb-3">
                <span class="input-group-text" id="date">Date embauche</span>
                <input type="date" class="form-control <?= isset($errors['date_embauche']) ? 'red-border' : '' ?>" id="date" name="date_embauche" value="<?= $formValue['date_embauche'] ?>" required>
                <?php if(isset($errors['date_embauche'])): ?>
                    <div style="color: red; font-size: 10px; width: 100%;"><?= $errors['date_embauche'] ?></div>
                <?php endif ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="salaire">Salaire €</span>
                <input type="text" class="form-control <?= isset($errors['salaire']) ? 'red-border' : '' ?>" aria-label="salaire" aria-describedby="salaire" name="salaire" value="<?= $formValue['salaire'] ?>" required>
                <?php if(isset($errors['salaire'])): ?>
                    <div style="color: red; font-size: 10px; width: 100%;"><?= $errors['salaire'] ?></div>
                <?php endif ?>
            </div>

            <button type="submit" class="btn btn-primary" name="addEmployeeSubmitBtn">Envoyer</button>
        </form>
    </div>
</div>




<!-- /Contenu de la page -->
<?php 
include_once("./includes/footer.php");
?>
