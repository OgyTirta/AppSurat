<html>
    <div class="col-6 bg-chart">
        <div id="canvas-holder" style="width:100%">
		    <canvas id="chart-area" class="mt-3 pt-3"></canvas>
	    </div>
    </div>
    <div class="col-6 bg-chart">
        <div id="canvas-holder" style="width:100%">
		    <canvas id="chart-area2" class="mt-3 pt-3"></canvas>
	    </div>
    </div>

    <script src="chart-js/Chart.js"></script>
    <script src="chart-js/Chart.bundle.js"></script>
    <script src="chart-js/utils.js"></script>

    <script>
        //Grafik Surat Masuk & Keluar
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
                        <?php
                            echo $suratMasuk;
                        ?>, //Data Surat Masuk
                        <?php
                            echo $suratKeluar;
                        ?> //Data Surat Keluar
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Surat Masuk',
					'Surat Keluar',
				]
			},
			options: {
				responsive: true
			}
        };
        
        //Grafik Jenis Surat
        var config2 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
                        <?php
                            echo $aSuk;
                        ?>, //Data Surat Quatation
                        <?php
                            echo $eSuk;
                        ?>, //Data Surat Berita Acara
                        <?php
                            echo $cSuk;
                        ?> //Data Surat Invoice
					],
					backgroundColor: [
						window.chartColors.red,
                        window.chartColors.blue,
                        window.chartColors.orange
					],
					label: 'Dataset 1'
				}],
				labels: [
                    'Quotation',
                    'Berita Acara',
                    'Invoice'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
            
            var ctx = document.getElementById('chart-area2').getContext('2d');
			window.myPie = new Chart(ctx, config2);
        };	
        
        	
    </script>
    
    
</html>