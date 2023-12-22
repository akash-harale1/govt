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
								<th class="wd-15p">ID</th>
								
								<th class="wd-15p">Name</th>
								<th class="wd-15p">Marathi Name</th>
								<th class="wd-20p">Contact</th>
								<th class="wd-15p">Birthday</th>
								<th class="wd-10p">Anniversary</th>
								<th class="wd-10p">Death Anniversary</th>
								<th class="wd-25p">Operation</th>
							</tr>
						</thead>
						<tbody>
                             <?php
                                foreach ($members as $row) {
                                    echo '<tr>
									<td class="wd-15p">'.$row->id.'</td>
									<td class="wd-15p">'.$row->name.'</td>
									<td class="wd-15p">'.$row->marathi_name.'</td>
                                            <td class="wd-20p">'.$row->contact.'</td>
                                            <td class="wd-15p">'.date('d M y',strtotime($row->birthday)).'</td>
                                            <td class="wd-15p">'.date('d M y',strtotime($row->anniversary)).'</td>
                                            <td class="wd-15p">'.date('d M y',strtotime($row->deathann)).'</td>
                                            <td class="wd-25p"><a href="'.base_url().'Admin/members/'.$row->id.'">Edit</a></td>
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