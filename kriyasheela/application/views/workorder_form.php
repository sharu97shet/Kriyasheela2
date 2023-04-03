<div class='container userform'>
    <div id="section_userform" class="col-md-9 offset-md-1">
        <span class="span">Workorder Form</span>
        </legend><br>
        <form method="post" autocomplete="off" action="<?= base_url('workorder/registerNow') ?>">
            <div class="row mb-3">
                <label for="type_of_work" class="col-sm-4">Type of Work :</label>
                <div class="col-sm-8">
                    <select placeholder="Type of Work" name="type_of_work" id="type_of_work" class="form-control" aria-describedby="type_of_work" onchange="typeofwork();">
                        <option value="">Select</option>
                        <?php foreach ($typeofworkorder as $typeofworkorders) : ?>
                            <option value="<?= $typeofworkorders['type_of_work_id']; ?>">
                                <?= $typeofworkorders['type_of_work']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="workorder_no" class="col-sm-4">Workorder No :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Workorder No" name="workorder_no" class=" form-control" id="workorder_no" aria-describedby="workorder_no">
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Created On :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Created On" name="created_on" class="form-control" id="date_picker" aria-describedby="created_on">
                </div>
            </div>


            <div class="row mb-3">
                <label for="client_name" class="col-sm-4">Legal Name / Trade Name :</label>
                <div class="col-sm-8">

                    <select name="client_name" id='slct1'>
                        <option value="">Select</option>
                        <?php foreach ($clientname as $clientnamerecord) : ?>
                            <option value="<?= $clientnamerecord['name']; ?>"><?= $clientnamerecord['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>


                </div>
            </div>


            <div class="row mb-3">
                <label for="partner_in_charge" class="col-sm-4">Partner in Charge :</label>
                <div class="col-sm-8">
                    <select placeholder="Partner_in_charge" name="partner_in_charge" id="partner_in_charge" class="classic" aria-describedby="partner_in_charge">
                        <option value="">Select</option>
                        <option value="REB">REB</option>
                        <option value="AVM">AVM</option>
                        <option value="NKSB">NKSB</option>
                        <option value="ASN">ASN</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Start Date :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Start Date" name="start_date" id="date_picker1" size=9 class="form-control" aria-describedby="start_date">
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Targetted End Date :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Targetted End Date" name="targetted_end_date" id="date_picker2" class="form-control" aria-describedby="targetted_end_date" size=9>
                </div>
            </div>
            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">DeadLine :</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Deadline" name="deadline" id="date_picker3" class="form-control" aria-describedby="deadline" size=9>
                </div>
            </div>

            <!-- <div class="row mb-3 details">
				<label for="assign_to" class="col-sm-4">Assign To::</label>
				<div class="col-sm-4">
					<select name="assign_to[]" class="custom-select">
						<option value="">Select </option>
						<?php foreach ($assign_to as $worksheetrecord) : ?>
							<option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-4">

					<input type="button" class="btn btn-primary add" value="+"> Add More
				</div>
			</div> -->


            <div class="row mb-3">
                <label for="demo-date" class="col-sm-4">Assign To :</label>
                <div class="col-sm-5" style="max-width: 37.666667%;">
                    <div id="testingDiv1" class="mb-3 clonedInput">

                        <select name="assign_to[]" class="form-control classic" id="select" aria-describedby="assign_to[]">
                            <option value="">Select</option>
                            <?php foreach ($assign_to as $worksheetrecord) : ?>

                                <option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button class='btn btn-success' id="btnAdd">
                        Add More
                    </button>
                </div>
                <div class="col-sm-1">
                    <button id="btnDel" class='btn btn-danger'>
                        Delete
                    </button>
                </div>

            </div>


            <div style="display: flex;">

            </div>
            <div class="row mb-3">
                <label for="remarks" class="col-sm-4">Remarks :</label>
                <div class="col-sm-8">
                    <textarea type="text" placeholder="Remarks" class="form-control" name="remarks" id="remarks" col="50" row="50"></textarea>
                </div>
            </div>
            <!-- <div class="row">
			<div class="col-10 save">
				 <input type="submit" value="Submit" onclick="SaveStudentDetails()">
			</div>
		</div> -->
            <!-- <div class="text-center">
                <button type="submit" class="btn btn-primary">Sumbit</button>
            </div> -->
            <!-- CB Megallaa -->
            <div class="row mb-3">
                <div class="col-10 onlineform textcolor">
                    <input type="submit" name="insert" value="Submit" class="btn btn-info" />
                    <?php
                    echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                    ?>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('success')) {    ?>
                <p class="text-success text-center" style="margin-top: 10px;"> <?= $this->session->flashdata('success') ?>
                </p>
            <?php } ?>
        </form>
        </section>
        <!-- Begin Footer -->
        <script>
            function typeofwork() {
                const dummy = "<?php echo $workdata ?>";
                // alert(dummy);
                var CurrentYear = new Date().getFullYear().toString().substr(-2);
                //  alert(CurrentYear);
                var workorder_no = document.getElementById("workorder_no").value;
                //  alert(workorder_no);
                var date = document.getElementById("type_of_work").value;
                $.ajax({
                    url: "<?php echo base_url('workorder/ajaxworkorder') ?>",
                    type: 'post',
                    data: {
                        typeofworkid: date,
                    },
                    success: function(json) {

                        var jsondata = JSON.parse(json);

                        document.getElementById("workorder_no").value = CurrentYear + '' + jsondata[0].prefix +
                            dummy;

                    },
                    error: function() {
                        alert('Not Found ');
                    }
                });
                //alert(date);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css" rel="stylesheet">
        <!-- this is for select tag search -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script>
            $(document).ready(function() {

                //alert('yes');

                var startDate;
                var endDate;
                var DeadLine;
                $("#date_picker1").datepicker({
                    dateFormat: 'dd-mm-yy'
                })
                $("#date_picker").datepicker({
                    dateFormat: 'dd-mm-yy'
                })

                $("#date_picker2").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
                $("#date_picker3").datepicker({
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
                $('#date_picker3').change(function() {
                    endDate2 = $(this).datepicker('getDate');
                    $("#date_picker2").datepicker("option", "maxDate", endDate2);
                })

            })
        </script>


        <script>
            $(document).ready(function() {
                $('#btnAdd').click(function(e) {
                    e.preventDefault()
                    var num = $('.clonedInput').length,
                        newNum = new Number(num + 1),
                        newElem = $('#testingDiv' + num)
                        .clone()
                        .attr('id', 'testingDiv' + newNum)
                        .fadeIn('normal')
                    // alert(num)
                    // Store the block in a variable
                    var $block = $('.clonedInput:last')
                    // Grab the selected value
                    var theValue = $block.find(':selected').val()
                    // Clone the block
                    var clone = $block.clone()
                    // Find the selected value in the clone, and remove
                    if (theValue != 'PleaseSelectOne')
                        clone.find('option[value=' + theValue + ']').remove()
                    // Grab the select in the clone
                    var $select = clone.find('select')
                    var newId = 'testingDiv' + newNum
                    // console.log(newId)
                    // Update its ID by concatenating theValue to the current ID
                    $select.parent().attr('id', newId)
                    $('#testingDiv' + num).after(clone)
                    $('#btnDel').attr('disabled', false)
                    if (newNum == 5)
                        $('#btnAdd')
                        .attr('disabled', true)
                        .prop('value', "You've reached the limit")
                })
                $('#btnDel').click(function(e) {
                    e.preventDefault()
                    var num = $('.clonedInput').length
                    $('#testingDiv' + num).slideUp('slow', function() {
                        $(this).remove()
                        if (num - 1 === 1) $('#btnDel').attr('disabled', true)
                        $('#btnAdd').attr('disabled', false).prop('value', 'ADD MORE')
                    })
                    // return false
                    $('#btnAdd').attr('disabled', false)
                })
                $('#btnDel').attr('disabled', true)
            })
        </script>
        <script>
            $(document).ready(function() {

                //change selectboxes to selectize mode to be searchable
                $("#slct1").select2();
            });
        </script>