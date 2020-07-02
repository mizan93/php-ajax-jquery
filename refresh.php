<?php include 'inc/header.php'; ?>
<h2>Topics: Refresh div content</h2>
<div class="content">
    <style>
        .data {
            margin-left: 60px;
            padding: 6x 30px;
          
        }

        .data ul {
            margin: 0;
            list-style: none;
        }

        .data ul li {
            cursor: pointer;
        }
    </style>
    <div class="topics">
        <form method="post">
            <table>
                <tr>
                    <td>Content</td>
                    <td><textarea name="body" id="body"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="autosubmit " id="autosubmit" value="Post"></td>
                </tr>
            </table>
            <div id="autostatus"> </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#autosubmit').click(function(event) {
            var body = $("#body").val();
            if ($.trim(body) != '') {
                $.ajax({
                    type: "post",
                    url: "check/checkrefresh.php",
                    data: {
                        body: body
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#body").val('');
                    }
                });
                return false;
            }

        });
        setInterval(function() {
            $('#autostatus').load("check/getrefresh.php").fadeIn('slow') ,1000
        });
    });
</script>
<?php include 'inc/footer.php'; ?>