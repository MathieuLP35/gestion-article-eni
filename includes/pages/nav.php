<!-- Navigation Bar -->
<div class="flex bg-blue-700 p-4 flex items-center">
    <div class="text-white flex items-center gap-4">
        <img src="assets/img/logo-eni.png" class="w-12" />
        <h1 class="text-2xl font-bold">Fil-Rouge</h1>

        <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"]): ?>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Administration <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="?page=gestion_category" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gestion des catégories d'article</a>
                    </li>
                    <li>
                        <a href="?page=gestion_article" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gestion des articles</a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

    </div>
    <div class="ml-auto flex space-x-4 flex items-center">
        <?php if(isset($_SESSION["user"])): ?>
            <div class="bg-blue-800 text-white rounded-full px-4 py-2 text-sm">Bienvenue, <?= $_SESSION["user"]["nom"]; ?> <?= $_SESSION["user"]["prenom"]; ?></div>
        <?php endif; ?>
        <a href="/" class="visited:text-blue-300 hover:text-white">Accueil</a>
        <a href="#" class="visited:text-blue-300 hover:text-white">Rechercher</a>
        <?php if(isset($_SESSION["user"])): ?>
            <a href="?page=logout" class="visited:text-blue-300 hover:text-white">Se déconnecter</a>
        <?php else: ?>
            <a href="?page=register" class="visited:text-blue-300 hover:text-white">S'inscrire</a>
            <a href="?page=login" class="visited:text-blue-300 hover:text-white">Se connecter</a>
        <?php endif; ?>

    </div>
</div>
