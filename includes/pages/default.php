<!-- Banner -->
<div class="pt-8 pb-6 px-4 mx-auto lg:pt-16 lg:pb-12">
    <div class="p-8 md:p-12 mb-8">
        <h1 class="text-gray-700 dark:text-white text-5xl md:text-5xl font-extrabold mb-2"><?= $titreSite ?></h1>
        <p class="text-2xl font-normal text-gray-500 dark:text-gray-400 mb-6"><?= $descriptionSite ?></p>
        <?php if(!isset($_SESSION["user"])): ?>
            <a href="?page=register" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                S'inscrire
            </a>
        <?php endif; ?>
    </div>
</div>
<!-- Grid Container -->
<div class="grid grid-cols-2 gap-8 p-8 flex-grow">

    <!-- Informations Block -->
    <div class="bg-gray-800 p-12 shadow-md text-white rounded-lg">
        <h3 class="text-xl font-bold mb-4">Informations</h3>
        <p>Contenu du bloc Informations...</p>
        <?php if(!isset($_SESSION["user"])): ?>
            <a href="?page=register" class="inline-block mt-6 text-gray-200 hover:text-gray-800 border border-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                S'inscrire
            </a>
        <?php endif; ?>
    </div>

    <!-- À Propos Block -->
    <div class="bg-indigo-100 p-12 shadow-md rounded-lg">
        <h3 class="text-xl font-bold mb-4">À Propos</h3>
        <p>Contenu du bloc À Propos...</p>
        <?php if(!isset($_SESSION["user"])): ?>
            <a href="?page=login" class="inline-block mt-6 text-gray-800 hover:text-white border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                Se connecter
            </a>
        <?php endif; ?>
    </div>

</div>
