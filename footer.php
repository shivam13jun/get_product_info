<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="./zoom/magnify.js"></script>
<script type="text/javascript" src="custom.js"></script>
   <script src="https://cdn.tiny.cloud/1/gt0vg5mry3wka7iomq8j2wqqushqy20cede8omrl4cvpxab5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '.myeditablediv',
        inline: true,
        menubar: false
    });
    </script>
<script>
tinymce.init({
    selector: 'textarea#tiny'
});
tinymce.init({
    selector: 'textarea#tin'
});

// Prevent Bootstrap dialog from blocking focusin
document.addEventListener('focusin', (e) => {
    if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
        e.stopImmediatePropagation();
    }
});
</script>

</body>
</html>