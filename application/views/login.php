<?php $title = "Translate Mode"; include "include_files/head.php" ?>
<?php include "include_files/header.php" ?>

<div class="col-md-4 col-md-offset-4 color-white" style="margin-top: 80px;">
  <h3> ចូលគណនី</h3>
  <hr>
  <form action="<?= base_url()?>authorize/do_login" method= "post" >
    <div class="form-group">
      <label for="username">ឈ្មោះ</label>
      <input class="form-control" type="text" id="username" name="username" />
    </div>
    <div class="form-group">
      <label for="password">លេខសម្ងាត់</label>
      <input class="form-control" type="password" id="password" name="password" />
    </div>
    <button type="submit" class="btn btn-block bg-color-fore">ចូលគណនី</button>
    <br>
    <p><?= $this->session->flashdata('error') ?></p>
  </form>

</div>
