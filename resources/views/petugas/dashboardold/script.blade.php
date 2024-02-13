<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
</script>
<script>
    $(() => {
        init();
        $('.menu-link').removeClass('active');
        $('.dashboard').addClass('active');
    });

    init = async () => {
        // await loaddata();
    }
    // jobMap();

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
