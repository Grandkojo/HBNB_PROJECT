<script>
        function togglePasswordVisibility(ids, eye_icon) {
            let passwordInput = document.getElementById(ids);
            let eyeIcon = document.getElementById(eye_icon);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
    <script>
        function checkPasswordMatch() {
            let passwordInput = document.getElementById("password-input");
            let confirmpasswordInput = document.getElementById("confirmpassword");
            let messageElement = document.getElementById("message");
            if (confirmpasswordInput.value === "") {
                messageElement.innerHTML = "";
            } else if (confirmpasswordInput.value !== passwordInput.value) {
                messageElement.innerHTML = "<small>Passwords do not match</small>";
                result = false;
            } else {
                messageElement.innerHTML = "";
                result = true;
            }
            return result;
        }
    </script>
    <!-- <script>
        function goBack() {
            window.history.back();
        }
    </script> -->
    <script>
        let signupform = document.getElementById("signup");
    </script>

    <script>
        let formsubmit = document.getElementById("formsubmit");
        let password = document.getElementById("password-input");
        let confirmpassword = document.getElementById("confirmpassword");
        let alert = document.getElementById("alertbutton");


        formsubmit.addEventListener('click', function(event) {
            if (password.value !== confirmpassword.value) {
                alert.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Password does not match.</strong> Check passwords again.
                    </div>`;
                event.preventDefault();
                setTimeout(function() {
                    alert.innerHTML = "";
                }, 1500);


            } else {
                // alert.style.display = "none";
                alert.innerHTML = "";
                formsubmit.submit();
            }
        });
    </script>

    <script>
        function checkValidPassword() {
            let passwordInput = document.getElementById("password-input");
            let validpassword = document.getElementById("validpassword");
            if (passwordInput.value === "") {
                validpassword.innerHTML = "";
            } else if (passwordInput.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
                validpassword.innerHTML = "";
            } else {
                validpassword.innerHTML = "<small>Must contain at least one number, one uppercase, a lowercase letter, and at least 8 or more characters</small>";
            }

        }
    </script>

    <script>
        let logout = document.getElementById("logOut");
        if (logout) {
            logout.addEventListener('click', function() {
                swal({
                    title: "Are you sure?",
                    text: "Once logged out, you will have to login again!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willLogout) => {
                    if (willLogout) {
                        <?php
                        // session_unset();
                        // session_destroy();    
                        ?>
                        swal("You have been logged out!", {
                            icon: "success",
                        }).then(() => {
                            <?php
                            // session_unset();
                            // session_destroy();
                            ?>
                            location.reload();
                        });
                    } else {
                        swal("You are still logged in!");
                    }
                });
            });
        }
    </script>

    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alert = document.getElementById('alertbuttonprofile');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Show the alert
        setTimeout(hideAlert, 2000);
    </script>