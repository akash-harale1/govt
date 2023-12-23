<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<?=@$this->session->flashdata('result');?>
			</div>
			<div class="card-body">
			<form action="<?=base_url();?>Admin/members<?=((@$edit)?'/'.$edit->id:'');?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
                        <label for="name">Name</label>
							<input type="text" id="name" class="form-control" <?=((@$edit)?'value="'.$edit->name.'"':'');?> required name="name" placeholder="Enter Here">
						</div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
                        <label for="marathi_name">Marathi Name</label>
							<input type="text" id="marathi_name" class="form-control" <?=((@$edit)?'value="'.$edit->marathi_name.'"':'');?> required name="marathi_name" placeholder="Enter Here">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                        <label for="contact">Contact</label>
							<input type="number" id="contact" class="form-control" <?=((@$edit)?'value="'.$edit->contact.'"':'');?>  required name="contact" placeholder="Enter Here">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                        <label for="birthday">Birthday</label>
							<input type="date" id="birthday" class="form-control" value="<?=((@$edit)?''.$edit->birthday.'':date('Y-m-d'));?>"   name="birthday" >
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
                        <label for="anniversary">Anniversary</label>
							<input type="date" id="anniversary" class="form-control" value="<?=((@$edit)?''.$edit->anniversary.'':date('Y-m-d'));?>"   name="anniversary" >
						</div>
                    </div>
                    
					<div class="col-md-6">
						<div class="form-group">
                        <label for="deathann">Death Anniversary</label>
							<input type="date" id="deathann" class="form-control" value="<?=((@$edit)?''.$edit->deathann.'':date('Y-m-d'));?>"   name="deathann" >
						</div>
                    </div>
                    
					<div class="col-md-6">
						<div class="form-group">
							<button class="btn btn-primary" type="submit" name="save">Save Record</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	</div>