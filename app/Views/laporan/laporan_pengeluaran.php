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
      <h1>Laporan Pengeluaran</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Tujuan Pengeluaran</th>
            <th class="text-center">Nama Maker</th>
            <th class="text-center">Jumlah Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0; 

          foreach ($data as $dataa) {
            ?>
            <tr>
            <td class="text-capitalize text-center"><?php echo $dataa->tanggal_pengeluaran?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->tujuan_pengeluaran?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->nama_pegawai?></td>
              <td style="text-align: center;" class="text-capitalize">Rp <?= number_format($dataa->jumlah_pengeluaran) ?></td>
            </tr>

            <?php
            $total += $dataa->jumlah_pengeluaran; 
          }
          ?>
          
          <tr>
            <td colspan="2"></td>
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