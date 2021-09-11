<form id="payment-form" method="post" action="<?= site_url() ?>/dasbor/finish">
  <input type="hidden" name="result_type" id="result-type" value=""></div>
  <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-2 col-lg-2 p-b-12">
        <div class="leftbar p-r-3 p-r-0-sm">
          <!--  -->
          <?php include('menu.php') ?>
        </div>
      </div>

      <div class="col-sm-9 col-md-9 col-lg-10 p-b-50">

        <h2><?php echo $title ?></h2>
        <hr>
        <p>
          Berikut adalah riwayat belanja Anda
        </p>

        <?php
        // Kalau ada transaksi, tampilkan tabel
        if ($header_transaksi) { // $header_transaksi itu dari Dasbor.php 
        ?>

          <br>

          <table class="table table-responsive table-bordered table-striped table-hover" width="100%" id="qq">
            <thead>
              <tr class="bg-success text-dark">
                <th>NO</th>
                <th>KODE</th>
                <th>TANGGAL</th>
                <th>TOTAL BIAYA TRANSAKSI</th>
                <th>JUMLAH ITEM</th>
                <th>STATUS BAYAR</th>
                <th width="5px">PEMBAYARAN</th>
              </tr>
            </thead>

            <tbody>

              <?php $i = 1;
              foreach ($header_transaksi as $header_transaksi) { // ini tuh tabel header_transaksi
              ?>
                <tr class="text-right">
                  <td><?php echo $i ?></td>
                  <td><?php echo $header_transaksi->kode_transaksi ?></td>
                  <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                  <td> Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                  <td align="center"><?php echo $header_transaksi->total_item ?></td>
                  <td><?php echo $header_transaksi->status_bayar ?></td>
                  <td>
                    <div>
                      <table>
                        <td>
                          <a href="<?php echo base_url('dasbor/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-eye"></i> Detail </a>
                        </td>
                        <!-- <td>
													<a href="<?php echo base_url('dasbor/konfirmasi/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Transfer </a>
												</td>
												<td>
													<a href="<?php echo base_url('dasbor/emoney/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> OVO </a>
												</td> -->
                        <td>
                          <button id="pay-button" class="btn btn-success btn-sm"> Pembayaran </button>
                          <!-- <button onclick="alert($('button').index($(this)))"> CEK index </button> -->
                          <!-- <button onclick="alert(document.querySelectorAll('td#kd')[$('button').index($(this))].innerHTML + document.querySelectorAll('td#tt')[$('button').index($(this))].innerHTML)"> CEK data </button> -->
                        </td>


                      </table>
                    </div>
                  </td>
                </tr>
              <?php $i++;
              } ?>
            </tbody>
          </table>

        <?php
          // Kalau gada tampilkan notifikasi 
        } else { ?>

          <p class="alert alert-success">
            <i class="fa fa-warning"></i> Belum ada data transaksi
          </p>

        <?php } ?>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-v3EinVZ1RmEUUxf_"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">
  $('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("enabled", "enabled");

    $.ajax({
      url: '<?= site_url() ?>/dasbor/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = ' + data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type, data) {
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result) {
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result) {
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>