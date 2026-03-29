<?php if(isset($_GET['savedData'])): ?>
<script>
Swal.fire({icon:'success',title:'Saved!',text:'Settings have been saved.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>

<?php if(isset($_GET['nothingChanged'])): ?>
<script>
Swal.fire({icon:'info',title:'No Changes',text:'No changes detected.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>

<?php if(isset($_GET['updated'])): ?>
<script>
Swal.fire({icon:'success',title:'Updated!',text:'Settings have been updated.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>
