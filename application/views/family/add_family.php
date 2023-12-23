<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>


            <?php



            $message = $this->session->flashdata("success");

            if (isset($message)) {

                echo '<div class="alert login_alert alert-success mx-auto alert-dismissible fade show" role="alert">
            ' . $message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
            </div>';
              
            }

            ?>



            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/family<?= ((@$data["edit"]) ? '/edit/' . $data["family_id"] : ''); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="home_id">Home ID</label>
                                <input type="text" id="home_id" class="form-control" <?= ((@$data) ? 'value="' . $data["home_id"] . '"' : ''); ?> name="home_id" placeholder="Enter Here">
                            </div>

                            <div class="text-danger">
                                <?php echo form_error("home_id"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ration_card_no">Ration Card Number</label>
                                <input type="text" id="ration_card_no" class="form-control" <?= ((@$data) ? 'value="' . $data["ration_card_no"] . '"' : ''); ?> name="ration_card_no" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("ration_card_no"); ?>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Type here ..."> <?= ((@$data) ? $data["address"] : ''); ?> </textarea>
                            <div class="text-danger">
                                <?php echo form_error("address"); ?>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save">Add Family</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>