<?php
    require_once "includes/class/CategorieArticle.php";
    require_once "includes/class/Article.php";

    $category = new CategorieArticle();
    $categories = $category->findAll();

    $article = new Article();
    $articles = $article->findAll();

    if(isset($_POST["articleTitle"]) && isset($_POST["articleDescription"]) && isset($_POST["articleCategory"]) && isset($_POST["articlePrix"])) {
        $article = new Article();
        $article->setLabel($_POST["articleTitle"]);
        $article->setDescription($_POST["articleDescription"]);
        $article->setPrix($_POST["articlePrix"]);
        $article->setCategorie($_POST["articleCategory"]);
        $article->create();
        header("Location: /?page=gestion_article");
    }

    if(isset($_GET["delete"])) {
        $article = new Article();
        $article->setId($_GET["delete"]);
        $article->delete();
        header("Location: /?page=gestion_article");
    }
?>
<div class="container-fluid my-32 grid justify-items-stretch">
    <div class="mx-auto bg-white p-6 rounded-md shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Créer un article</h2>

        <form method="post" action="?page=gestion_article" class="space-y-4">
            <div class="flex flex-col">
                <label for="articleTitle" class="mb-1">Titre de l'article :</label>
                <input type="text" id="articleTitle" name="articleTitle" class="border p-2 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="articleDescription" class="mb-1">Description :</label>
                <textarea id="articleDescription" name="articleDescription" class="border p-2 rounded-md" required></textarea>
            </div>

            <div class="flex flex-col">
                <label for="articlePrix" class="mb-1">Prix :</label>
                <input type="number" id="articlePrix" name="articlePrix" class="border p-2 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="articleCategory" class="mb-1">Catégorie :</label>
                <select id="articleCategory" name="articleCategory" class="border p-2 rounded-md">
                    <?php foreach($categories as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= $c['label'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Créer l'article
            </button>
        </form>
    </div>
    <div class="bg-white p-6 rounded-md shadow-md mt-10 justify-self-center">
        <h2 class="text-2xl font-semibold mb-4">Liste des articles</h2>

        <table class="border-collapse border border-gray-300">
            <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Titre</th>
                <th class="border p-2">Description</th>
                <th class="border p-2">Prix</th>
                <th class="border p-2">Catégorie</th>
                <th class="border p-2">Actions</th>
            </tr>
            </thead>
            <tbody id="articleList">
                <?php foreach($articles as $a): ?>
                    <tr class="border">
                        <td class="border p-2"><?= $a["label"] ?></td>
                        <td class="border p-2"><?= $a["description"] ?></td>
                        <td class="border p-2"><?= $a["prix"] ?></td>
                        <td class="border p-2"><?= $a["categorie_label"] ?></td>
                        <td class="border p-2 flex justify-center">
                            <form method="post" action="?page=gestion_article&delete=<?= $a["id"] ?>" class="space-y-4">
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>