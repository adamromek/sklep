$(function() {
    $("#nazwaT").autocomplete({
        source: "searchTowar.php",
             focus: function(event, ui) {
					     $("#indeks").val(ui.item.indeks);
               $("#nazwaT").val(ui.item.value);  //wyszukujemy po nazwie, równocześnie pokazuje indeks a dopiero po kliknięciu id

              //  $("#id_dostawcy").val(ui.item.id);
                return false;
         },
            select: function(event, ui) {
              $("#nazwaT").val(ui.item.value);
              $("#indeks").val(ui.item.indeks);
               // $("#id_dostawcy").val(ui.item.id);
                return false;
            }
    });
});
