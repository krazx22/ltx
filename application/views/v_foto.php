<div class="container px-0 mt-5">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Data Foto- <a class="btn btn-primary btn-sm" href="Foto/viewaddfoto">Tambah Foto</a></div>
                <table id="album Table" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Foto</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Unggah</th>
                            <th>Album</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($fotos as $foto) : ?>
                            <tr>
                                <th><?php echo $no; ?></th>
                                <th><?php echo $foto['JudulFoto']; ?></th>
                                <th><?php echo $foto['DeskripsiFoto']; ?></th>
                                <th><?php echo $foto['TanggalUnggah']; ?></th>
                                <th><?php echo $foto['AlbumID']; ?></th>
                                <th><img src="<?php echo base_url('uploads/' . $foto['LokasiFile']); ?>" height="60" /></th>
                                <th><a href="<?php echo site_url('foto/edit/' . $foto['FotoID']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $foto['FotoID']; ?>)" class="btn btn-danger btn-sm">Delete</a>
                                </th>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="pp-section"></div>
        </div>
    </div>
    <div class="pp-section"></div>
</div>
<!--javascript delete album-->
<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "<?php echo site_url('foto/delete/'); ?>" + id;
        }
    }
</script>