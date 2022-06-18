$(function () {
    $("#table-armada").DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: `${APP_URL}/armada`
        }, columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center", width: "4%", },
            { data: "nama", name: "nama", className: "text-center" },
            { data: "stock", name: "stock", className: "text-center" },
            { data: "tarif", name: "tarif", className: "text-center" },
            { data: "action", name: "action", className: "text-center", orderable: false, searchable: false, }
        ]
    });

    $("#table-armada").on("click", ".btn-edit-armada", function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "GET",
            url: `${APP_URL}/armada/${id}/edit`,
            beforeSend: function () {
                $('#body-modal-edit').hide();
                $('#loading').show();
            },
            success: function (res) {
                $('#loading').hide();
                $('#body-modal-edit').show();
                $('#form-edit-armada').attr('action', `${APP_URL}/${url}`);
                $('#nama').val(res.data.nama);
                $('#stock_edit').val(res.data.stock);
                $('#tarif_edit').val(res.data.tarif);
            },
        });
    });

    $("#table-armada").on("click", ".btn-delete-armada", function () {
        var id = $(this).data('id');
        $("#form-delete-armada").on("submit", function (e) {
            var url = APP_URL + "/armada/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                success: function (res) {
                    $("#deleteArmadaModal").modal("hide");
                    $("#table-armada").DataTable().ajax.reload();
                },
                error: (e, x, settings, exception) => {
                },
            });
            e.preventDefault();
        });
    });
});
