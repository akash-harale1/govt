<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            
            


             
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/family<?= ((@$edit) ? '/' . $edit->id : ''); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="first_name" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" id="middle_name" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="middle_name" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="last_name" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Mobile">Mobile number</label>
                                <input type="number" id="Mobile" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="Mobile" placeholder="Enter Here">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pan_no">Pancard Number</label>
                                <input type="text" id="pan_no" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="pan_no" placeholder="Enter Here">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aadhar_no">Aadhar Number</label>
                                <input type="text" id="aadhar_no" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="aadhar_no" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aayushman_no">Aayushman Bharat Card Number</label>
                                <input type="text" id="aayushman_no" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="aayushman_no" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aabha_no">Aabha Card Number</label>
                                <input type="text" id="aabha_no" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="aabha_no" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" id="date_of_birth" class="form-control" <?= ((@$edit) ? 'value="' . $edit->name . '"' : ''); ?> required name="date_of_birth" placeholder="Enter Here">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Type here ..."> <?= ((@$edit) ? $edit->address : ''); ?> </textarea>
                        </div>
                       
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save">Add Person</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>