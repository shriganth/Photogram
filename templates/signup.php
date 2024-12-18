<?php

    include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

    $signup = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['inputFirstName']) and isset($_POST['inputLastName']) and isset($_POST['inputUsername']) and isset($_POST['inputEmail']) and !empty($_POST['inputPassword'])) {
            $firstname = $_POST['inputFirstName'];
            $lastname = $_POST['inputLastName'];
            $username = $_POST['inputUsername'];
            $email = $_POST['inputEmail'];
            $password = $_POST['inputPassword'];
            $signup = User::signupData($firstname, $lastname, $username, $email, $password);
        }
        else {
            $signup = false;
        }
    }

if ($signup) { ?>
    <main class="container p-5">
        <div class="col border bg-light">
            <h2 class="pt-5 px-5" style="color: green">Signup success...!</h2>
            <p class="pt-2 px-5 pb-5">If you want to login, Please! <a href="_signin.php">Click me</a></p>
        </div>
    </main>

    <?php } else if($signup === false) { ?>
    <main class="container p-5">
        <div class="col border bg-light">
            <h2 class="p-5" style="color: red">Signup failed...!</h2>
        </div>
    </main>
    
    <?php } else { ?>
    <main>
        <div class="container p-5">
            <div class="row justify-content-md-center align-items-md-center">
                <h2 class="text-center mb-3">Signup</h2>
                <form action="_signup.php" method='post' class="col-4 border border-dark rounded p-5">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label">First name</label>
                        <input type="text" name="inputFirstName" id="inputFirstName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputLastName" class="form-label">Last name</label>
                        <input type="text" name="inputLastName" id="inputLastName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" name="inputUsername" class="form-control" id="inputUsername">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" name="inputEmail" class="form-control" id="inputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="inputPassword" class="form-control" id="inputPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Signup</button>
                </form>
            </div>
        </div>
    </main>
    
<?php } ?>