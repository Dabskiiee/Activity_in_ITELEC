<?php
require_once 'authentication/admin-class.php';

$admin = new ADMIN();
if(!$admin->IsUserLoggedIn())
{
    $admin->redirect('../../');
}

$stmt = $admin->runQuery("SELECT * FROM user WHERE id =:id");
$stmt ->execute(array(":id"=> $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200&display=swap" rel="stylesheet">
</head>
<body>
    <h1>WELCOME <?php echo $user_data['email']?></h1>
    <button><a href="authentication/admin-class.php?admin_signout">SIGN OUT</a></button>
</body>

</html>