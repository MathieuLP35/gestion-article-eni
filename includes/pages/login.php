<?php
    require_once "includes/functions.php";

    $sizePost = sizeof($_POST);

    $errors["email"] = "";
    $errors["password"] = "";

    $email = "";

    if ($sizePost > 0){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!$email){
            $errors["email"] = "Vous devez renseigner un email";
        } else {
            if (!preg_match("/^[\w.-]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
                $errors["email"] = "Vous n'avez pas renseigné un email ! (exemple: xxxx@gmail.com)";
            }
        }

        if (!$password){ $errors["password"] = "Vous devez renseigner un mot de passe"; }

        if($errors["email"] == "" && $errors["password"] == ""){
            $connexion = connectBDD();
            $r = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $r->bindParam(':email', $email);
            $r->execute();
            $user = $r->fetch(PDO::FETCH_ASSOC);

            if($user){
                if($user["mot_de_passe"] == $password){
                    $_SESSION["user"] = $user;
                    header("Location: /");
                } else {
                    $errors["password"] = "Le mot de passe est incorrect";
                }
            } else {
                $errors["email"] = "L'email n'existe pas";
            }
        }

    }
?>
<div class="bg-white p-8 rounded shadow-md w-96 mx-auto my-32">
        <h2 class="text-2xl font-bold mb-6">Connexion</h2>

        <!-- Formulaire d'Inscription -->
        <form action="?page=login" method="post">
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border p-2 rounded" value="<?= $email; ?>" required>
                <div class="mb-4 text-red-500"><?= $errors["email"] ?></div>
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full border p-2 rounded" required>
                <div class="mb-4 text-red-500"><?= $errors["password"] ?></div>
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Se connecter</button>
        </form>
    </div>