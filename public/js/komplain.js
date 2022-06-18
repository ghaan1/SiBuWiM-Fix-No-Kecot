$(function () {
    $("#table-komplain").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/komplain`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "nama", name: "nama", className: "text-center" },
            { data: "judul", name: "judul", className: "text-center" },
            { data: "isi", name: "isi", className: "text-center" },
            { data: "jenis_komplain", name: "jenis_komplain", className: "text-center" },
            { data: "status", name: "status", className: "text-center" },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, }
        ]
    });
});
