<div class="row">
    <div class="col-md-12 col-lg-12">


        <?php
        $message = $this->session->flashdata("success");
        if (isset($message)) {

            echo '<div class="alert login_alert alert-success mx-auto alert-dismissible fade show" role="alert">
			' . $message . '
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
            // $unset($this->session->flashdata("success"));
        }

        ?>
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th class="wd-15p">Notification ID</th>
                                <th class="wd-15p">Person ID</th>
                                <th class="wd-25p">Header</th>
                                <th class="wd-25p">Text</th>
                                <th class="wd-10p">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($notification as $row) {
                                echo '<tr>
									<td class="wd-15p">' . $row->notification_id . '</td>
									<td class="wd-15p">' . $row->person_id . '</td>
									<td class="wd-25p">' . $row->header . '</td>
                                            <td class="wd-25p">' . $row->text . '</td>
											<td class="wd-10p"><a href="' . base_url() . 'Admin/Notification/delete/' . $row->notification_id. '">Delete</a></td>
                                        </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>