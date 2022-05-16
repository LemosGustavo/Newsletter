<section>
    <div class="s-featured">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <label>Titulo</label>
                <input placeholder="Post title" type="text" name="title">
                <label>Intro</label>
                <input placeholder="Post intro" type="text" name="intro">
                <label>Contenido</label>
                <textarea id="summernote" placeholder="Post Content" name="content"></textarea>
                <label>Categoria</label>
                <select name="category">
                    <?php
                    foreach ($categories as $c) {
                        echo "<option value='" . $c['id'] . "'>" . $c['name'] . "</option>";
                    }
                    ?>
                </select>
                <label>Tags</label>
                <input placeholder="Tags" type="text" name="tags">
                <input type="file" name="banner" required>
                <input type="submit" name="" value="Send">
            </form>
        </div>
    </div>
</section>
<script type="text/JavaScript">
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>