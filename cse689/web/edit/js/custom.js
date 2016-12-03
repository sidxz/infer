    function submitTryit(){
        var text = editor.getValue();
        var ifr = document.createElement("iframe");
        ifr.setAttribute("frameborder", "0");
        ifr.setAttribute("id", "iframeOutput");  
        document.getElementById("iframewrapper").innerHTML = "";
        document.getElementById("iframewrapper").appendChild(ifr);
        var ifrw = (ifr.contentWindow) ? ifr.contentWindow : (ifr.contentDocument.document) ? ifr.contentDocument.document : ifr.contentDocument;
        ifrw.document.open();
        ifrw.document.write(text);
        ifrw.document.close();
    };

      $( document ).ready(function() {
        var lastPosition = null;
        resizeWindow();
        $( window ).resize(function() {
          resizeWindow()
      });

      function calculatepercent(position) {
        var a = position;
        var b = $("body").width();
        var c = $("body").width() - position;

        $('div.main-left').width((returnPerCalc(a,b) + .4) + '%');
        $('div.main-right').width((returnPerCalc(c,b) - .5) + '%');
      };

      function returnPerCalc(a,b){
        var c = a/b;
        var d = c*100;
        return d;
      };

      $( "#draggable" ).draggable({ 
        axis: "x",
        start: function(a) {
          calculatepercent(a.target.offsetLeft);
        },
        drag: function(b) {
          calculatepercent(b.target.offsetLeft);
        },
        stop: function(c) {
          calculatepercent(c.target.offsetLeft);
          lastPosition = c.target.offsetLeft;
        }
      });

      function resizeWindow(){
        $("#mainContent").height($("body").height() - $(".header").height());
          $("#mainContentHolder,.left-inner-main,.right-inner-main,#draggable").height($("body").height() - ($(".header").height() + 10));

          // Convert the width from px to %
          var percent = $("div.main-left").width() / $("body").width() * 100;

          // Get the left postion of drag bar div incase window resized
          var position = (lastPosition != null)?((percent * $("body").width())/100):(($("body").width()/2));

          $("#draggable").css({
           'left' : position-5
        });
      };
    });