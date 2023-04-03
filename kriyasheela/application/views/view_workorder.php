<div class="container">
    <div id='section_viewworkorder' class="table-responsive-md">
        <h2 class=" text-center mb-2">View Workorder</h2>
        <div class="text-center my-5">
            <!-- <span>Select Workorder Number</span> -->
            <span class="font-weight-bold display-6">Select Workorder Number</span>

            <select name="workorder" id="workorderids" class="filter-handle" onchange="myfunction()">
                <?php
                foreach ($workorderdetails as $workid) {
                    // var_dump($zones);
                    echo '<option value="' . $workid['workorder_no'] . '">' . $workid['workorder_no'] . '-' . $workid['client_name'] . '</option>';
                } ?>

            </select>

        </div>
        <table class="table table-bordered my-5">
            <thead>
                <tr class="text-center text-white text-capitalize">
                    <th class="wkorderhead" colspan="8">Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($oneworkorderdata)) {
                    foreach ($oneworkorderdata as $row) {
                ?>
                <tr>

                    <!-- <input type="text" value=" <?php echo $row['workorder_no']; ?> " id="workno" hidden /> -->

                    <td colspan="2" class="wksubhead">Work Order No </td>


                    <td colspan="2"><?php echo $row['workorder_no']; ?> </td>
                    <td colspan="2" class="wksubhead">Created On </td>
                    <td colspan="2"><?php echo $row['created_on']; ?></td>
                </tr>
                <tr>
                    <td class="wksubhead">Legal Name / Trade Name </td>
                    <td colspan="7" class="text-center"> <?php echo $row['client_name']; ?> </td>
                </tr>
                <tr>
                    <td class="wksubhead">Type of Work </td>
                    <td colspan="7" class="text-center"><?php echo $row['type_of_work']; ?> </td>
                </tr>
                <tr>
                    <td class="wksubhead">Partner in Charge </td>
                    <td colspan="7" class="text-center"> <?php echo $row['partner_in_charge']; ?> </td>
                </tr>
                <tr>
                    <td class="wksubhead">Start Date </td>
                    <td><?php echo $row['start_date']; ?> </td>
                    <td colspan="2" class="wksubhead">Targeted End Date </td>
                    <td> <?php echo $row['targetted_end_date']; ?> </td>
                    <td class="wksubhead" colspan="2">DeadLine</td>
                    <td><?php echo $row['deadline']; ?> </td>
                </tr>
                <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="8">No Data Found</td>
                </tr>
                <?php
                }
                ?>
                <tr class="text-center text-white text-capitalize">
                    <th class="wkorderhead" colspan="8">Team Members </th>
                </tr>
                <tr class="wksubhead2">
                    <td colspan="2"></td>
                    <td colspan="2">Employee Code</th>
                    <td colspan="2">SRO Number</td>
                    <td colspan="2">Name </td>
                </tr>
                <?php
                if (!empty($userdetails1)) {
                    foreach ($userdetails1 as $key => $row) {
                        // var_dump($key);
                        if ($key == 0) {
                ?>
                <tr>
                    <td colspan="2" class="wksubhead">Lead Member </td>
                    <td colspan="2"><?php echo $row['balunand_id_no']; ?> </td>
                    <td colspan="2"><?php echo $row['student_reg_no']; ?> </td>
                    <td colspan="2"><?php echo $row['name']; ?> </td>
                </tr>

                <?php
                        }
                    }
                }
                ?>

                <?php
                if (!empty($userdetails1)) {
                    foreach ($userdetails1 as $key => $row) {
                        if ($key > 0) {
                ?>
                <tr>
                    <th colspan="2" class="wksubhead">Others </th>
                    <td colspan="2"><?php echo $row['balunand_id_no'];
                                                $key ?></td>
                    <td colspan="2"><?php echo $row['student_reg_no']; ?></td>
                    <td colspan="2"><?php echo $row['name']; ?> </td>
                </tr>
                <?php
                        }
                    }
                } else {
                    ?>
                <tr>
                    <td>No Data Found</td>
                </tr>
                <?php
                }
                ?>

                <tr class="text-center text-white text-capitalize">
                    <th class="text-capitalize wkorderhead" colspan="8">Flow of work </th>
                </tr>
                <tr class="wksubhead2">
                    <td>Name of Employee </th>
                    <td>Date</td>
                    <td colspan="2">Description of Work Done </td>
                    <td>Start Time</td>
                    <td>End Time</td>
                    <td>Time Spent</td>
                    <td>Remarks</td>
                </tr>
                <?php
                if (!empty($workesheetdata)) {
                    foreach ($workesheetdata as $row) {
                ?>
                <tr>
                    <td><?php echo $row['name_of_employee']; ?></td>
                    <td> <?php echo $row['date']; ?> </td>
                    <td colspan="2"> <?php echo $row['work_description']; ?></td>
                    <td><?php echo $row['start_time']; ?></td>
                    <td><?php echo $row['end_time']; ?></td>
                    <td> <?php echo $row['spent_time']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                </tr>
                <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="8">No Data Found</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />



<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
function myfunction() {


    var workId = document.getElementById("workorderids").value;

    const url = "<?= base_url("workorder/view_workorder") ?>" + '/' + workId;

    window.location.href = url;

    localStorage.setItem('selectedtem', workId);


}


// localStorage.removeItem('selectedtem');

if (localStorage.getItem('selectedtem')) {

    // alert(localStorage.getItem('selectedtem'));

    //  document.getElementById('workorderids').options[localStorage.getItem('selectedtem')].selected = true;

    $('select').find('option[value=' + localStorage.getItem('selectedtem') + ']').attr('selected', 'selected');

    localStorage.setItem('selectedtem', '');

}
</script>
<script>
$(document).ready(function() {

    //change selectboxes to selectize mode to be searchable
    $(".filter-handle").select2();
});
</script>