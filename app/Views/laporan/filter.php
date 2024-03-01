<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Laporan Pemasukan</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="LaporanPemasukan" method="post" target="_blank">

                                    <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label>Tanggal awal</label>
                                        <input required type="date" id="awal" name="awal"  class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal akhir</label>
                                        <input required type="date" id="akhir" name="akhir"  class="form-control" >
                                    </div>
                                    
                                        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                                    <a href="javascript:void(0);" onclick="generatePrintPemasukan()" class="btn btn-box btn-warning" title="Print"> <i class="ti-file"></i> Print</a>

                                    <a href="javascript:void(0);" onclick="generatePDFPemasukan()" class="btn btn-box btn-danger" title="PDF"> <i class="ti-file"></i> PDF</a>

                                    <a href="javascript:void(0);" onclick="generateExcelPemasukan()" class="btn btn-box btn-success" title="Excel"><i class="ti-file"></i> Excel</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-title">
                            <h4>Laporan Pengeluaran</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="LaporanPengeluaran" method="post" target="_blank">

                                    <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label>Tanggal awal</label>
                                        <input required type="date" id="awal" name="awal"  class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal akhir</label>
                                        <input required type="date" id="akhir" name="akhir"  class="form-control" >
                                    </div>
                                    
                                        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                                    <a href="javascript:void(0);" onclick="generatePrintPengeluaran()" class="btn btn-box btn-warning" title="Print"> <i class="ti-file"></i> Print</a>

                                    <a href="javascript:void(0);" onclick="generatePDFPengeluaran()" class="btn btn-box btn-danger" title="PDF"> <i class="ti-file"></i> PDF</a>

                                    <a href="javascript:void(0);" onclick="generateExcelPengeluaran()" class="btn btn-box btn-success" title="Excel"><i class="ti-file"></i> Excel</a>
                                </form>
                            </div>
                        </div>
                    </div>

              
        </div>
                </div>
            </div>
        </div>
    </div>

    <script>

function generatePrintPemasukan() {
    var form = document.getElementById("LaporanPemasukan");
    form.action = "/laporan/print";
    form.submit();
}

  function generatePDFPemasukan() {
    var form = document.getElementById("LaporanPemasukan");
    form.action = "/laporan/pdf";
    form.submit();
}
function generateExcelPemasukan() {
    var form = document.getElementById("LaporanPemasukan");
    form.action = "/laporan/excel";
    form.submit();
}

function generatePrintPengeluaran() {
    var form = document.getElementById("LaporanPengeluaran");
    form.action = "/laporan/print_pengeluaran";
    form.submit();
}

  function generatePDFPengeluaran() {
    var form = document.getElementById("LaporanPengeluaran");
    form.action = "/laporan/pdf_pengeluaran";
    form.submit();
}
function generateExcelPengeluaran() {
    var form = document.getElementById("LaporanPengeluaran");
    form.action = "/laporan/excel_pengeluaran";
    form.submit();
}
</script>