<?php
$tanggal_hari_ini = now('Asia/Jakarta'); //mengambil tanggal hari ini di zona waktu Asia/Jakarta>
$tanggal_hari_ini = date('Y-m-d');
?>
<style>
    button {
        width: 200px;
    }

    a {
        width: 200px;
    }
</style>
</br></br></br></br></br>
<div class="container px-0 mt-5">
    </br>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Add Album</div>
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Album/addalbum" method="POST">
                    <div class="row">
                        <input class="form-control" type="hidden" name="UserID" value="<?php echo $this->session->userdata('userid'); ?>" disabled />
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input class="form-control" type="text" name="NamaAlbum" placeholder="Masukan Nama Album" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea class="form-control" name="Deskripsi" placeholder="Masukan Deskripsi Album" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input class="form-control" type="date" name="TanggalDibuat" value="<?php echo $tanggal_hari_ini; ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>Album">Back</a>
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