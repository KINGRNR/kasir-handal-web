
var quick = {
    convertDate: function (data) {
        var date = new Date(data);

        var monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        var day = date.getDate().toString().padStart(2, '0');
        var month = monthNames[date.getMonth()];
        var year = date.getFullYear();

        return day + ' ' + month + ' ' + year;
    },
    formatRupiah(amount) {
        var reversedAmount = amount.toString().split('').reverse().join('');
        var groups = reversedAmount.match(/\d{1,3}/g);
        var formattedAmount = groups.join('.').split('').reverse().join('');
    
        return 'Rp ' + formattedAmount;
    },
    leafletMapSelector: function (id, a , b) {
        var map = L.map(id).setView([-2.5489, 118.0149], 5); 
    
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        var markers = [];
    
        map.on('click', function (e) {
            markers.forEach(function (marker) {
                map.removeLayer(marker);
            });
            markers = []; 
    
            var marker = L.marker(e.latlng).addTo(map); 
            marker.bindPopup('Latitude: ' + e.latlng.lat + '<br>Longitude: ' + e.latlng.lng).openPopup();
            markers.push(marker); 
            var latitude = e.latlng.lat
            var longitude = e.latlng.lng
    
            $(a).attr('value', latitude);
            $(b).attr('value', longitude);
            
        });
    },

    leafletMapShowStatic: function (id, lt, ln) {
        var map = L.map(id).setView([-2.5489, 118.0149], 2);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = L.layerGroup().addTo(map);

        function addMarkerAtCoordinates(lat, lng) {
            var marker = L.marker([lat, lng]).addTo(markers);
            var coordinates = lat + ',' + lng;
            var googleMapsUrl = 'https://www.google.com/maps/search/?q=' + encodeURIComponent(coordinates);


            marker.bindPopup('<a href="' + googleMapsUrl + '" target="_blank">For Detail</a>');

            marker.addTo(map);

        }

        addMarkerAtCoordinates(lt, ln);
    },

    blockPage: function () {
        // const loadingDiv = $(
        //     `<div class="loading loading-spinner-overlay" id="loading-spinner"><button class="btn btn-primary" type="button" disabled>
        //     <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        //     <span role="status">Loading...</span>
        //   </button></div>`
        // );
        const loadingDiv = $(
            `<div class="loading-spinner">
            <div class="loading loading-spinner-overlay" id="loading-spinner"><button class="btn btn-primary" type="button"
                    disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button></div>
        </div>`
        )
        loadingDiv.hide().appendTo(".loading").fadeIn(100);
    },

    unblockPage: function (data) {
        $(".loading").fadeOut();
        // removeSkeleton();
    },
    dateRangeFilter: function (id) {
        var start = moment().subtract(29, "days");
        var end = moment();

        function cb(start, end) {
            $(id).html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        }

        $(id).daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                "Hari Ini": [moment(), moment()],
                "Kemarin": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "7 Hari Terakhir": [moment().subtract(6, "days"), moment()],
                "30 Hari Terakhir": [moment().subtract(29, "days"), moment()],
                "Bulan Ini": [moment().startOf("month"), moment().endOf("month")],
                "Bulan Lalu": [moment().subtract(1, "month").startOf("month"), moment().subtract(1,
                    "month").endOf("month")]
            }
        }, cb);

        cb(start, end);
    },
    toastNotif: function(data) {
        data = $.extend ( 
            true, 
            {
                title: 'error!',
                text: null,
                icon: "error",
                timer: 3500,
                position: "top-end",
                showConfirmButton: false,
                timerProgressBar: true,
                callback: function () {},
            },
            data
        )
        const Toast = Swal.mixin({
            toast: true,
            position: data.position,
            showConfirmButton: data.showConfirmButton,
            timer: data.timer,
            timerProgressBar: data.timerProgressBar,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            didClose: (toast) => {
                data.callback(toast)
            }
        })
        Toast.fire({
            title: data.title,
            text: data.text,
            icon: data.icon,
        })
    },
    reload: function(param){
        $("[data-code='" + param + "']").trigger('click');
    }
};


