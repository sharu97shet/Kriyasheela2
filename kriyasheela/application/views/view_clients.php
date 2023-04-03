<style>
.pagination {

    padding-left: 751px;

}

.col-sm-12 {
    padding-top: 15px;
}


table.dataTable thead .sorting_asc:after {
    content: none !important;
}

table.dataTable thead .sorting:after {
    opacity: 0.2;
    content: none !important;
}
</style>

<div class='container-fluid' id="section_clientlist">

    <table class="table table-bordered" id="clienttable">

        <thead class="wkorderhead text-white">
            <tr>
                <th style="width: 202.10899999999998px;">Legal Name / Trade Name</th>
                <th style="width: 99.06200000000001px;">Pan Number</th>
                <th style="width: 103.06200000000001px;">GST Number</th>
                <th style=" width: 73.969px;">Tan</th>
                <th style="width: 121.703px;">Aadhar Number</th>
                <th style="width: 73.797px;">Address</th>
                <th style="width: 131.922px;">Person Incharge</th>
                <th style="width: 169.375px;">Person To Be Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /*
                  <td><a href="<?=base_url("user/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
            if (!empty($clientdetailsdata) > 0) {
            foreach ($clientdetailsdata as $row) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['PAN']; ?> </td>
                <td><?php echo $row['GST']; ?> </td>
                <td><?php echo $row['tan']; ?> </td>
                <td><?php echo $row['aadhar']; ?> </td>
                <td><?php echo $row['address']; ?> </td>
                <td><?php echo $row['person_incharge']; ?> </td>
                <td><?php echo $row['person_to_be_contact']; ?> </td>
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


<script>
$(document).ready(function() {
    $('#clienttable').DataTable();
});
</script>