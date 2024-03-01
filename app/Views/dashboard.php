<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                	<style>
            		.hidden {
					    display: none;
					}
                	</style>
<table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 200px;">Nama Anak</th>
                                <th style="text-align: center; width: 200px;">Nama Ortu</th>
                                <th style="text-align: center; width: 200px;">Nama Permainan</th>
                                <th style="text-align: center; width: 150px;">Durasi</th>
                                <th style="text-align: center;" class="hidden">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
$no = 1; // Initialize $no outside the loop
foreach ($data as $dataa) {
    if ($dataa->status == "1") {
?>
        <tr>
            <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_anak ?></td>
            <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_ortu?></td>
            <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_permainan ?></td>
            <td style="text-align: center;" class="text-capitalize">
                <span id="countdown_<?php echo $no; ?>"></span>
                <script>
                                    // Countdown script for each row
                                    var countDownDate_<?php echo $no; ?> = new Date("<?php echo date('Y/m/d H:i:s', strtotime($dataa->jam_selesai)); ?>").getTime();
                                    var countdownElement_<?php echo $no; ?> = document.getElementById("countdown_<?php echo $no; ?>");

                                    var x_<?php echo $no; ?> = setInterval(function () {
                                        var now_<?php echo $no; ?> = new Date().getTime();
                                        var distance_<?php echo $no; ?> = countDownDate_<?php echo $no; ?> - now_<?php echo $no; ?>;
                                        var hours_<?php echo $no; ?> = Math.floor(distance_<?php echo $no; ?> / (1000 * 60 * 60));
                                        var minutes_<?php echo $no; ?> = Math.floor((distance_<?php echo $no; ?> % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds_<?php echo $no; ?> = Math.floor((distance_<?php echo $no; ?> % (1000 * 60)) / 1000);

                                        if (distance_<?php echo $no; ?> > 0) {
                                            countdownElement_<?php echo $no; ?>.innerHTML = hours_<?php echo $no; ?> + "h " + minutes_<?php echo $no; ?> + "m " + seconds_<?php echo $no; ?> + "s ";
                                        } else {
                                            console.log("distance_<?php echo $no; ?>:", distance_<?php echo $no; ?>);

                                            clearInterval(x_<?php echo $no; ?>);
                                            countdownElement_<?php echo $no; ?>.innerHTML = "Selesai";
                                            // Additional logic if needed
                                            var editStatusButton_<?php echo $no; ?> = document.getElementById("edit_status_btn_<?php echo $no; ?>");
                                                        if (editStatusButton_<?php echo $no; ?>) {
                                                            editStatusButton_<?php echo $no; ?>.click();
                                                        }
                                        }
                                    }, 1000);
                                </script>
            </td>
            <td class="hidden">
                <div class="text-center mb-1">
                    <form method="post" action="<?= base_url('/home/edit_status/'.$dataa->id_playground )?>">
                        <button type="submit" class="btn btn-warning" name="edit_status_btn" id="edit_status_btn_<?php echo $no; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
<?php
        $no++; // Increment $no inside the loop
    }
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 200px;">Nama Anak</th>
                                <th style="text-align: center; width: 200px;">Nama Ortu</th>
                                <th style="text-align: center; width: 200px;">Durasi</th>
                                <th style="text-align: center; width: 200px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
	                          $no2=1;
	                         
	                          foreach ($data2 as $dataa){
	                            if ($dataa->status != "1") {
                            ?>
                            <tr>
                                <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_anak?></td>
                                <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_ortu?></td>
                                <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->durasi?> Jam</td>
                                <td style="text-align: center;" class="text-capitalize">
                                    <?php 
                                        if ($dataa->status == 2) {
                                            echo '<span style="color: #01796f;">Selesai</span>';
                                        } else {
                                            echo $dataa->status;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>