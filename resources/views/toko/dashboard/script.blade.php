<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.10.0/chart.min.js"></script>
<script src="../assets/js/quickact.js"></script>



<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        init();
        $('.menu-link').removeClass('active');
        $('.dashboard').addClass('active');
    });

    init = async () => {
        await loadRiwayatTransaksi();
        await loadBar();

    }
    // jobMap();
    function loadPie() {
        var data = {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                data: [30, 40, 30], // Example data, adjust as needed
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        };

        var ctx = document.getElementById('myPieChart').getContext('2d');

        // Create a pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {}
        });
    }

    function loadRiwayatTransaksi() {
        $.ajax({
            url: APP_URL + 'dashboard/loadRiwayatTransaksi',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                console.log(response);
                var riwayat = ''; // Deklarasi variabel di luar loop
                $('.total_saldo').text(quick.formatRupiah(response.total_saldo));
                $('.total_merek').text(response.total_merek);
                $('.total-pelanggan').text(response.total_pelanggan)
                $.each(response.riwayat_transaksi, function(index, transaksi) {
                    var waktu = new Date(transaksi.penjualan_created_at);
                    var jamDanMenit = waktu.getHours() + ':' + waktu.getMinutes();
                    riwayat += `<div class="timeline-item">
                        <div class="timeline-label fw-bolder text-gray-800 fs-6">${jamDanMenit}</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-warning fs-1"></i>
                        </div>
                        <div class="timeline-content">
                            <span class="fw-bolder text-gray-800 ps-3">${transaksi.jumlah_barang_terjual} Barang Terjual</span>
                            <p class="text-primary ps-3">#${transaksi.penjualan_id}</p>
                        </div>
                    </div>`;
                });
                $('.timeline-label').empty().append(riwayat); // Tambahkan semua riwayat setelah loop selesai
            },


            error: function(xhr, status, error) {
                console.error('Ada masalah dalam mengambil data penjualan:', error);
            }
        });
    }

    function loadBar() {
        $.ajax({
            url: APP_URL + 'dashboard/loadPenjualan',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Menyiapkan data untuk grafik
                var labels = Object.keys(response);
                var dataPenjualan = labels.map(function(bulan) {
                    return response[bulan];
                });

                var data = {
                    labels: labels,
                    datasets: [{
                        label: 'Penjualan per Bulan',
                        data: dataPenjualan,
                        backgroundColor: ['#2E90FA']
                    }]
                };

                var ctx = document.getElementById('myBarChart').getContext('2d');

                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Ada masalah dalam mengambil data penjualan:', error);
            }
        });
    }

    $(document).ready(function() {
        loadBar();
    });
</script>
