<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#display").click(function() {
            $.ajax({
                type: 'GET',
                url: 'cache_film.php',
                dataType: "html",
                success: function(response) {
                    $('#cachepath').show();
                    $('#cachepath').html(response + '/movies-cache');
                }
            });
            $.ajax({
                type: 'GET',
                url: 'cache_sitemap.php',
                dataType: "html",
                success: function(response) {
                    $('#sitemappath').show();
                    $('#sitemappath').html(response + '/sitemap-cache');
                }
            });
            $.ajax({
                type: 'GET',
                url: 'cache_trailer.php',
                dataType: "html",
                success: function(response) {
                    $('#trailerpath').show();
                    $('#trailerpath').html(response + '/trailer-cache');
                }
            });
        });
    });
</script>