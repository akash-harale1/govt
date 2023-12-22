<div class="row">
	<div class="col-md-12 col-lg-12">
     <form action="<?=base_url();?>Admin/daytoday" method="post">
		<div class="card">
			<div class="card-header">
           
			        <div class="col-md-5">
						<div class="form-group">
                        <label for="todate">From Date</label>
							<input type="date" id="fromdate" class="form-control" <?=((@$fromdate)?'value="'.$fromdate.'"':'value="'.date('Y-m-d').'"');?> name="fromdate" required >
						</div>
					</div>
                    <div class="col-md-5">
						<div class="form-group">
                        <label for="todate">To Date</label>
							<input type="date" id="todate" class="form-control" <?=((@$todate)?'value="'.$todate.'"':'value="'.date('Y-m-d').'"');?> name="todate" required >
						</div>
					</div>
                    <div class="col-md-2">
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
							</tr>
						</thead>
						<tbody>
                             <?php
                             $total_credit=0;
                             $total_debit=0;
                             $share_msg="Report From  : $fromdate To $todate%0a%0a";
                             if(@$entries && sizeof($entries)>0)
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