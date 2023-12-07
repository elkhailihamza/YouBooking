<?php
include 'connect.php';
include 'header.php';

if(isset($_POST['submit'])){
$email = stripcslashes(strtolower($_POST['email']));
$pass = stripcslashes($_POST['password']);

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


$stmt = mysqli_prepare($conn, "SELECT id_utilisateur, id_role, password FROM utilisateur WHERE email = ? ");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($pass, $row['password'])){
        $_SESSION["id"]=$row['id_utilisateur'];
        $_SESSION["id_role"]=$row['id_role'];
        if($_SESSION["id_role"]===1){
            header("Location: cli.php");
            exit();
        }elseif($_SESSION["id_role"] ===2){
            header("Location: prop.php");
            exit();
        }elseif($_SESSION["id_role"] ===3){
            header("Location: respo.php");
            exit();
        }elseif($_SESSION["id_role"] >=4){
            header("Location: admin.php");
            exit();
        }
    }
    else{
        echo "<script>alert('Mot de passe ou e-mail incorrect');</script>";
    }
}   
else{
    echo "<script>alert('Passwords or email not corect');</script>";
}
mysqli_stmt_close($stmt);
}
?> 

<main>
    <nav class="navbar navbar-expand-sm  bg-light border">
        <div class="container">
            <a class="navbar-brand" href="" >
             You<span>Booking</span>
            </a>
            <form class="form-inline" action="sing-up.php">
            <button class="btn btn-success" type="submit">sing-up</button>
        </form>
        </div>
    </nav>
    <section class="py-5">
        <div class="container px-5">
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">Login</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form  id="contactForm" name="Forms"  data-sb-form-api-token="API_TOKEN" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="50" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">An password is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.</div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">sing-in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>

</script>
<?php include 'footer.php'; ?>



















