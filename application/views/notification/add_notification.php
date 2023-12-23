<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>

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
            } else if (isset($m2)) {

                echo '<div class="alert login_alert alert-danger mx-auto alert-dismissible fade show" role="alert">
' . $m2 . '
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button> 
</div>';
            }

            ?>



            <div class="card-body">
                <form action="<?= base_url(); ?>Admin/Notification<?= ((@$data["edit"]) ? '/edit/' . $data["notification_id"] : ''); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header">Header</label>
                                <input type="text" id="header" class="form-control" <?= ((@$data) ? 'value="' . $data["header"] . '"' : ''); ?> name="header" placeholder="Enter Here">
                            </div>

                            <div class="text-danger">
                                <?php echo form_error("header"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Text</label>
                                <input type="text" id="text" class="form-control" <?= ((@$data) ? 'value="' . $data["text"] . '"' : ''); ?> name="text" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("text"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person_id">Person ID</label>
                                <input type="text" id="person_id" class="form-control" <?= ((@$data) ? 'value="' . $data["person_id"] . '"' : ''); ?> name="person_id" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("person_id"); ?>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save">Add Notification</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>