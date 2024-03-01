<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Pemasukan</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Nama Permainan</th>
            <th class="text-center">Nama Anak</th>
            <th class="text-center">Nama Orang Tua</th>
            <th class="text-center">Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0; 

          foreach ($data as $dataa) {
            ?>
            <tr>
              <td class="text-capitalize text-center"><?php echo $dataa->tanggal_laporan?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->nama_permainan?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->nama_anak?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->nama_ortu?></td>
              <td class="text-center text-capitalize text-dark text-success">Rp <?php echo number_format($dataa->total_harga, 2, ',', '.'); ?></td>
            </tr>

            <?php
            $total += $dataa->total_harga; 
          }
          ?>
          
          <tr>
            <td colspan="3"></td>
            <td><b>TOTAL :</b></td>
            <td style="color: seagreen;"><b>Rp <?php echo number_format($total, 2, ',', '.'); ?></b></td>

          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>