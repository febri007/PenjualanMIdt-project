<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
<i class="fa fa-trash-o"></i> Hapus
</button>

<div class="modal modal-danger fade" id="delete-<?php echo $produk->id_produk ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Hapus Data Produk</h4>
      </div>
      <div class="modal-body">
       <div class="callout callout-info">
            <h4>Peringatan!</h4>
             Yakin ingin menghapus data ini ? Data yang sudah dihapus tidak dapat dikembalikan.
          </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-warning pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
        <a href="<?php echo base_url('admin/produk/delete/'.$produk->id_produk) ?>" class="btn btn-primary"><i class="fa fa-trash-o"></i> Ya, Hapus Data Ini</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->