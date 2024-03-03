<div class="container px-0 mt-5">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="pp-contact-message">
                <div class="h4 mb-3">Data About - <a class="btn btn-primary btn-sm" href="About/viewaddalbum">Tambah About</a></div>
                <table id="about table" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Visi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($abouts as $about) { ?>
                            <tr>
                                <th><?php echo $no; ?></th>
                                <th><?php echo $about['Visi']; ?></th>
                                <th><a href="<?php echo site_url('about/edit/' . $about['AboutID']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $about['AboutID']; ?>)" class="btn btn-danger btn-sm">Delete</a>
                                </th>
                            </tr>
                        <?php
                            $no++;
                        } ?>
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
        if (confirm("Apakah Anda Yakin Ingin Menghapus data ini?")) {
            window.location.href = "<?php echo site_url('about/delete/'); ?>" + id;
        }
    }
</script>