<div class='container'>
	<div id="section1">
		<!-- Modal HTML -->


		<!-- Modal HTML -->
		<div id="myModal">
			<div class="modal-dialog modal-login">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Sign In</h4>

					</div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>main/login_validation" method="post">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="balunand_id_no" placeholder="Username" required="required">

									<span class="text-danger"><?php echo form_error('balunand_id_no'); ?></span>

								</div>
							</div>


							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Password" required="required">

									<span class="text-danger"><?php echo form_error('password'); ?></span>

								</div>
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg">Sign In</button>
							</div>


							<?php
							echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
							?>
						</form>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>
