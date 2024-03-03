<div class="container pp-contact px-0 mt-5">
  <div class="row">
    <div class="col-md-7 col-sm-12">
      <div class="pp-contact-message">
        <div class="h4 mb-3">Pendaftaran</div>
        <?php echo validation_errors(); ?>

        <?php echo form_open('Login/register_user'); ?>
        <form action="#" method="POST">
          <div class="row">
            <div class="col-md-6 col-sm-12 mb-3">
              <input class="mr-3 form-control" type="text" name="username" placeholder="Username"  />
            </div>
            <div class="col-md-6 col-sm-12 mb-3">
              <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <input class="form-control" type="text" name="namalengkap" placeholder="Nama Lengkap" />
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <input class="form-control" type="email" name="email" placeholder="E-mail" />
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button class="btn btn-primary" type="submit">Daftar</button>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Sudah Punya Akun? Klik <a href="<?php echo base_url(); ?>Login">Login</a>
            </div>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>