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
                } else if (isset($m2)) {

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
                <form action="<?= base_url(); ?>Admin/News<?= ((@$data["edit"]) ? '/edit/' . $data["news_id"] : ''); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="news_header">News Header</label>
                                <input type="text" id="news_header" class="form-control" <?= ((@$data) ? 'value="' . $data["news_header"] . '"' : ''); ?> name="news_header" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("news_header"); ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="news_text">News Text</label>
                                <input type="text" id="news_text" class="form-control" <?= ((@$data) ? 'value="' . $data["news_text"] . '"' : ''); ?> name="news_text" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("news_text"); ?>
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="news_image">News Image</label>
                                <div class="text-danger">*Image size should be under 5MB </div>
                                <div class="text-danger">*Image format should be PNG/JPG/JPEG </div>
                                <input type="file" id="news_image" class="form-control" name="news_image" placeholder="Enter Here">
                            </div>
                            <div class="text-danger"></div>
                                <?php echo form_error("news_image"); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- <div class="form-group">
                                <label for="news_image">News Image</label>
                                <div class="text-danger">*Image size should be under 5MB</div>
                                <input type="file" id="news_image" class="form-control" name="news_image" placeholder="Enter Here">
                            </div>
                            <div class="text-danger">
                                <?php echo form_error("news_image"); ?>
                            </div> -->
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save">Add News</button>
                            </div>

                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>



<!-- <script>
    // Swal.fire({
    //     title: 'Instructions to upload an Image!',
    //     text: '1)Image should only be of type PNG, JPG, JPEG\n\n2)Image must be less than 5MB',
    //     icon: 'warning',
    //     confirmButtonText: 'Continue'
    // })

    Swal.fire({
        title: 'Instructions to upload an Image!',
        html: '<div style="text-align: left;">' +
            '<p>1) Image should only be of type PNG, JPG, JPEG</p>' +
            '<p>2) Image must be less than 5MB</p>' +
            '</div>',
        icon: 'warning',
        confirmButtonText: 'Continue'
    });
</script> -->