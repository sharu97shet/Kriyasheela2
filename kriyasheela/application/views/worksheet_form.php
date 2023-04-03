    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha256-XPTBwC3SBoWHSmKasAk01c08M6sIA5gF5+sRxqak2Qs=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha256-xaF9RpdtRxzwYMWg4ldJoyPWqyDPCRD0Cv7YEEe6Ie8=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha256-z0oKYg6xiLq3yJGsp/LsY9XykbweQlHl42jHv2XTBz4=" crossorigin="anonymous"></script>
    <div class='container userform'>
        <div id="section_userform1" class="col-md-9 offset-md-1">
            <!-- Include Bootstrap DateTimePicker CDN -->

            <span id="span">Worksheet Form </span>
            <form class="" method="post" autocomplete="off" action="<?= base_url('worksheet/createWorksheet'); ?>">
                <!-- <div class="row mb-3">
    						<label for="workorder_no" class="col-sm-4">Workorder No:</label>
    						<div class="col-sm-8">
    							<select name="workorder" id="workorder_no" onchange="fetchworkorder()" class="form-control">
    								<option>Please Select Workorder Number</option>
    								<?php
                                    foreach ($workerorderno as $id) {
                                        // var_dump($zones);
                                        echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                    }
                                    ?>
    							</select>
    						</div>
    					</div> -->
                <div class="row mb-3">
                    <label for="workorder_no" class="col-sm-4">Workorder No :</label>
                    <div class="col-sm-8">
                        <select name="workorder" class="classic" id="workorder_no" onchange="fetchworkorder()">
                            <option>Please Select Workorder Number</option>
                            <?php
                            foreach ($workerorderno as $id) {
                                // var_dump($zones);
                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="client_name" class="col-sm-4">Name of the Client :</label>
                    <div class="col-sm-8">
                        <input type="text" placeholder="Name of the Client" name="client_name" id="clientname"
                            class="form-control" aria-describedby="client_name">
                    </div>
                </div>
                <!-- <div class="row mb-3">
    						<label for="client_name" class="col-sm-4">Date :</label>
    						<div class="col-sm-8">
    							<input type="date" name="date" id="date_time_set" aria-describedby="client_name">
    						</div>
    					</div> -->
                <div class="row mb-3">
                    <label for="client_name" class="col-sm-4">Date :</label>
                    <div class="col-sm-8">
                        <input type="text" name="date" id="date_picker" placeholder="Date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="type_of_work" class="col-sm-4">Description Of Work Done :</label>
                    <div class="col-sm-8">
                        <textarea id="w3review" name="Description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="partner_in_charge" class="col-sm-4">Work Given By :</label>
                    <div class="col-sm-8">
                        <input id="WorkGivenBy" type="text" name="WorkGiven" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">Remarks :</label>
                    <div class="col-sm-8">
                        <textarea id="w3review" name="remarks" aria-describedby="client_name"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">Start Time :</label>
                    <div class="col-sm-8 time">
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="start_time"
                                data-target="#datetimepicker" />
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3" hidden>
                    <label for="demo-date" class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <p id="starttimedisplay"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">End Time :</label>
                    <div class="col-sm-8 time">
                        <div class="input-group date" id="datetimepickerend" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="End_time"
                                data-target="#datetimepickerend" />
                            <div class="input-group-append" data-target="#datetimepickerend"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">Break Time</label>
                    <div class="col-sm-4 time">
                        <div class="input-group date" id="datetimepickerbreak1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="breakfrom"
                                data-target="#datetimepickerbreak1" />
                            <div class="input-group-append" data-target="#datetimepickerbreak1"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 time">
                        <div class="input-group date" id="datetimepickerbreak2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="breakto"
                                data-target="#datetimepickerbreak2" />
                            <div class="input-group-append" data-target="#datetimepickerbreak2"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                        -->


                <div class="row mb-3">
                    <div class="col-sm-8">
                        <input type="submit" value="Sumbit" class="btn btn-info" id="formsubmit" />
                    </div>
                </div>
                <?php
                if ($this->session->flashdata('success')) {    ?>
                <p class="text-success text-center" style="margin-top: 10px;">
                    <?= $this->session->flashdata('success') ?>
                </p>
                <?php } ?>
            </form>

            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
            <script>
            $(document).ready(function() {
                $("#date_picker").datepicker({
                    dateFormat: 'dd-mm-yy'
                })
            })
            </script>
            <script>
            $('#datetimepicker').datetimepicker({
                format: 'hh:mm:ss a',
            });
            $('#datetimepickerend').datetimepicker({
                format: 'hh:mm:ss a',
            });
            $('#datetimepickerbreak1').datetimepicker({
                format: 'hh:mm:ss a',
            });
            $('#datetimepickerbreak2').datetimepicker({
                format: 'hh:mm:ss a',
            });
            </script>
            <script type="text/javascript">
            function onselectingdate() {
                const myTimeout = setTimeout(timecheck, 10000);
            }

            function timecheck() {
                //alert("yyyesss");
                var date = document.getElementById("date_time_set").value;
                var starttime = document.getElementById("starttime").value;
                //alert('start time is ' + starttime);
                var endtime = document.getElementById("endtime").value;
                //alert('end  time is ' + endtime);
                $.ajax({
                    url: "<?php echo base_url('Worksheet/timevalidation') ?>",
                    type: 'post',
                    data: {
                        worksheetdate: date,
                        start: starttime,
                        end: endtime
                    },
                    success: function(json) {
                        var jsondata = (json);
                        console.log('log is' + json);
                        //alert('response ' + jsondata);
                        if (jsondata == "true") {
                            document.getElementById("starttimedisplay").innerHTML =
                                "please select different start time and endtime , already you have another worksheet for this time duration ";
                            //alert("if condition ");
                            document.getElementById("starttimedisplay").style.color = 'red';
                            document.getElementById('formsubmit').disabled = false;
                        }
                        if (jsondata == "false") {
                            // alert("false condition ");
                            document.getElementById("starttimedisplay").innerHTML = "";
                            document.getElementById('formsubmit').disabled = false;
                        }
                        //console.log('end time' + message);
                        //alert('success data is' + jsondata);
                    },
                    error: function() {
                        alert('Not Found ');
                    }
                });
            }
            </script>
            <script type="text/javascript">
            function fetchworkorder() {
                var x = document.getElementById("workorder_no").value;
                //   alert(x);
                //alert('<?= base_url() ?>');
                $.ajax({
                    url: "<?php echo base_url('Worksheet/getClientName') ?>",
                    type: 'post',
                    data: {
                        clientname: x
                    },
                    success: function(data) {
                        //alert('success brand');
                        //  alert(data);
                        var jsondata = JSON.parse(data);
                        //console.log(jsondata);
                        //alert(jsondata[0].client_name);
                        document.getElementById('clientname').value = jsondata[0].client_name;
                        document.getElementById('WorkGivenBy').value = jsondata[0].partner_in_charge;
                        document.getElementById('clientname').disabled = true;
                        document.getElementById('WorkGivenBy').disabled = true;
                    },
                    error: function() {
                        alert('Not Found client details for this Work Order Number');
                    }
                });
            }
            </script>