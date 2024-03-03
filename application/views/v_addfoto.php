<?php
$tanggal_hari_ini = now('Asia/Jakarta'); //mengambil tanggal hari ini di zona waktu Asia/Jakarta>
$tanggal_hari_ini = date('Y-m-d');
?>
<div class="container px-0 mt-5">
    <div class="row">
        <div class="col-md-6 col-sm-8">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Add Foto</div>
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Foto/addfoto" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input class="form-control" type="hidden" name="UserID" value="<?php echo $this->session->userdata('userid'); ?>" disabled />
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input class="form-control" type="text" name="JudulFoto" placeholder="Masukan Judul Foto" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea class="form-control" name="DeskripsiFoto" placeholder="Masukan Deskripsi Foto" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input class="form-control" type="date" name="TanggalUnggah" value="<?php echo $tanggal_hari_ini; ?>" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input class="form-control" type="file" name="LokasiFile" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select name="AlbumID" class="form-control form-control-lg">
                                <?php foreach ($viewalbums as $albumdata) : ?>

                                    <option value="<?php echo $albumdata['AlbumID']; ?>"><?php echo $albumdata['NamaAlbum']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-warning" href="<?php echo base_url(); ?>Foto">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="pp-section"></div>
</div>
<div class="pp-section"></div>
</div>