<div class='container userform'>
    <div id="section_userform">
        <span>USER DETAIL</span>
        <form class="form col-md-8 offset-md-1" method="post" autocomplete="off">
            <?php
			/*
                  <td><a href="<?=base_url("user/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
            if (count($userdetailsdata) > 0) {
            foreach ($userdetailsdata as $row) {
            ?>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['name'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3" id="displayimage">
                <label for="demo-date" class="col-sm-3">Profile photo</label>
                <div class="col-sm-9">

                    <img id="propileimage" src="<?php echo base_url('photos/' . $row['image']) ?>" width="100px"
                        height="100px" alt="your image" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">ICAI Number</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['ID'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Start Date </label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['startdate'] ?>" aria-describedby="created_on" disabled />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">End Date</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['enddate'] ?>" aria-describedby="created_on" disabled />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Partner Under Whom Registered </label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['partner_under_whom_registered'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Balunand Id Number</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['balunand_id_no'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Personal Email Address</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['personal_email'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Official Email Address</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['official_email'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Mobile Number </label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['mobile_no'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-3">Blood Group</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username"
                        value="<?php echo $row['bloodgroup'] ?>" aria-describedby="created_on" />
                </div>
            </div>
            <?php
				}
			}
			?>
        </form>
    </div>
</div>
<script type="text/javascript">
function readfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("propileimage").style.display = 'block';
            document.getElementById("propileimage").src = e.target.result;
            document.getElementById("propileimage").style.width = '100px';
            document.getElementById("propileimage").style.height = '150px';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function userfields(event) {
    alert(event.target.value);
    document.getElementById('employeeID').style.display = 'block';
    document.getElementById('CommencementEmployment').style.display = 'block';
    document.getElementById('completionEmployment').style.display = 'block';
    document.getElementById('studentregno').style.display = 'block';
    document.getElementById('Articleship').style.display = 'block';
    document.getElementById('completionArticleship').style.display = 'block';
    document.getElementById('partner').style.display = 'block';
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
        document.getElementById('partner').style.display = 'none';
    }
}
</script>