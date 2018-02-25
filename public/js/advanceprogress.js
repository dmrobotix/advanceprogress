$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#modelleg-submit').on('submit', function(event) {
    event.preventDefault();
    console.log("prevented form submit");

      $.ajax({
        type:"POST",
        url:"/database",
        data: $(this).serialize()
      })

      .done(function(response) {
        var data = JSON.parse(response);
        console.log(data.length);
        if (data.length != 0) {
          console.log("data has contents");
          var table = "";
          for(var i=0; i < data.length; i++) {
            table = table + "<tr><td>" + data[i].mleg_id + "</td><td>" +
            data[i].title_of_model_legislation + "</td><td>" + data[i].type +
            "</td><td><a href=\"legislation/model/" + data[i].mleg_id + "\">" +
            data[i].summary + "</a></td></tr>";
          }
        } else {
          console.log("data has no contents");
          var table = "no results found.";
        }
        console.log("printing to div");
          $('#modleg-results').html(table);
      });

  });

});
