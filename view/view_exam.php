<?php
    $userSelected = $_GET['param1'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <title>Exam</title>
        <base href="<?= $web_root ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
        <script src="javascript/exam.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header class="sticky-top">
            <?php $back_url = "items/display"; $title = "Exam"; include("partials/top_navbar.php"); ?>
        </header>
        <main class="container py-4 flex-grow-1">
            <div>
                <form action="exam/userSelection" method="post">
                    <div class="mb-4">
                        <h6>User</h6>
                        <div>
                            <select id="user-list" name="userSelectedIdForm">
                                <option value="0" <?= $userSelected == 0 ? "selected" : "" ?>>Choose a user</option>
                                <?php foreach ($users as $user): ?>
                                    <option <?= $userSelected == $user->get_id() ? "selected" : "" ?> value="<?= $user->get_id() ?>"><?= $user->get_pseudo() ?> (<?= $user->get_full_name() ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit">OK</button>
                        </div>
                    </div>
                </form>

                <?php if (isset($userSelected) && $userSelected != 0): ?>
                    <div class="mb-4">
                        <h6>Category</h6>
                        <div>
                            <select id="category-list">
                                <option value="">Choose a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->get_id() ?>"><?= $category->get_name() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="title-position"></div>
                <div id="checkbox-list"></div>
                <button id="submit-button" type="button">Add category</button>
            </div>
        </main>
        <footer class="sticky-bottom">
            <?php include("partials/bot_navbar.php"); ?>
        </footer>
    </body>
</html>