    <div class="container">
        <div id='section_viewworkorder'>
            <?php
            /*
                  <td><a href="<?=base_url("user/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
            if (count($workesheetuloginuserdetails) > 0) {
            foreach ($workesheetuloginuserdetails as $row) {
            ?>
            <table class="table table-bordered my-5">
                <thead>
                    <tr class="text-center text-white text-capitalize wkorderhead">
                        <th>Name of student</th>
                        <th>Partner in Charge</th>
                        <th>SRO No </th>
                        <th>balunand_id_no</th>
                        <th>Start Date</th>
                        <th>Completing On</th>
                    </tr>
                </thead>
                <tbody>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['partner_under_whom_registered'] ?></td>
                    <td><?php echo $row['student_reg_no'] ?></td>
                    <td><?php echo $row['balunand_id_no'] ?></td>
                    <td><?php echo $row['startdate'] ?></td>
                    <td><?php echo $row['CompletingOn'] ?></td>
                </tbody>
                <?php
                }
            }
                ?>
                <h3 class="text-center">View Worksheet</h3>
                <table class="table table-bordered my-5">
                    <thead>
                        <tr class="text-center text-white text-capitalize wksubhead2">
                            <th>Date</th>
                            <th>Workorder No</th>
                            <th>Name Of Client </th>
                            <th>Description of work done</th>
                            <th>Work Given By</th>
                            <th>Remarks</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Break Time From </th>
                            <th>Break Time To </th>
                            <th>Break Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($workesheetdata)) {
                            foreach ($workesheetdata as $worksheetrecord) {

                                //	$hours = intdiv($worksheetrecord['spent_time'], 60) . ':' . ($worksheetrecord['spent_time'] % 60);

                                // $hours = intdiv($worksheetrecord['spent_time'], 60);

                                // $minutes = $worksheetrecord['spent_time'] % 60;

                        ?>
                        <tr>
                            <td><?php echo $worksheetrecord['date']; ?> </td>
                            <td><?php echo $worksheetrecord['workorder_no']; ?> </td>
                            <td><?php echo $worksheetrecord['client_name']; ?> </td>
                            <td><?php echo $worksheetrecord['work_description']; ?> </td>
                            <td><?php echo $worksheetrecord['work_given_by']; ?></td>
                            <td><?php echo $worksheetrecord['remarks'];   ?> </td>
                            <td><?php echo $worksheetrecord['start_time']; ?> </td>
                            <td><?php echo $worksheetrecord['end_time']; ?> </td>
                            <td><?php echo $worksheetrecord['break_time_from']; ?> </td>
                            <td><?php echo $worksheetrecord['break_time_to']; ?> </td>
                            <!-- <td id="timehours"><?php echo $hours . 'hour' . ':' . $minutes . 'minutes'; ?> </td> -->
                        </tr>
                        <?php


                            }
                        } else {
                            ?>
                        <tr class="text-center">
                            <td colspan="9">No Data Found</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <!-- Begin Footer -->

    <script>
var uls = 5;


/*
alert(uls.length);

let bt = document.querySelectorAll('#timehours').length;

alert(bt);

for (var i = 0; i < 2; i++) {

	document.querySelectorAll('#timehours').innerText = 12333;

}
*/
    </script>