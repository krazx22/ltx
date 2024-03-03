<?php
//mengambil tanggal hari ini di zona waktu Asia/Jakarta>
$tanggal_hari_ini = now('Asia/Jakarta');
$tanggal_hari_ini = date('Y-m-d');
?>


<div class="container px-0 mt-5">
    <div class="row">
        <div class="col-md-6 col-sm-8">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Edit Foto</div>

                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('foto/update/' . $fotos['FotoID']); ?>

                <div class="row">
                    <div class="col">
                        <input class="form-control" type="hidden" name="UserID" value="<?php echo $this->session->userdata('userid'); ?>" disabled />
                        <input class="form-control" type="hidden" name="FotoID" value="<?php echo $fotos['FotoID']; ?> " disabled />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" type="text" name="JudulFoto" value="<?php echo $fotos['JudulFoto']; ?>" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <textarea class="form-control"  name="DeskripsiFoto" required><?php echo $fotos['DeskripsiFoto']; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" type="date" name="TanggalDiunggah" value="<?php echo $tanggal_hari_ini; ?>" disabled />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">Foto Sebelumnya
                        <img src="<?php echo base_url('uploads/' . $fotos['LokasiFile']); ?>" height="100" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        Edit Foto?
                        <input class="form-control" type="file" name="LokasiFile" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select name="AlbumID" class="form-control form-control-lg">
                            <?php foreach ($albums as $albumdata) : ?>
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
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="pp-section"></div>
</div>
<div class="pp-section"></div>
</div>