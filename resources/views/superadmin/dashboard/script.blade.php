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
        await loadDetail();

    }
    // jobMap();
    function loadDetail() {
        $.ajax({
            url: APP_URL + 'dashboard/loadDetail',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                console.log(response);
                $('.total_pengguna').text(response.user_count);
                $('.total_toko').text(response.toko_count);
                $('.total_tokoperhari').text(response.toko_perhari);

                // Menambahkan data toko ke dalam grafik
                var labels = [];
                var data = [];
                // Memasukkan data toko dari terlama ke terbaru
                response.toko_urut.forEach(function(toko) {
                    labels.push(toko.created_at); // Menggunakan tanggal pembuatan sebagai label
                    data.push(toko.toko_id); // Menggunakan ID toko sebagai data
                });

                // Membalikkan urutan data
                labels.reverse();
                data.reverse();

                var barData = {
                    labels: labels,
                    datasets: [{
                        label: 'Toko Per Hari',
                        data: data,
                        backgroundColor: '#36A2EB'
                    }]
                };

                var ctx = document.getElementById('myBarChart').getContext('2d');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: barData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        var label = context.dataset.label || '';

                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.parsed.y;
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
                var tableTokoTerlaris = $('#table-kategori tbody');
                tableTokoTerlaris.empty(); // Menghapus data sebelumnya

                response.toko_terlaris.forEach(function(toko) {
                    var row = '<tr>' +
                        '<td>' + toko.toko_nama + '</td>' +
                        '<td>Rp.' + toko.total_penjualan + ',-</td>' +
                        '<td>' + toko.total_transaksi + 'x</td>' +
                        '</tr>';
                    tableTokoTerlaris.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error('Ada masalah dalam mengambil data:', error);
            }
        });
    }
</script>
