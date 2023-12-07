<?php
    require_once "includes/class/CategorieArticle.php";
    $category = new CategorieArticle();
    $categories = $category->findAll();

    if(isset($_POST["categoryName"])) {
        $category->setLabel($_POST["categoryName"]);
        $category->create();
        header("Location: /?page=gestion_category");
    }
?>
<div class="py-32">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Ajouter une catégorie</h2>

        <form action="?page=gestion_category" method="post" class="space-y-4">
            <div class="flex flex-col">
                <label for="categoryName" class="mb-1">Nom de la catégorie :</label>
                <input type="text" id="categoryName" name="categoryName" class="border p-2 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Ajouter
            </button>
        </form>
    </div>

    <div class="mt-8 max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Liste des catégories</h2>

        <ul id="categoryList" class="list-none">
            <?php foreach($categories as $category): ?>
                <li class="flex justify-between items-center border-b py-2">
                    <span><?= $category["label"] ?></span>
                    <div class="flex">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mr-2">
                            Modifier
                        </button>
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                            Supprimer
                        </button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
