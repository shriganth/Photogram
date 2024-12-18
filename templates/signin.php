<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['inputemail']) and !empty($_POST['inputpassword'])) {
        $email = $_POST['inputemail'];
        $password = $_POST['inputpassword'];
        $result = User::signinData($email, $password);
    } else {
        $result = false;
    }
}

if ($result) { include_once "/var/labsstorage/home/shriganth87/htdocs/photogram/index.php";?>
    
<?php } else { ?>

    <main>
        <div class="container p-5">
            <div class="row justify-content-md-center align-items-md-center">
                <h2 class="text-center mb-3">Signin</h2>
                <form action="_signin.php" method="post" class="col-4 border border-dark rounded p-5">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" name="inputemail"  class="form-control" id="inputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="inputpassword" class="form-control" id="inputPassword">
                    </div>
                    <div class="mb-3 form-check">   
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Signin</button>
                </form>
            </div>
        </div>
    </main>
<?php } ?>