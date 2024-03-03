<div class="container px-0 mt-5">
  <div class="row">
    <div class="col-md-6 col-sm-8">
      <div class="pp-contact-message">
        <div class="h4 mb-3">Login</div>

        <?php echo validation_errors(); ?>
        <?php echo form_open('Login/authenticate'); ?>
        <form action="#" method="POST">
          <div class="row">

          </div>
          <div class="row mb-3">
            <div class="col">
              <input class="form-control" type="text" name="username" placeholder="Masukan Username" required />
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <input class="form-control" type="password" name="password" placeholder="Masukan Password" required />
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button class="btn btn-primary" type="submit">Login</button>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Belum Punya Akun? Klik <a href="<?php echo base_url(); ?>Login/register">Daftar</a>
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
<div class="pp- section"></div>
</div>