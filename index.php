<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login System</title>
</head>

<body>
    <div class="container">
        <main>
            <?php if (!isset($_SESSION["user_id"])) { ?>
                <section class="form-section">
                    <h3>Login</h3>
                    <form action="includes/login.inc.php" method="post" class="form">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="pwd" placeholder="Password" required>
                        <button type="submit">Login</button>
                    </form>
                    <?php check_login_errors(); ?>
                </section>
            <?php } ?>

        </main>
    </div>
</body>

</html>