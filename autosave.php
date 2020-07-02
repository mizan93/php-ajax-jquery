<?php include 'inc/header.php'; ?>

<div class="container">
    <br />
    <h2 align="center">Auto Save Data using Ajax, Jquery, PHP and Mysql</h2>

    <br />
    <div class="form-group">
        <label>Enter Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control" />
    </div>
    <div class="form-group">
        <label>Enter Post Description</label>
        <textarea name="post_description" id="post_description" rows="6" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="button" name="publish" class="btn btn-info">Publish</button>
    </div>
    <div class="form-group">
        <input type="hidden" name="post_id" id="post_id" />
        <div id="autoSave"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function autoSave() {
            var post_title = $('#post_title').val();
            var post_description = $('#post_description').val();
            var post_id = $('#post_id').val();
            if (post_title != '' && post_description != '') {
                $.ajax({
                    url: "check/chkautosave.php",
                    method: "POST",
                    data: {
                        postTitle: post_title,
                        postDescription: post_description,
                        postId: post_id
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data != '') {
                            $('#post_id').val(data);
                        }
                        $('#autoSave').text("Post save as draft");
                        setInterval(function() {
                            $('#autoSave').text('');
                        }, 5000);
                    }
                });
            }
        }
        setInterval(function() {
            autoSave();
        }, 10000);
    });
</script>

<?php include 'inc/footer.php'; ?>