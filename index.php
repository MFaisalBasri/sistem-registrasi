<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_prokerteknik23');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user");

    foreach ($query as $row) {
        if ($username == $row['nama']) {
            if ($password == $row['password']) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                echo "
				<script>
					alert('Selamat Anda berhasil login!');
					document.location.href ='absen.php';
				</script>
				";
            } else {
                echo "
				<script>
					alert('Ma\'af Anda gagal login!');
				</script>
				";
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5">Login Seminar</h1>
    <div class="" style="height: 100vh">
        <div class="d-flex justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100">
            <div class="card p-2 shadow p-3 mb-5 bg-body rounded" style="width: 18rem; z-index: 1;">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="" method="post">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama@proker.com" name="username">
                        <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput2" name="password">
                        <button type="submit" class="btn btn-primary ms-auto mb-2 mt-2" name="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>