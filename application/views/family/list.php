<div class="row">
	<div class="col-md-12 col-lg-12">


		<?php
		$message= $this->session->flashdata("success");
		if ( isset($message) ){

			echo '<div class="alert login_alert alert-success mx-auto alert-dismissible fade show" role="alert">
			' .$message. '
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
		// $unset($this->session->flashdata("success"));
		}

		?>
		<div class="card">
			<div class="card-header">

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
						<thead>
							<tr>
								<th class="wd-15p">family_ID</th>
								<th class="wd-15p">Home_ID</th>
								<th class="wd-15p">Ration Card</th>
								<th class="wd-20p">Address</th>
					
								<th class="wd-25p">Edit</th>
					
								<th class="wd-25p">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($family as $row) {
								echo '<tr>
									<td class="wd-15p">' . $row->family_id . '</td>
									<td class="wd-15p">' . $row->home_id . '</td>
									<td class="wd-15p">' . $row->ration_card_no . '</td>
                                            <td class="wd-20p">' . $row->address . '</td>
                                            
                                            <td class="wd-25p"><a href="' . base_url() . 'Admin/Family/edit/' . $row->family_id . '">Edit</a></td>
											<td class="wd-25p"><a href="' . base_url() . 'Admin/Family/delete/' . $row->family_id . '">Delete</a></td>
                                        </tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- TABLE WRAPPER -->
		</div>
		<!-- SECTION WRAPPER -->
	</div>
</div>