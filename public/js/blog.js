(function($) {
  $("#savebtn").click( function(eventObj) {
    event.preventDefault();
      $('<input>').attr('type', 'hidden')
          .attr('name', "button")
          .attr('value', "save")
          .appendTo('#createform');
      $('#createform').submit();
  });
  $("#deletebtn").click( function(eventObj) {
    event.preventDefault();
  });
}(jQuery));

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".next").on("click", function(event) {
    event.preventDefault();

    var id = $(this).attr('data-id');
    var page = $(this).attr('data-page')

    if(!$(this).hasClass( "disabled" )) {
      $.ajax({
        type:"POST",
        url:"/blogdeck/"+page+"/"+id+"/next",
        data: $(this).serialize()
      })

      .done(function(response) {
        var posts = JSON.parse(response);
        if (posts) {
          for (var i = 0; i < posts.length; i++) {
            var blogcode = "<div class=\"panel-heading side-posts-heading\"><strong>blog #" + posts[i].id +"</strong>: " + posts[i].title +"</div><div class=\"panel-body side-posts\">"+posts[i].body+"<br><br><a class=\"btn btn-default btn-block button-bg\" href=\"/bt->permalink\" role=\"button\">Continue Reading</a></div>"
            $(blogcode).appendTo('#blogdeck');
          }
          if (posts.prev == 0) {
            $(".previous").addClass("disabled");
          } else {
            $(".previous").removeClass("disabled");
          }

          if (posts.next == 0) {
            $(".next").addClass("disabled");
          } else {
            $(".next").removeClass("disabled");
          }

          $(".previous").attr('data-page') = posts.page;
          $(".next").attr('data-page') = posts.page;
        }
      });
    }
  });

    $(".previous").on("click", function(event) {
      event.preventDefault();

      var id = $(this).attr('data-id');
      var page = $(this).attr('data-page');
      console.log(id);

      if(!$(this).hasClass( "disabled" )) {
        console.log("not disabled");
        $.ajax({
          type:"POST",
          url:"/blogdeck/"+page+"/"+id+"/prev",
          data: $(this).serialize()
        })

        .done(function(response) {
          console.log("done");
          var posts = JSON.parse(response);
          if (posts) {
            console.log(posts);
            for (var i = 0; i < posts.length; i++) {
              var blogcode = "<div class=\"panel-heading side-posts-heading\"><strong>blog #" + posts[i].id +"</strong>: " + posts[i].title +"</div><div class=\"panel-body side-posts\">"+posts[i].body+"<br><br><a class=\"btn btn-default btn-block button-bg\" href=\"/bt->permalink\" role=\"button\">Continue Reading</a></div>"
              $(blogcode).appendTo('#blogdeck');
            }
            if (posts.prev == 0) {
              $(".previous").addClass("disabled");
            } else {
              $(".previous").removeClass("disabled");
            }

            if (posts.next == 0) {
              $(".next").addClass("disabled");
            } else {
              $(".next").removeClass("disabled");
            }

            $(".previous").attr('data-page',posts.page);
            $(".next").attr('data-page',posts.page);
          }
      });
    }
  });

});
