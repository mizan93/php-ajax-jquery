<?php include 'inc/header.php'; ?>
<h2>Topics: Check Textbox</h2>
<div class="content">
    <div id="userstatus"></div>
    <style>
        .skill {
            margin-left: 60px;
            padding: 6x 30px;
            width: 250px;
        }

        .skill ul {
            margin: 0;
            list-style: none;
        }

        .skill ul li {
            cursor: pointer;
        }
    </style>
    <form method="post">
        <table>
            <tr>
                <td>Skill</td>
                <td>:</td>
                <td>
                    <input type="text" name="skill" id="skill" class="form-control" placeholder="Enter skill"></td>
            </tr>
        </table>
        <div id="skillstatus"></div>
    </form>
    <script>
        $(document).ready(function() {
            $('#skill').keyup(function() {
                var skill = $(this).val();
                if (skill != '') {
                    $.ajax({

                        url: "check/checkskill.php",
                        method: "POST",
                        data: {
                            skill: skill
                        },
                        success: function(data) {
                            $('#skillstatus').fadeIn();
                            $('#skillstatus').html(data);
                        }
                    });
                }
            });
            $(document).on('click', 'li', function() {
                $('#skill').val($(this).text());
                $('#skillstatus').fadeOut();

            });
        });
    </script>
</div>
<?php include 'inc/footer.php'; ?>