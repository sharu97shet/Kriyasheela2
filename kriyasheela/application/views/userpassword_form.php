<div class='container userform'>
    <div id="section_userform" class="col-md-9 offset-md-1">
        <div class="row mb-3 mt-3">

            <div class="col-sm-8">
                <span> Change Password</span>
            </div>

            <div>
                <?php if ($this->session->flashdata('passwordsuccess')) { ?>
                <p class="text-success col-sm-12">
                    <?= $this->session->flashdata('passwordsuccess') ?>
                </p>
                <?php } ?>
            </div>


            <div class="col-sm-12 mt-2" style="color:black">
                Please enter your old password, for security’s sake, and then enter your new password twice so we can
                verify
                you typed it in correctly.
            </div>

        </div>


        <form class="" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('user/MyProfile') ?>"
            enctype='multipart/form-data'>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> Old Password: </label>
                <div class="col-sm-6">
                    <input type="password" name="oldpassword" id="password" style="   width: 69%;" required />
                    <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;
    line-height: 1; "></i>

                    <!-- <span id="msg" style="  margin: 0px 14px;"></span> -->

                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
            </div>
            <hr>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> New Password: </label>
                <div class="col-sm-6">
                    <input type="password" name="newpassword" id="password1" onkeyup="validatePassword(this.value)"
                        style="width: 69%;" required />
                    <i class="bi bi-eye-slash" id="togglePassword1" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;
    line-height: 1; "></i>

                    <span id="msg1" style="  margin: 0px 14px;"></span>

                    <!-- <p> Your password must contain at least 8 characters.</p>
                    <p>Your password can’t be a commonly used password.</p>
                    <p>Your password can’t be entirely numeric.</p> -->


                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
            </div>

            <hr>

            <div class="row mb-2">
                <label for="inputPassword3" class="col-sm-4"> New password confirmation: </label>
                <div class="col-sm-6">
                    <input type="password" name="confirmpassword" id="password2" style="width: 69%;" required />
                    <i class="bi bi-eye-slash" id="togglePassword2" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;
    line-height: 1; "></i>

                    <span id="msg2" style="  margin: 0px 14px;"></span>

                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
            </div>

            <div class="row mb-3" style=" padding: 20px 166px ">
                <div class="col-sm-8">
                    <input type="submit" name="insert" value="CHANGE MY PASSWORD" class="float-right" style="background-color: #dc3545;
    border: none;
    border-radius: 6px;
    width: 64%;
    height: 40px;" />
                </div>
            </div>


        </form>
    </div>
</div>



<script>
function validatePassword(password) {

    //const Password = document.getElementById("password");

    //var PasswordValidation = Password.addEventListener("keyup", function(event) {


    // alert(password.length);
    //alert('yes321');

    //  password.length === 0

    if (document.getElementById("password1").value == '') {

        //  alert('yeah empty');
        document.getElementById("msg1").innerHTML = "";
        return;
    }

    if (password.length < 8) {

        var error = 'less than 8'


        //  return;

    } else if (password.search(/[a-z]/) < 0) {

        var error = ' Password must contain at least one lowercase letter';

    } else if (password.search(/[A-Z]/) < 0) {

        var error = '   Password must contain at least one uppercase letter ';

    } else if (password.search(/[0-9]/) < 0) {

        var error = 'Password must contain at least one number';

    } else if (password.search(/[*%]/) < 0) {

        var error = ' Password must be contains at least  special characters';

    } else {

        var error = '';

    }

    // Do not show anything when the length of password is zero.

    // Create an array and push all possible values that you want in password
    var matchedCase = new Array();
    matchedCase.push("[$@$!)(%*#?&]"); // Special Charector
    matchedCase.push("[A-Z]"); // Uppercase Alpabates
    matchedCase.push("[0-9]"); // Numbers
    matchedCase.push("[a-z]"); // Lowercase Alphabates

    // Check the conditions
    var ctr = 0;
    for (var i = 0; i < matchedCase.length; i++) {
        if (new RegExp(matchedCase[i]).test(password)) {
            ctr++;
        }
    }

    if (ctr === 0 || ctr === 1 || ctr === 2) {
        // alert('ctr is weak' + ctr);
        document.getElementById("msg1").innerHTML = "";
        //   event.preventDefault();
        // return false;
    }

    // Display it
    var color = "";
    var strength = "";
    switch (ctr) {
        case 0:
        case 1:
        case 2:
            strength = "Password is Very Weak" + ' ' + error;

            color = "red";
            break;

        case 3:
            strength = "Medium";
            color = "orange";
            break;

        case 4:
            strength = "Strong Password";
            color = "green";
            break;
    }


    document.getElementById("msg1").innerHTML = strength;
    document.getElementById("msg1").style.color = color;



    //})


    //alert('ctr is' + ctr);

}


const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
const password1 = document.querySelector("#password1");
const password2 = document.querySelector("#password2");

togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";

    password.setAttribute("type", type);


    // toggle the icon
    this.classList.toggle("bi-eye");
});

togglePassword1.addEventListener("click", function() {
    // toggle the type attribute

    const type1 = password1.getAttribute("type") === "password" ? "text" : "password";


    password1.setAttribute("type", type1);


    // toggle the icon
    this.classList.toggle("bi-eye");
});

togglePassword2.addEventListener("click", function() {
    // toggle the type attribute

    const type2 = password2.getAttribute("type") === "password" ? "text" : "password";

    password2.setAttribute("type", type2);

    // toggle the icon
    this.classList.toggle("bi-eye");
});
</script>