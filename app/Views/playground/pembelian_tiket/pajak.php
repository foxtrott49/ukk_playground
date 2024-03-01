<div class="row">
    

    <style>
    .card {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden; 
    }

    .card-bg {
        background-size: 100% 100%;
        height: 150px;
        position: relative;
    }

    .card-body {
        padding: 20px;
    }

    table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse; 
    }

    th, td {
        border: none;
        padding: 4px; 
        text-align: left;
    }

    th {
        width: 40%;
        font-weight: normal;
    }

    .form-group {
        margin-bottom: 15px;
    }

    hr {
        margin-top: 15px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #000000;
    }
    </style>

    <div class="col-md-7 col-sm-7 col-xs-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('playground/perubahan_pajak_pembelian_tiket')?>" method="post">
                <div class="item form-group">
                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Pajak Sekarang<span style="color: black;"> :</span>
                      </label>
                      <div class="input-group">
                      <input type="number" placeholder="Persen Pajak" name="pajak" class="form-control col-md-12 col-xs-12" value="<?= $data->persen_pajak?>" data-validate-length-range="6" data-validate-words="2" id="pajak" disabled  >
                      <span class="input-group-text" >%</span>
                    </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Ganti Pajak Baru<span style="color: black;"> :</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group">
                    <input type="number" placeholder="Persen Pajak Baru" name="pajakBaru" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" id="pajakBaru"  >
                      <span class="input-group-text" >%</span>
                  </div>
              </div>
          </div>
         
        </div>
        <div class="ln_solid"></div>
            <div class="col-md-12 float-right">
                <button type="submit" class="btn btn-info" >Ganti Pajak</button>
            </div>
        <style>
            .form-groupp .col-md-12 {
                text-align: right;
            }
        </style>
  </form>
</div>
</div>
</div>
</div>
