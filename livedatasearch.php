<?php include 'inc/header.php'; ?>
<h2>Topics:Live data seatch</h2>
<div class="content">

    <div class="topics">
        <form method="post">
            <table>
                <tr>
                    <td>type to search</td>
                    <td><input type="text" name="livesearch" id="livesearch" placeholder="Username"></td>
                </tr>

            </table>
            <div id="statussearch"> </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#livesearch').keyup(function(event) {
            var livesearch = $("#livesearch").val();
            if ($.trim(livesearch) != '') {
                $.ajax({
                    type: "post",
                    url: "check/chklivesearch.php",
                    data: {
                        livesearch: livesearch
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#statussearch").html(data);
                    }
                });

            } else {
                $("#statussearch").html('');
            }

        });
        // setInterval(function() {
        //     $('#autostatus').load("check/getrefresh.php").fadeIn('slow'), 1000
        // });
    });
</script>
<?php include 'inc/footer.php'; ?>