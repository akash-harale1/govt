<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <?php



            $m1 = $this->session->flashdata("success");
            $m2 = $this->session->flashdata("error");
            


            if (isset($m1)) {


                echo '<div class="alert login_alert alert-success mx-auto alert-dismissible fade show" role="alert">
            ' . $m1 . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
            </div>';
              
            }
            else if (isset($m2))
            {
                
                echo '<div class="alert login_alert alert-danger mx-auto alert-dismissible fade show" role="alert">
            ' . $m2 . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
            </div>';
            }

            ?>
            
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/Person<?= ((@$data["edit"]) ? '/edit/' . $data["person_id"] : ''); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" class="form-control" <?= ((@$data) ? 'value="' . $data["first_name"] . '"' : ''); ?>  name="first_name" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("first_name"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" id="middle_name" class="form-control" <?= ((@$data) ? 'value="' . $data["middle_name"] . '"' : ''); ?>  name="middle_name" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("middle_name"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" class="form-control" <?= ((@$data) ? 'value="' . $data["last_name"] . '"' : ''); ?> name="last_name" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("last_name"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile number</label>
                                <input type="number" id="mobile" class="form-control" <?= ((@$data) ? 'value="' . $data["mobile"] . '"' : ''); ?>  name="mobile" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("mobile"); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pan_no">Pancard Number</label>
                                <input type="text" id="pan_no" class="form-control"<?= ((@$data) ? 'value="' . $data["pan_no"] . '"' : ''); ?> name="pan_no" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("pan_no"); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aadhar_no">Aadhar Number</label>
                                <input type="text" id="aadhar_no" class="form-control"<?= ((@$data) ? 'value="' . $data["aadhar_no"] . '"' : ''); ?>  name="aadhar_no" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("aadhar_no"); ?>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ayushmaan_bharat_card_no">Aayushman Bharat Card Number</label>
                                <input type="text" id="ayushmaan_bharat_card_no" class="form-control"<?= ((@$data) ? 'value="' . $data["ayushmaan_bharat_card_no"] . '"' : ''); ?>  name="ayushmaan_bharat_card_no" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("ayushmaan_bharat_card_no"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="abha_card_no">Aabha Card Number</label>
                                <input type="text" id="abha_card_no" class="form-control" <?= ((@$data) ? 'value="' . $data["abha_card_no"] . '"' : ''); ?>  name="abha_card_no" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("abha_card_no"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" id="date_of_birth" class="form-control"  <?= ((@$data) ? 'value="' . $data["date_of_birth"] . '"' : ''); ?>   name="date_of_birth" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("date_of_birth"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="family_id">Family ID</label>
                                <input type="text" id="family_id" class="form-control"  <?= ((@$data) ? 'value="' . $data["family_id"] . '"' : ''); ?>   name="family_id" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("family_id"); ?>
                            </div>
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