<?php
include 'connect.php';
include 'header.php';

if (isset($_POST["submit"])) {
    $username = trim($_POST["name"]);
    $email = trim(strtolower($_POST['email']));
    $pass = trim($_POST['password']);
    $confirmPass = trim($_POST['conf-password']);
    $id_role = $_POST['id_role'];

    if ((empty($username)) || (strlen($username)>20)){
        print('<b>Entrez username </b><br>');
        exit();
    }

    if (empty($email)){
        print('<b>Entrez une adresse E-mail</b><br>');
        exit();
    }elseif(strlen($email)> 50){
        print('<b>Votre E-mail ne doit pas dépasser 50 caractères</b><br>');
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print('<b>Rentrez une adresse E-mail valide</b><br>');
        exit();
    }

    if(empty($pass)){
        print('<b>Entrez une password</b><br>');
        exit();
    }elseif($pass !== $confirmPass){
        print('<b>Vous avez tapé deux mots de passe différents</b>');
        exit(); 
    }elseif((strlen($pass)>15||strlen($pass)<5) || (!preg_match("#[0-9]+#", $pass)) || (!preg_match("#[a-zA-Z]+#", $pass))) {
        print('<b>Mot de passe non valide : entre 5 et 15 caractères et sans espace</b><br>');
        exit();
    }

    $has_pass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO utilisateur (username, id_role, email, password) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "siss", $username, $id_role, $email, $has_pass);

    $result = mysqli_query($conn, " SELECT * FROM utilisateur WHERE email = '$email'");   
  
    if (mysqli_fetch_assoc($result)>0){
        echo "<script>alert('email is exist');</script>"; 
    }else{
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "<script>alert('Insert successfully');</script>";
        header("Location: sing-in.php");
        exit();
    }
}
?>
<main>
    <nav class="navbar navbar-expand-sm  bg-light border">
        <div class="container">
            <a class="navbar-brand" href="" >
             You<span>Booking</span>
            </a>
            <form class="form-inline" action="registre.php">
            <button class="btn btn-success" type="submit">sing-in</button>
        </form>
        </div>
    </nav>
    <section class="py-5">
        <div class="container px-5">
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">register</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" required pattern="^[A-Za-z '-]+$" maxlength="20"/>
                                <label for="name">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="50" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">An assword is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="conf-password" class="form-control" id="inputPassword4" placeholder="Password">
                                <label for="conf-password">Confirm password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A confirm password is required.</div>
                            </div>
                            <div>
                            <div>
                                <select class="form-select mb-4" name="id_role" aria-label="Default select example">
                                    <option value="4">user</option>
                                    <option value="2">propr</option>
                                </select>
                            </div>

                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">sing-up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>