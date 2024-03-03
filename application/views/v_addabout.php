<style>
    button {
        width: 200px;
    }

    a {
        width: 200px;
    }
</style>

<div class="container px-0 mt-5">
    </br>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Add About</div>
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>About/addabout" method="POST">
                    <div class="row">
                        <input class="form-control" type="hidden" name="UserID" value="<?php echo $this->session->userdata('userid'); ?>" disabled />
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <textarea class="form-control" name="Visi" placeholder="Masukan Visi" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>About">Back</a>
                        </div>
                    </div>
                </form>

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