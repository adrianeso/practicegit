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
                        while($result = $users->fetch_array(MYSQLI_ASSOC))
                        {
                    ?>
                    <tr>
                        <td><?php echo $result['id']; ?> </td>
                        <td><?php echo $result['name']; ?> </td>
                        <td><?php echo $result['email']; ?> </td>
                        <td><?php echo $result['phone_number']; ?> </td>
                        <td class="d-flex">

                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded">
                                <input type="hidden" name="user_id" value="<?php echo $result['id'] ?>">
                                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                            </form>

                            <form action="">
                                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
    if($_POST){

        $id = $_POST['user_id'];

        $sql2 = "SELECT * from users where id = '$id' ";

        $userData = $conexionMysqli->query($sql2);

        while ($result = $users->fetch_array(MYSQLI_ASSOC)){
            var_dump($result);
        }




    }else{
        echo "no sending data";
    }


?>