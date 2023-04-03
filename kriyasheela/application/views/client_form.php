<div class='container userform' id="section_clientform">
    <span>Client Form</span>
    <div class='row'>

        <div class='col-md-7'>

            <?php if ($this->session->flashdata('clienterror')) { ?>
            <p class="text-success text-center">
                <?= $this->session->flashdata('clienterror') ?>
            </p>
            <?php } ?>

            <form id=" clientsubmit" method="post" autocomplete="off" action="<?= base_url(
                                                                                    'client/createClient'
                                                                                ) ?>" enctype='multipart/form-data'>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4">Legal Name / Trade Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="clientname" class="form-control" id="clientname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase">Pan :</label>
                    <div class="col-sm-8">
                        <input type="text" name="pan" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase">GST :</label>
                    <div class="col-sm-8">
                        <input type="text" name="gst" id="gst" class="form-control" id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 text-uppercase">Tan :</label>
                    <div class="col-sm-8">
                        <input type="text" name="tan" id="tan" class="form-control" id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4">Aadhar Number :</label>
                    <div class="col-sm-8">
                        <input type="text" name="aadhar" id="aadhar" class="form-control" id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4">Address :</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="address" class="form-control" id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4">Person Incharge :</label>
                    <div class="col-sm-8">
                        <input type="text" name="person_incharge" id="person_incharge" class="form-control" id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4">Person To Be Contact :</label>
                    <div class="col-sm-8">
                        <input type="text" name="person_to_be_contact" id="person_to_be_contact" class="form-control"
                            id="gst">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <input type="submit" name="insert" value="Submit" class="btn btn-primary" />
                    </div>
                </div>
            </form>
            <?php if ($this->session->flashdata('success')) { ?>
            <p class="text-success text-center" style="margin-top:10px;">
                <?= $this->session->flashdata('success') ?>
            </p>
            <?php } ?>
        </div>
        <hr class='hr' />
        <div class='col-md-4  offset-md-1' style="margin-left: 8.2%;">
            <form class="" id="" method="post" action="<?= base_url(
                                                            'client/uploadClient'
                                                        ) ?>" enctype="multipart/form-data">
                <!-- <div class="col-sm-10">
					<input type="file" name="userfile" class="form-control" id="inputEmail3">
					<p>please select CSV File</p>
					<input type="submit" name="submit" value="Submit" class="btn btn-info" />
				</div>
				<?php if ($this->session->flashdata('success') == true) : ?>
					<div class="text-danger"><?php echo $this->session->flashdata(
                                                    'success'
                                                ); ?></div>
				<?php endif; ?> -->

                <div class="form-group">

                    <input type="file" name="userfile" id="chooseFile" class="filestyle" data-icon="false">

                </div>
                <!-- <div class="file-upload">
                    <div class="file-select">
                        <div class="file-select-button" id="fileName">Choose File</div>
                        <div class="file-select-name" id="noFile">No file chosen...</div>
                        <input type="file" name="userfile" id="chooseFile">
                    </div>
                </div> -->

                <p class="file-upload1">please select CSV File</p>
                <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            </form>
        </div>
    </div>
</div>
<!-- <script>
$('#chooseFile').bind('change', function() {
    var filename = $("#chooseFile").val();
    alert(filename)
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    } else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});
</script> -->