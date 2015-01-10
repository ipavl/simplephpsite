<!-- Bootstrap core JavaScript -->
<script src="js/jquery.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script>window.jQuery || document.write('<script src="js/bootstrap.js"><\/script>')</script>

<!-- Non-Bootstrap -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-ui.min.1.10.3.js"><\/script>')</script>

<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script>
    $(function() {
        $( "#accordion" ).accordion({
            heightStyle: "content"
        });
    });

    $(document).ready(function() {
        $(".fancybox").fancybox({
            beforeShow : function() {
                var alt = this.element.find('img').attr('alt');

                this.inner.find('img').attr('alt', alt);

                this.title = alt;
            }
        });
    });

    $(".fancybox").fancybox();
</script>