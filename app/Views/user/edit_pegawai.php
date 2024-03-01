<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('Data_Pegawai/aksi_edit')?>" method="post">
                 <input type="hidden" name="id" value="<?= $data->id_user ?>">

                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Pegawai<span style="color: red;">*</span></label>
                        <input type="text" id="nama_pegawai" name="nama_pegawai" 
                        class="form-control text-capitalize" placeholder="Nama Pegawai" value="<?= $data->nama_pegawai?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">No Telepon<span style="color: red;">*</span></label>
                        <input type="number" id="no_telp" name="no_telp" 
                        class="form-control text-capitalize" placeholder="No Telepon" oninput="validateNumberInput(this)" autocomplete="on" value="<?= $data->no_telp?>">
                    </div>


                <div class="mb-3 col-md-6">
                    <label class="form-label">Username<span style="color: red;">*</span></label>
                    <input type="text" id="username" name="username" 
                    class="form-control text-capitalize" placeholder="Username" maxlength="50" value="<?= $data->username?>">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Level<span style="color: red;">*</span></label>
                    <div class="col-12">
                        <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                          <?php if ($data->level == 1){ ?>
                            <option value="1" selected>ADMIN</option>
                            <option value="2">PETUGAS</option>
                        <?php } ?>
                      </select>
                  </div>
              </div>
          </div>
          <a href="<?= base_url('/Data_Pegawai/')?>" type="submit" class="btn btn-primary">Kembali</a></button>
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>