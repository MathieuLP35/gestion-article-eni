<?php require_once "includes/structure/header.php"; ?>

<?php
    if(isset($_GET["page"])) {
        switch($_GET["page"]) {
            case "login":
                if(!isset($_SESSION["user"])){
                    require_once "includes/pages/login.php";
                } else {
                    header("Location: /");
                }
                break;
            case "register":
                if(!isset($_SESSION["user"])){
                    require_once "includes/pages/register.php";
                } else {
                    header("Location: /");
                }
                break;
            case "article":
                if(isset($_SESSION["user"])) {
                    require_once "includes/pages/article/article.php";
                } else {
                    header("Location: /");
                }
                break;
            case "gestion_category":
                if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"]) {
                    require_once "includes/pages/admin/category.php";
                } else {
                    header("Location: /");
                }
                break;
            case "gestion_article":
                if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"]) {
                    require_once "includes/pages/admin/article.php";
                } else {
                    header("Location: /");
                }
                break;
            case "logout":
                session_destroy();
                header("Location: /");
            default:
                require_once "includes/pages/default.php";
        }
    } else {
        require_once "includes/pages/default.php";
    }
?>

<?php require_once "includes/structure/footer.php"; ?>
