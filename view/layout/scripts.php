<script type="text/javascript" src="/modules/lightbox/scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/modules/lightbox/scripts/jquery.lightbox.js"></script>

<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>

<script src="/js/bundle.min.js"></script>
<script src="/js/scripts.js"></script>
<script>

    $(function($){


        $("#search").keypress(function(e){
            if(e.keyCode==13){
                $("#submit").click();
            }
        });

    });
</script>