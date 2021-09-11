<?php
// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open(base_url('admin/pelanggan/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama</label>
    <div class="col-md-5">
        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?php echo set_value('nama_pelanggan') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Email Pelanggan" value="<?php echo set_value('email') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Telepon</label>
    <div class="col-md-5">
        <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-5">
        <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>

<?php echo form_close(); ?>