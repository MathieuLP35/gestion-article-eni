<?php
    require_once "includes/class/CategorieArticle.php";
    require_once "includes/class/Article.php";
    require_once "includes/class/Commentaire.php";

    if (!isset($_GET['id'])){
        $article = new Article();
        $articles = $article->findAll();
    } else{
        $article = new Article();
        $article->setId($_GET['id']);
        $article = $article->find();

        $commentaire = new Commentaire();
        $commentaire->setIdArticle($_GET['id']);
        $commentaires = $commentaire->find();
    }

    if(isset($_POST["commentaire"])) {
        $commentaire = new Commentaire();
        $commentaire->setCommentaire($_POST["commentaire"]);
        $commentaire->setIdArticle($_GET['id']);
        $commentaire->setPseudo($_SESSION['user']['nom']." ".$_SESSION['user']['prenom']);
        $commentaire->create();
        header("Location: /?page=article&id=".$_GET['id']);
    }

?>
<div class="bg-white mx-auto p-6 my-8 rounded-md shadow-md">
    <?php if (!isset($_GET['id'])) : ?>
        <?php foreach ($articles as $a): ?>
            <a href="?page=article&id=<?= $a["id"] ?>" class="block w-full">
                <div class="relative bg-gray-100 p-6 rounded-md border w-96 m-2">
                    <h3 class="text-2xl font-semibold mb-2"><?= $a["label"] ?></h3>
                    <p class="text-gray-700 mb-2"><?= $a["description"] ?></p>
                    <p class="text-gray-800 font-bold"><?= $a["prix"] ?> €</p>
                    <div class="absolute top-0 right-0 mt-2 mr-2 m-2">
                        <span class="bg-blue-500 text-white py-1 px-2 rounded-full text-xs"><?= $a["categorie_label"] ?></span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($_GET['id'])) : ?>
        <a href="?page=article">
            <button class="bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none mb-4">
                <h3 class="text-sm font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>
                    Retour
                </h3>
            </button>
        </a>

        </a>
        <?php if($article) : ?>
            <div class="grid grid-cols-2 gap-4">
                <div class="relative bg-gray-100 p-4 rounded-md border col-span-1">
                    <h3 class="text-xl font-semibold mb-2"><?= $article['label'] ?></h3>
                    <p class="text-gray-700 mb-2"><?= $article['description'] ?></p>
                    <p class="text-gray-800 font-bold"><?= $article['prix'] ?> €</p>
                    <div class="absolute top-0 right-0 mt-2 mr-2 m-2">
                        <span class="bg-blue-500 text-white py-1 px-2 rounded-full text-xs"><?= $article['categorie_label'] ?></span>
                    </div>
                </div>

                <div class="bg-gray-100 p-4 rounded-md border col-span-1">
                    <h3 class="text-xl font-semibold mb-2">Ajouter un commentaire</h3>
                    <form action="?page=article&id=<?= $_GET['id'] ?>" method="post" class="space-y-4">
                        <div class="flex flex-col">
                            <label for="commentaire" class="mb-1">Commentaire :</label>
                            <textarea id="commentaire" name="commentaire" class="border p-2 rounded-md" required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Ajouter
                        </button>
                    </form>
                </div>

                <div class="bg-gray-100 p-4 rounded-md border col-span-2">
                    <h3 class="text-xl font-semibold mb-2">Commentaires</h3>

                    <?php foreach ($commentaires as $c): ?>
                        <div class="relative bg-gray-100 p-4 rounded-md border m-1">
                            <h3 class="font-semibold mb-2"><?= $c["pseudo"] ?></h3>
                            <p class="text-gray-700 mb-2"><?= $c["commentaire"] ?></p>
                            <p class="text-gray-500 text-sm"><?= $c["date_commentaire"] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        <?php else: ?>
            <h3 class="text-xl font-semibold mb-2">Aucun article trouvé</h3>
        <?php endif; ?>
    <?php endif; ?>

</div>
