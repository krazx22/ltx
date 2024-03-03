<div class="container px-0 mt-5">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Data Album - <a class="btn btn-primary btn-sm" href="Album/viewaddalbum">Tambah Album</a></div>
                <table id="album table" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Album</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($albums as $album) { ?>
                            <tr>
                                <th><?php echo $no; ?></th>
                                <th><?php echo $album['NamaAlbum']; ?></th>
                                <th><?php echo $album['Deskripsi']; ?></th>
                                <th><?php echo $album['TanggalDibuat']; ?></th>
                                <th><a href="<?php echo site_url('album/edit/' . $album['AlbumID']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $album['AlbumID']; ?>)" class="btn btn-danger btn-sm">Delete</a>
                                </th>
                            </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pp-section"></div>
    </div>
    <div class="pp-section"></div>
</div>
<!--javascript delete album-->
<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda Yakin Ingin Menghapus data ini?")) {
            window.location.href = "<?php echo site_url('album/delete/'); ?>" + id;
        }
    }
</script>