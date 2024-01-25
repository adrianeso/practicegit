<?php
$conexionMysqli = new mysqli('localhost', 'root', '', 'test');

$sql = "SELECT * FROM users";

$users = $conexionMysqli->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>

    <title>Show data </title>


</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-5">Users for event</h1>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th colspan="2">actions</th>
        </tr>
        </thead>

        <tbody>
        <?php
        while ($result = $users->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $result['id']; ?> </td>
                <td><?php echo $result['name']; ?> </td>
                <td><?php echo $result['email']; ?> </td>
                <td><?php echo $result['phone_number']; ?> </td>
                <td class="d-flex">

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"
                          enctype="application/x-www-form-urlencoded">
                        <input type="hidden" name="user_id" value="<?php echo $result['id'] ?>">
                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                    </form>

                    <form action="form/deleteuser.php" method="post" id="deleteUser" enctype="application/x-www-form-urlencoded"
                          onsubmit="return false" name="deleteUserForm">
                        <input type="hidden" name="user_id" value="<?php echo $result['id'] ?>">
                        <button type="submit"  onclick="message()" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>


    <div class="container">
        <?php

        if ($_POST) {
            $id = $_POST['user_id'];
        ?>
            <h2>edit info user</h2>

            <?php

            $sql2 = "SELECT * from users where id = '$id' ";

            $userData = $conexionMysqli->query($sql2);

            if ($userData) {

                foreach ($userData as $user) {

                    ?>

                    <form class="form" action="form/edituser.php" method="post" enctype="application/x-www-form-urlencoded">

                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="<?php echo $user['phone_number']; ?>">
                        </div>



                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>

                    <?php

                }
            }

        } else {
            echo "no sending data";
        }

        ?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
<script>

    function message(){

        let form = document.getElementById('deleteUser');

        let option = confirm("Are you sure");

        if(option){
            form.submit();
        }else{
        }

    }
</script>
</body>
</html>


