<div class="row">
	<div class="col-md-12 col-lg-12">
     <form action="<?=base_url();?>Admin/daybyday" method="post">
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
                    <?=@$table;?>
					</table>
				</div>
              
               
			</div>
			<!-- TABLE WRAPPER -->
		</div>
		<!-- SECTION WRAPPER -->
	</div>
</div>