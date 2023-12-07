<?php
include '../config/db_connection.php';
include '../includes/reg_header.php';
include '../includes/register.php';

?>
<section>
    <div class="container px-5">
        <div class="rounded-4 px-4 px-md-5">
            <div class="text-center mb-4">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">register</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" required
                                pattern="^[A-Za-z '-]+$" maxlength="20" />
                            <label for="name">Username</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email"
                                placeholder="name@example.com" data-sb-validations="required,email" required
                                pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="50" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="inputPassword4"
                                placeholder="Password">
                            <label for="password">Password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">An assword is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="conf-password" class="form-control" id="inputPassword4"
                                placeholder="Password">
                            <label for="conf-password">Confirm password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">A confirm password is
                                required.</div>
                        </div>
                        <div>
                            <div>
                                <select class="form-select mb-4" name="id_role" aria-label="Default select example">
                                    <option value="currentrole" hidden disabled selected>Current Role</option>
                                    <option value="1">user</option>
                                    <option value="2">propr</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary px-4 py-2">sign-up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?php include '../includes/footer.php'; ?>