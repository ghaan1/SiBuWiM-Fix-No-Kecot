$(function () {
    $("#table-halte").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/halte`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "nama", name: "nama", className: "text-center" },
            { data: "kota", name: "kota", className: "text-center" },
            { data: "provinsi", name: "provinsi", className: "text-center" },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, }
        ]
    });

    $("#table-halte").on("click", ".btn-edit-halte", function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: `${APP_URL}/halte/${id}/edit`,
            beforeSend: function () {
                $('#body-modal-edit').hide();
                $('#loading').show();
            },
            success: function (res) {
                $('#loading').hide();
                $('#body-modal-edit').show();
                $('#form-edit-halte').attr('action', `${APP_URL}/${url}`);
                $('#produk_id_edit').val(res.data.produk_id);
                $('#nama_edit').val(res.data.nama);
                $('#kota_edit').val(res.data.kota);
                $('#provinsi_edit').val(res.data.provinsi);
            },
        });
    });

    $("#table-halte").on("click", ".btn-delete-halte", function () {
        var id = $(this).data('id');
        $("#form-delete-halte").on("submit", function (e) {
            var url = APP_URL + "/halte/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteHalteModal").modal("hide");
                    $("#table-halte").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });
});
