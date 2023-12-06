<?php require_once "includes/structure/header.php"; ?>

<?php
    if(isset($_GET["page"])) {
        switch($_GET["page"]) {
            case "login":
                require_once "includes/pages/login.php";
                break;
            case "register":
                require_once "includes/pages/register.php";
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
