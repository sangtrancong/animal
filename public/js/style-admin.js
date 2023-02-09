$(document).ready(function () {

    $('#datatable').DataTable({
       paging: true,
    	searching: true,
        "language": {
            "decimal": "",
            "emptyTable": "Không có dữ liệu trong bảng",
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ entries",
            "infoEmpty": "Hiển thị 0 to 0 của 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển thị _MENU_ ",
            "loadingRecords": "Đang tải...",
            "processing": "",
            "search": "Tìm kiếm:",
            "zeroRecords": "No matching records found",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
    $('#visitTable').DataTable({
        order: [[0, 'desc']],
        paging: true,
         searching: true,
         "language": {
             "decimal": "",
             "emptyTable": "Không có dữ liệu trong bảng",
             "info": "Hiển thị _START_ đến _END_ của _TOTAL_ entries",
             "infoEmpty": "Hiển thị 0 to 0 của 0 entries",
             "infoFiltered": "(filtered from _MAX_ total entries)",
             "infoPostFix": "",
             "thousands": ",",
             "lengthMenu": "Hiển thị _MENU_ ",
             "loadingRecords": "Đang tải...",
             "processing": "",
             "search": "Tìm kiếm:",
             "zeroRecords": "No matching records found",
             "paginate": {
                 "first": "First",
                 "last": "Last",
                 "next": "Next",
                 "previous": "Previous"
             },
             "aria": {
                 "sortAscending": ": activate to sort column ascending",
                 "sortDescending": ": activate to sort column descending"
             }
         }
     });
});

