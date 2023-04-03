<?php echo "hiee?" ?>

<div class='container userform'>
    <div id="section_userform" class="col-md-9 offset-md-1">
        <span style="display: block;
	font-size: 25px;
	line-height: 28px;
	color: white;
	text-align: center;
	margin: 30px 0px; ">USER FORM </span>
        <form class="" id="usersubmit" method="post" autocomplete="off" action="<?= base_url('user/createUser') ?>"
            enctype='multipart/form-data'>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4">Type Of User</label>
                <div class="col-sm-8">
                    <select name="usertype" class="classic" id="usertypeid" onchange="userfields(event)">
                        <?php
                        foreach ($usertypes as $id) {
                            // var_dump($zones);
                            echo '<option value="' . $id['user_type_id'] . '">' . $id['user_type'] . '</option> ';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4">Image</label>
                <div class="col-sm-8">
                    <!-- <input type="file" name="profilephoto" id="profilephoto" aria-describedby="created_on" onchange="readfile(this)" /> -->


                    <input type="file" name="profilephoto" class="chooseFile" id="profilephoto"
                        onchange="readfile(this)" />

                    <!--
                            <input type="file" name="chooseFile" id="chooseFile">
                    -->


                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-8" id="displayimage">
                    <img id="propileimage" src="#" alt="your image" name="img" style="display:none" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="row mb-3" id="studentregno" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Student Reg Number</label>
                <div class="col-sm-8">
                    <input type="text" name="reg_no" id="srono" class="form-control">
                </div>
            </div>
            <div class="row mb-3" id="employeeID">
                <label for="inputPassword3" class="col-sm-4">ICAI Number</label>
                <div class="col-sm-8">
                    <input type="text" name="employee_id" id="employeeid" class="form-control">
                </div>
            </div>
            <div class="row mb-3" id="Articleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date Of Commencement Of Articleship</label>
                <div class="col-sm-8">
                    <input type="text" name="commencementofarticleship" id="date_picker4" placeholder="Date4"
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3" id="CommencementEmployment">

                <label for="inputPassword3" class="col-sm-4">Date Of Commencement Of Employment</label>
                <div class="col-sm-8">
                    <h6 for="inputPassword3" class="col-sm-2" id="emplyomenterror"></h6>
                    <input type="text" placeholder="Date1" name="commencementofemployment" id="date_picker1"
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3" id="completionArticleship" style="display:none">
                <label for="inputPassword3" class="col-sm-4">Date Of Completion Of Articleship</label>
                <div class="col-sm-8">
                    <input type="text" name="completionofarticleship" placeholder="Date3" class="form-control"
                        id="date_picker3">
                </div>
            </div>
            <div class="row mb-3" id="completionEmployment">
                <label for="inputPassword3" class="col-sm-4">Date Of Completion Of Employment</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Date2" name="completionofemployment" id="date_picker2"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-3" id="partner">
                <label for="inputPassword3" class="col-sm-4">Partner Under Whom Registered </label>
                <div class="col-sm-8">
                    <select name="partner_registered" id="type_of_work" class="classic" aria-describedby="type_of_work">
                        <option value="">select</option>
                        <option value="REB">REB</option>
                        <option value="AVM">AVM</option>
                        <option value="NKSB">NKSB</option>
                        <option value="ASN">ASN</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4">Balu & Anand Id Number</label>
                <div class="col-sm-8">
                    <input type="text" name="balunandno" id="balunandno" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Personal Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="personalemail" id="personalmail" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Official Email Address </label>
                <div class="col-sm-8">
                    <input type="email" name="officialemail" id="officialemail" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Mobile Number </label>
                <div class="col-sm-8">
                    <input type="tel" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10"
                        title="10 digits Mobile Number" required>
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Password </label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" onkeyup="validatePassword(this.value)" />
                    <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: black;  vertical-align: text-bottom;
    line-height: 1; "></i>

                    <span id="msg" style="  margin: 0px 14px;"></span>

                    <!-- <button type="submit" id="submit" class="submit"></button>  onkeyup="validatePassword(this.value)"-->
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4"> Blood Group </label>
                <div class="col-sm-8">
                    <input type="text" name="bloodgroup" id="blood" class="form-control">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-8">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" onclick="submituser()" />
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

    if (document.getElementById("password").value == '') {

        //  alert('yeah empty');
        document.getElementById("msg").innerHTML = "";
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
        document.getElementById("msg").innerHTML = "";
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


    document.getElementById("msg").innerHTML = strength;
    document.getElementById("msg").style.color = color;

    //})


    //alert('ctr is' + ctr);

}


const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
});

// prevent form submit
// const form = document.querySelector("form");
// form.addEventListener('submit', function(e) {
// e.preventDefault();
// });
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</script>
<script type="text/javascript">
function submituser() {
    var submitdetails = document.getElementById('usersubmit');
    //alert('vvvviiii');
    submitdetails.addEventListener('submit', (event) => {
        //alert('form submitted');

        const empID = document.getElementById("usertypeid").value;

        // alert(empID);

        if (empID == 2) {
            var username = document.getElementById("username").value;

            if (username == '') {

                document.getElementById('username').style.border = '3px solid red';
                event.preventDefault();
            }

            var employementcommencement = document.getElementById("date_picker1").value;

            if (employementcommencement == '') {

                document.getElementById('date_picker1').style.border = '3px solid red';

                // document.getElementById('emplyomenterror').textContent =
                //     'Please Select Date Of Commencement Of Employment';
                event.preventDefault();
            }

        }


        if (empID == 3) {

            // alert(true);
            var articlecommencement = document.getElementById("date_picker4").value;


            if (articlecommencement == '') {


                document.getElementById('date_picker4').style.border = '3px solid red';
                event.preventDefault();
            }

        }

        if (document.getElementById("msg").style.color == "red") {

            //alert("yes cant");
            event.preventDefault();

        }

        if (document.getElementById("password").value == '') {

            //alert("yes cant");
            event.preventDefault();

        }



    })
}
</script>
<script type="text/javascript">
function readfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("propileimage").style.display = 'block';
            document.getElementById("propileimage").src = e.target.result;
            document.getElementById("propileimage").style.width = '100px';
            document.getElementById("propileimage").style.height = '200px';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function userfields(event) {
    // alert(event.target.value);
    document.getElementById('employeeID').style.display = 'flex';
    document.getElementById('CommencementEmployment').style.display = 'flex';
    document.getElementById('completionEmployment').style.display = 'flex';
    document.getElementById('studentregno').style.display = 'flex';
    document.getElementById('Articleship').style.display = 'flex';
    document.getElementById('completionArticleship').style.display = 'flex';
    document.getElementById('partner').style.display = 'flex';
    if (event.target.value == 3) {
        document.getElementById('employeeID').style.display = 'none';
        document.getElementById('CommencementEmployment').style.display = 'none';
        document.getElementById('completionEmployment').style.display = 'none';
    }
    if (event.target.value == 4) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
        document.getElementById('partner').style.display = 'none';
    }
    if (event.target.value == 2) {
        document.getElementById('studentregno').style.display = 'none';
        document.getElementById('Articleship').style.display = 'none';
        document.getElementById('completionArticleship').style.display = 'none';
    }

    //return event.target.value;

}
</script>

<script>
var emailAddress = document.getElementById("emailAddress");
var emailAddressValidation = function() {
    emailAddressValue = emailAddress.value.trim();
    validEmailAddress = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    emailAddressErr = document.getElementById('email-err');
    if (emailAddressValue == "") {
        emailAddressErr.innerHTML = "Email Address is required";
    } else if (!validEmailAddress.test(emailAddressValue)) {
        emailAddressErr.innerHTML = "Email Addre must be in valid formate with @ symbol";
    } else {
        emailAddressErr.innerHTML = "";
        return true;
    }
}
emailAddress.oninput = function() {
    emailAddressValidation();
}
</script>

<script>
$.validator.addMethod(
    "tendigits",
    function(value, element) {
        if (value == "")
            return false;
        return value.match(/^\d{10}$/);
    },
    "Please enter 10 digits Contact # (No spaces or dash)"
);

$('#frm_registration').validate({
    rules: {
        phone: "tendigits"
    },
    messages: {
        phone: "Please enter 10 digits Contact # (No spaces or dash)",

    }

});
</script>



<script type="text/javascript">
jQuery(document).ready(function($) {
    $('select').find('option[value=2]').attr('selected', 'selected');
});
</script>
<!-- Javascript -->
<script>
$(document).ready(function() {
    var startDate;
    var endDate;
    $("#date_picker1").datepicker({
        dateFormat: 'dd-mm-yy'
    })
    $("#date_picker2").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $("#date_picker3").datepicker({
        dateFormat: 'dd-mm-yy'
    })
    $("#date_picker4").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $('#date_picker1').change(function() {
        startDate = $(this).datepicker('getDate');
        $("#date_picker2").datepicker("option", "minDate", startDate);
    })
    $('#date_picker2').change(function() {
        endDate = $(this).datepicker('getDate');
        $("#date_picker1").datepicker("option", "maxDate", endDate);
    })
    $('#date_picker4').change(function() {
        startDate = $(this).datepicker('getDate');
        $("#date_picker3").datepicker("option", "minDate", startDate);
    })
    $('#date_picker3').change(function() {
        endDate = $(this).datepicker('getDate');
        $("#date_picker4").datepicker("option", "maxDate", endDate);
    })
})
</script>