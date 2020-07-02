$(document).ready(function () {
//check username availabllity
    $('#username').blur(function () {
        var username = $(this).val();
        $.ajax({
            type: "POST",
            url: "check/checkuser.php",
            data: { username: username },
            dataType: "text",
            success: function (data) {
                $('#userstatus').html(data);
            }
        });
    });
//check textbox autocomplete availabllity
    $('#skill').keyup(function () {
        var skill = $(this).val();
        if (skill!='') {
        $.ajax({
           
            url: "check/checkskill.php",
            method: "POST",
            data: { skill: skill },
            success: function (data) {
                $('#skillstatus').html(data);
            }
        });
    }
    });

});  