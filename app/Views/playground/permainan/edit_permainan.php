<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('Playground/aksi_edit_permainan')?>" method="post">
                 <input type="hidden" name="id" value="<?= $data->id_permainan ?>">

                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Permainan<span style="color: black;"> :</span></label>
                        <input type="text" id="nama_permainan" name="nama_permainan" class="form-control text-capitalize" placeholder="Nama Permainan" autocomplete="on" value="<?= $data->nama_permainan?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Harga Permainan /Jam<span style="color: black;"> :</span></label>    
                        <div class="input-group mb-3 input-basic">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="harga_permainan" name="harga_permainan" class="form-control text-capitalize" placeholder="Harga Permainan /Jam" oninput="validateNumberInput(this)" autocomplete="on" value="<?= $data->harga_permainan?>">
                            <span class="input-group-text">,00</span>
                        </div>
                    </div>
                    <script>
                        function validateNumberInput(input) {
                            let value = input.value.replace(/\D/g, '');

                            let formattedValue = new Intl.NumberFormat('id-ID').format(Number(value));

                            input.value = formattedValue;
                        }
                    </script>
                </div>
          <a href="<?= base_url('/Playground/permainan/')?>" type="submit" class="btn btn-primary">Kembali</a></button>
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>