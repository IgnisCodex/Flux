<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: /login?error=not_logged_in");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/res/style.css">
</head>
<html>
<body>
    <div class="view">
        <div>
            <h2>Friend Requests</h2>
            <?php

            include __DIR__ . "../../../api/Fusion/System/friend-req-contr.class.php";

            $contr = new FriendRequestController($_SESSION['user']['id']);
            $requests = $contr->get();

            if (!empty($requests)) {
                foreach ($requests as $request) {
                    include __DIR__ . "../../../api/Fusion/System/user-contr.class.php";
                    $userContr = new UserController($request['user_id']);
                    $user_data = $userContr->get();

                    echo "<ul><li><p>" . $user_data['username'] . "</p><button>Accept</button><button>Decline</button></li></ul><br>";
                }
            } else {
                echo "<p>No pending friend requests.</p>";
            }

            ?>


            <h2>Request (TBD)</h2>
            <form action="/api/Fusion/System/friend-req.inc.php" method="POST">
                <button type="submit" name="submit">Request</button>
            </form>
        </div>
    </div>
</body>
</html>