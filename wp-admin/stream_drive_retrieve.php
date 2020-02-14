<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#display").click(function() {
            var val1 = $('#driveid').val();
            var val2 = $('#poster').val();
            var val3 = $('#subtitle').val();
            $.ajax({
                type: 'POST',
                url: 'stream_drive_process.php',
                data: {
                    driveid: val1,
                    poster: val2,
                    subtitle: val3
                },
                success: function(response) {
                    $('#link_source').html(response);
                }
            });
            $.ajax({
                type: "POST",
                url: "stream_drive_display.php",
                data: {
                    driveid: val1,
                    poster: val2,
                    subtitle: val3
                },
                success: function(response) {
                    $("#link").html(response);
                }
            });
            $.ajax({
                type: "POST",
                url: "stream_drive_preview.php",
                data: {
                    driveid: val1,
                    poster: val2,
                    subtitle: val3
                },
                success: function(response) {
                    $("#preview").html(response);
                }
            });
        });
    });
</script>