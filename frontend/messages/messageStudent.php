<?php if(isset($_GET['savedData'])): ?>
<script>
Swal.fire({icon:'success',title:'Saved!',text:'Student has been saved.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>

<?php if(isset($_GET['allready']) || isset($_GET['duplicate'])): ?>
<script>
Swal.fire({icon:'error',title:'Duplicate Data',text:'Student already exists.'}).then(() => {
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
Swal.fire({icon:'success',title:'Updated!',text:'Student has been updated.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>

<?php if(isset($_GET['deleted'])): ?>
<script>
Swal.fire({icon:'success',title:'Deleted!',text:'Student has been deleted.'}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>
