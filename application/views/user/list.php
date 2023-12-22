<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
		
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
						<thead>
							<tr>
								<th class="wd-15p">Name</th>
								<th class="wd-15p">Contact</th>
								<th class="wd-20p">E Mail</th>
								<th class="wd-15p">Password</th>
								<th class="wd-10p">Address</th>
								<th class="wd-25p">Operation</th>
							</tr>
						</thead>
						<tbody>
                             <?php
                                foreach ($users as $row) {
                                    echo '<tr>
                                            <td class="wd-15p">'.$row->name.'</td>
                                            <td class="wd-15p">'.$row->contact.'</td>
                                            <td class="wd-20p">'.$row->email.'</td>
                                            <td class="wd-15p">'.$row->pwd.'</td>
                                            <td class="wd-10p">'.$row->address.'</td>
                                            <td class="wd-25p"><a href="'.base_url().'Admin/User/'.$row->id.'">Edit</a></td>
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