$.extend( true, $.fn.dataTable.defaults, {
    "language": {
        lengthMenu: "_MENU_ rækker",
        emptyTable: "<span style=\"font-size: 18px\">o.O</span><br />Her er tomt",
        info: "Viser _PAGE_ af _PAGES_",
        infoEmpty: "Intet at vise",
        loadingRecords: "<div class=\"ui active centered big inline loader\" style=\"margin-top: 15px\"></div><br />Henter data",
        processing: "<div class=\"ui active centered big inline loader\" style=\"margin-top: 15px\"></div><br />Arbejder",
        search: "Søg",
        zeroRecords: "Ingen data blev fundet",
        paginate: {
            first: "Første",
            previous: "Forrige",
            next: "Næste",
            last: "Sidste"
        },
        aria: {
            first: "Første",
            previous: "Forrige",
            next: "Næste",
            last: "Sidste"
        }
    }
});