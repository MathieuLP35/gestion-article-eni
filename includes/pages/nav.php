<!-- Navigation Bar -->
<div class="flex bg-blue-700 p-4 flex items-center">
    <div class="text-white flex items-center gap-4">
        <img src="assets/img/logo-eni.png" class="w-12" />
        <h1 class="text-2xl font-bold">Fil-Rouge</h1>
    </div>
    <div class="ml-auto flex space-x-4 flex items-center">
        <?php if(isset($_SESSION["user"])): ?>
            <div class="bg-blue-800 text-white rounded-full px-4 py-2 text-sm">Bienvenue, <?= $_SESSION["user"]["nom"]; ?> <?= $_SESSION["user"]["prenom"]; ?></div>
        <?php endif; ?>
        <a href="#" class="visited:text-blue-300 hover:text-white">Accueil</a>
        <a href="#" class="visited:text-blue-300 hover:text-white">Rechercher</a>
        <?php if(isset($_SESSION["user"])): ?>
            <a href="?page=logout" class="visited:text-blue-300 hover:text-white">Se déconnecter</a>
        <?php else: ?>
            <a href="?page=register" class="visited:text-blue-300 hover:text-white">S'inscrire</a>
            <a href="?page=login" class="visited:text-blue-300 hover:text-white">Se connecter</a>
        <?php endif; ?>

    </div>
</div>
