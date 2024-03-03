<div class="container px-0 mt-5">
    </br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Update About</div>
                <form action="<?php echo base_url('about/update/' . $about['AboutID']); ?>" method="POST">
                    <div class="row">
                        <input class="form-control" type="hidden" name="userid" value="<?php echo $this->session->userdata('UserID'); ?>" disabled />
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea class="form-control" name="Visi" required><?php echo $about['Visi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>About">Back</a>
                        </div>
                    </div>
                </form>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    </br>
</div>
</div>
<div class="pp-section"></div>
</div>
<div class="pp-section"></div>
</div>