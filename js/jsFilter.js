 $(document).ready(function() {
            // تفعيل DataTable
            var table = $('#example').DataTable({
                dom: 'Bfrtip',  // ترتيب العناصر (الأزرار والبحث)
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'  // أزرار التصدير
                ],
                paging: true,  // تمكين التصفح عبر الصفحات
                pageLength: 5,  // عدد العناصر المعروضة في كل صفحة
                lengthMenu: [5, 10, 15, 20],  // خيارات عدد العناصر في كل صفحة
                searching: true,  // تمكين ميزة البحث
                ordering: true,  // تمكين ميزة الترتيب
                order: [[3, 'asc']],  // الترتيب الافتراضي للعمود (العمر - تصاعدي)
                columnDefs: [
                    { targets: [0, 1, 2], searchable: true }  // تمكين البحث في هذه الأعمدة
                ]
            });

            // فلتر الوظيفة
            $('#jobFilter').on('change', function() {
                var filterValue = $(this).val();
                if (filterValue) {
                    // تصفية البيانات بناءً على الوظيفة المختارة
                    table.column(4).search('^' + filterValue + '$', true, false).draw();
                } else {
                    table.column(4).search('').draw();  // إعادة عرض جميع البيانات
                }
            });
        });