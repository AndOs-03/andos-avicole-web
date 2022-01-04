$(function mydatatable() {
    $("#dg_1").DataTable({
        language: {
            "lengthMenu": "Afficher _MENU_ élement par page",
            "zeroRecords": "Aucune données disponible",
            "info": "Affichage de _PAGE_ à _PAGES_ pages",
            "infoEmpty": "Aucune données disponible à afficher",
            "infoFiltered": "(filtrer depuis _MAX_ éléments au total)",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
        },

        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#dg_2").DataTable({
        language: {
            "lengthMenu": "Afficher _MENU_ élement par page",
            "zeroRecords": "Aucune données disponible",
            "info": "Affichage de _PAGE_ à _PAGES_ pages",
            "infoEmpty": "Aucune données disponible à afficher",
            "infoFiltered": "(filtrer depuis _MAX_ éléments au total)",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
        },

        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});