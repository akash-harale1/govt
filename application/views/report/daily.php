<div class="row">
	<div class="col-md-12 col-lg-12">
     <form action="<?=base_url();?>Admin/Daily" method="post">
		<div class="card">
			<div class="card-header">
           
			        <div class="col-md-9">
						<div class="form-group">
                        <label for="filterdate">Filer Date</label>
							<input type="date" id="filterdate" class="form-control" <?=((@$filterdate)?'value="'.$filterdate.'"':'value="'.date('Y-m-d').'"');?> name="filterdate" required >
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
                        <label for="Filter">&nbsp;&nbsp;</label>
							<input type="submit" value="Filter"  class=" form-control btn btn-danger text-white" text="Filter">
                        </div>
					</div>
                   
			</div>
            </form>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
						<thead>
							<tr>
								<th class="wd-15p">GL</th>
								<th class="wd-10p">Entries</th>
                                <th class="wd-10p">Amount</th>
								<th class="wd-25p">Edit</th>
							</tr>
						</thead>
						<tbody>
                             <?php
                             $total_credit=0;
                             $total_debit=0;
                             $share_msg="Report On : ".@$filterdate;
                                foreach ($entries as $row) {
                                    if($row->type==1)
                                        $total_credit+=floatval($row->amount);
                                    else
                                        $total_debit+=floatval($row->amount);
                                
                                    $share_msg.="*$row->head* ($row->count)  - $row->amount %0a";

                                    echo '<tr>
                                            <td class="wd-15p">'.$row->head.' ('.(($row->type==1)?'<span class="text-success">+</span>':'<span class="text-danger">-</span>').')</td>
                                            <td class="wd-15p">'.$row->count.'</td>
                                            <td class="wd-15p">'.$row->amount.'</td>
                                            <td class="wd-25p"><a href="'.base_url().'Admin/heads/'.$row->id.'">Edit</a></td>
                                        </tr>';
                                }
                             ?>
						</tbody>
					</table>
				</div>
                <table class="table">
                    <tr><td class="add">Total Credit</td><td class="minus">Total Debit</td></tr>
                    <tr><td class="add"><?=@$total_credit;?></td><td class="minus"><?=@$total_debit;?></td></tr>
                </table>
                <a href="whatsapp://send?text=<?=$share_msg;?>" target="_blank"><button class="btn bg-green">Share <i class="fa fa-whatsapp" data-toggle="tooltip" title="Share On WhatsApp"></i></button></a>
			</div>
			<!-- TABLE WRAPPER -->
		</div>
		<!-- SECTION WRAPPER -->
	</div>
</div>