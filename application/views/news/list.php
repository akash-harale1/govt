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
								<th class="wd-15p">News ID</th>
								<th class="wd-25p">News Header</th>
								<th class="wd-25p">News Text</th>
								<th class="wd-10p">View Image</th>
								<th class="wd-10p">Edit</th>
								<th class="wd-10p">Delete</th>

							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($news as $row) {
								echo '<tr>
									<td class="wd-15p">' . $row->news_id . '</td>
									<td class="wd-25p">' . $row->news_header . '</td>
									<td class="wd-25p">' . $row->news_text . '</td>
											<td calss="wd-10p"> <button type="button" id="view-btn"data-src="' . base_url() . $row->news_image . '" onclick="viewpopup(this)"class="btn btn-info">View</button></td> 
                                            <td class="wd-10p"><a href="' . base_url() . 'Admin/News/edit/' . $row->news_id . '">Edit</a></td>
											<td class="wd-10p"><a href="' . base_url() . 'Admin/News/delete/' . $row->news_id . '">Delete</a></td>
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
<script>
	function viewpopup( button) {
		var imageUrl = button.getAttribute('data-src');
        Swal.fire({
        imageUrl: imageUrl,
        imageHeight: 500,
        imageAlt: "News Image"
    });
	}
</script>