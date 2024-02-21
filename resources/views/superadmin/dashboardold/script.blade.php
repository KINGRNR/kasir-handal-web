<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.10.0/chart.min.js"></script>



<script>
    $(() => {
        init();
        $('.menu-link').removeClass('active');
        $('.dashboard').addClass('active');
    });

    init = async () => {
        await loadPie();
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

        // Get the canvas element
        var ctx = document.getElementById('myPieChart').getContext('2d');

        // Create a pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                // Additional options for the chart
            }
        });
    }
    function loadBar() {
        var data = {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
            datasets: [{
                label: 'Bar Chart Dataset',
                data: [50, 30, 40, 20], // Example data, adjust as needed
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
            }]
        };

        // Get the canvas element
        var ctx = document.getElementById('myBarChart').getContext('2d');

        // Create a bar chart
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
    }
    loaddata = async () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/jobs_detail',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    job = response.jobs;
                    $.each(job, function(i, v) {
                        console.log(v.job_description);
                        $(`#btn-submitjob`).attr('data-id', v.job_id)
                        $(`#title_job`).text(v.job_name);
                        $(`#company_name`).text(v.company_name);
                        $(`#company_website`).html(
                            '<i class="fa fa-link">&nbsp;</i>' + v
                            .company_website);
                        $(`#company_num`).html('<i class="fa fa-phone">&nbsp;</i>' +
                            v
                            .company_number);
                        $(`#company_email`).html(
                            '<i class="fa fa-envelope">&nbsp;</i>' + v.email);
                        $(`#company_name`).text(v.company_name);
                        $(`#company_website`).html(
                            '<i class="fa fa-link">&nbsp;</i>' + v
                            .company_website);
                        $(`.job-desc`).append(v.job_description)
                        jobOverview(v)
                        jobMap(v.job_map_latitude, v.job_map_longitude).then(() => {
                            resolve();
                        });
                    })
                    $('#loading-spinner').css('display', 'none');

                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }
</script>
