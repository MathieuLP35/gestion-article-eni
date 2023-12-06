<?php
    require_once "includes/functions.php";

    $sizePost = sizeof($_POST);
    $errors["no_name"] = "";
    $errors["no_firstname"] = "";
    $errors["password_confirm"] = "";
    $errors["password_security"] = "";
    $errors["no_password"] = "";
    $errors["no_password_confirm"] = "";
    $errors["no_email"] = "";
    $errors["email_format"] = "";

    $nom = "";
    $prenom = "";
    $email = "";
    $password = "";
    $password_confirmation = "";

    if ($sizePost > 0){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_confirmation = $_POST["password_confirmation"];

        if ($password !== $password_confirmation) {
            $errors["password_confirm"] = "Les mots de passe ne correspondent pas";
        } else {
            if((strlen($password) < 8) || (!checkPassword($password))) {
                $errors["password_security"] = "Veuillez saisir un mot de passe sécuriser d'au moins 8 caractères, avec au minimum une majuscule, une miniscule et un chiffre.";
            }
            if (!$password){ $errors["no_password"] = "Vous devez renseigner un mot de passe"; }
            if (!$password_confirmation){ $errors["no_password_confirm"] = "Vous n'avez pas confirmer votre mot de passe"; }
        }
        if (!$nom){ $errors["no_name"] = "Vous devez renseigner un nom"; }
        if (!$prenom){ $errors["no_firstname"] = "Vous devez renseigner un prenom"; }
        if (!$email){
            $errors["no_email"] = "Vous devez renseigner un email";
        } else{
            if (!preg_match("/^[\w.-]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
                $errors["email_format"] = "Vous n'avez pas renseigné un email ! (exemple: xxxxx@gmail.com)";
            }
        }

        if($errors["no_name"] == "" &&
        $errors["no_firstname"] == "" &&
        $errors["password_confirm"] == "" &&
        $errors["password_security"] == "" &&
        $errors["no_password"] == "" &&
        $errors["no_password_confirm"] == "" &&
        $errors["no_email"] == "" &&
        $errors["email_format"] == ""){
            $connexion = connectBDD();
            $r = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
            $r->bindParam(':nom', $nom);
            $r->bindParam(':prenom', $prenom);
            $r->bindParam(':email', $email);
            $r->bindParam(':mot_de_passe', $password);
            $r->execute();
            header("Location: ?page=login");
        }

    }
?>
<div class="bg-white p-8 rounded shadow-md w-96 mx-auto my-32">
        <h2 class="text-2xl font-bold mb-6">Inscription</h2>

        <!-- Formulaire d'Inscription -->
        <form action="?page=register" method="post">
            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="nom" name="nom" class="w-full border p-2 rounded" value="<?= $nom; ?>" required>
                <div class="mb-4 text-red-500"><?= $errors["no_name"] ?></div>
            </div>

            <!-- Prénom -->
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="w-full border p-2 rounded" value="<?= $prenom; ?>" required>
                <div class="mb-4 text-red-500"><?= $errors["no_firstname"] ?></div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border p-2 rounded" value="<?= $email; ?>" required>
                <div class="mb-4 text-red-500"><?= $errors["no_email"] ?></div>
                <div class="mb-4 text-red-500"><?= $errors["email_format"] ?></div>
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full border p-2 rounded" required>
                <div class="mb-4 text-red-500"><?= $errors["no_password"] ?></div>
                <div class="mb-4 text-red-500"><?= $errors["password_security"] ?></div>
            </div>

            <!-- Vérification du mot de passe -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border p-2 rounded" required>
                <div class="mb-4 text-red-500"><?= $errors["no_password_confirm"] ?></div>
                <div class="mb-4 text-red-500"><?= $errors["password_confirm"] ?></div>
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">S'inscrire</button>
        </form>
    </div>