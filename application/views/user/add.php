<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<?=@$this->session->flashdata('result');?>
			</div>
			<div class="card-body">
			<form action="<?=base_url();?>Admin/user<?=((@$edit)?'/'.$edit->id:'');?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
                        <label for="name">Name</label>
							<input type="text" id="name" class="form-control" <?=((@$edit)?'value="'.$edit->name.'"':'');?> required name="name" placeholder="Enter Here">
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
                        <label for="email">E Mail</label>
							<input type="text" id="email" class="form-control" <?=((@$edit)?'value="'.$edit->email.'"':'');?>   name="email" placeholder="Enter Here">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                        <label for="pwd">Password</label>
							<input type="text" id="pwd" class="form-control" <?=((@$edit)?'value="'.$edit->pwd.'"':'');?>  required name="pwd" placeholder="Enter Here">
						</div>
					</div>

					<div class="col-md-12">
						<label for="address">Address</label>
						<textarea class="form-control" name="address" id="address" rows="3" placeholder="Type here ..."> <?=((@$edit)?$edit->address:'');?> </textarea>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                        <label for="status">Status</label>
							<select id="status" class="form-control" name="status">
								<option value="1"  <?=((@$edit && $edit->status=="1")?' SELECTED':'');?> >ACTIVE</option>
								<option value="0" <?=((@$edit && $edit->status=="0")?' SELECTED':'');?>>DE-ACTIVE</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                        <label for="role">Role</label>
							<select id="role" class="form-control" name="role">
								<option value="1" <?=((@$edit && $edit->status=="1")?' SELECTED':'');?>>ADMIN</option>
								<option value="2" <?=((@$edit && $edit->status=="2")?' SELECTED':'');?>>FIRM</option>
								<option value="3" <?=((@$edit && $edit->status=="3")?' SELECTED':'');?>>ACCOUNTANT</option>
							</select>
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