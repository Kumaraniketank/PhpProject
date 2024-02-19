<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Register for New Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="handleSignup.php" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signUpEmail" name="signUpEmail"
                            aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">OTP</label>
                        <input type="number" class="form-control" id="signUpEmail" name="otp"
                            aria-describedby="emailHelp">

                        <button type="submit" class="btn btn-primary my-3">Verify</button>



                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signUpEmail" name="signUpEmail"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" name="signUpPassword">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signUpCPassword" name="signUpCPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>

                </div>

            </form>
        </div>
    </div>
</div>