<div class="row">
	<div class="col-md-12 col-lg-12">


		<?php
		$message = $this->session->flashdata("success");
		if (isset($message)) {

			echo '<div class="alert login_alert alert-success mx-auto alert-dismissible fade show" role="alert">
			' . $message . '
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
								<th class="wd-15p">Person ID</th>
								<th class="wd-15p">Family ID</th>
								<th class="wd-15p">First Name</th>
								<th class="wd-15p">Middle Name</th>
								<th class="wd-15p">Last Name</th>
								<th class="wd-20p">Mobile number</th>
								<th class="wd-25p">Pancard Number</th>
								<th class="wd-25p">Aadhar Number</th>
								<th class="wd-25p">Aayushman Bharat Card Number</th>
								<th class="wd-25p">Aabha Card Number</th>
								<th class="wd-25p">Date of birth</th>
								<th class="wd-25p">Edit</th>
								<th class="wd-25p">Delete</th>

							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($person as $row) {
								echo '<tr>
									<td class="wd-15p">' . $row->person_id . '</td>
									<td class="wd-15p">' . $row->family_id . '</td>
									<td class="wd-15p">' . $row->first_name . '</td>
                                            <td class="wd-15p">' . $row->middle_name . '</td>
											<td class="wd-15p">' . $row->last_name . '</td>
											<td class="wd-20p">' . $row->mobile . '</td>
											<td class="wd-25p">' . $row->pan_no . '</td>
											<td class="wd-25p">' . $row->aadhar_no . '</td>
											<td class="wd-25p">' . $row->ayushmaan_bharat_card_no . '</td>
											<td class="wd-25p">' . $row->abha_card_no . '</td>
											<td class="wd-25p">' . $row->date_of_birth . '</td>
                                            
                                            <td class="wd-25p"><a href="' . base_url() . 'Admin/Person/edit/' . $row->person_id . '">Edit</a></td>
											<td class="wd-25p"><a href="' . base_url() . 'Admin/Person/delete/' .$row->person_id . '">Delete</a></td>
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