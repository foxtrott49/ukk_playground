<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 4000px;
      margin: auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 200px;
    }

    .footer {
      text-align: center;
      margin-top: 200px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 50px;
    }

    .center {
  margin-left: auto;
  margin-right: auto;
}

    table {
      width: 90%; 
      border-collapse: collapse;
      align:center;
      
    }

    th, td {
      /* border: 1px solid #000; */
      margin-top:10px;
      margin-bottom:10px;
      padding: 8px;
      text-align: left;
    }

    .total, th{
      border-top: 2px dotted #000;
      /* border-radius: 10px; */
     
    }

   
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Playground Konoha</h1>
      <h3>bla bla blok 31b bla bla</h3>
      <h4 class="text-capitalize text-center">Tanggal Pembelian : <?php echo $data->tanggal_playground?></h4>
    </div>

    <div class="table-container">
      <table class="center">
        <thead>
          <tr>
            <th class="text-center">Nama Permainan</th>
            <th class="text-center">Nama Anak</th>
            <th class="text-center">Nama Orang Tua</th>
            <th class="text-center">Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0; 

            ?>
            <tr>
              <td class="text-capitalize text-center"><?php echo $data->nama_permainan?></td>
              <td class="text-capitalize text-center"><?php echo $data->nama_anak?></td>
              <td class="text-capitalize text-center"><?php echo $data->nama_ortu?></td>
              <td class="text-center text-capitalize text-dark text-success">Rp <?php echo number_format($data->durasi * $data->harga_permainan , 2, ',', '.'); ?></td>
            </tr>

            <?php
            $jumlahPajak = $data->total_harga - $data->durasi * $data->harga_permainan; 
          $pajak = $data->durasi * $data->harga_permainan / $jumlahPajak
          ?>

<tr>
            <td colspan="2"></td>
            <td><b>Pajak</b></td>
            <td><b><?= $pajak?>%</b></td>

          </tr>
          
          <tr class="total">
            <td colspan="2"></td>
            <td><b>TOTAL</b></td>
            <td><b>Rp <?php echo number_format($data->total_harga, 2, ',', '.'); ?></b></td>

          </tr>
          
        </tbody>
      </table>

      <div class="footer">
      <h1>Kontak Kami</h1>
      <h3>Nomor telepon : xxx-xxx-xxx</h3>
      <h3>Email : example@example.com</h3>
    </div>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
