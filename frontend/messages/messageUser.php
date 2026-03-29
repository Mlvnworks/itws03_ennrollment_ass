
<?php if(isset($_GET['savedData'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Saved!',
    text: 'Data has been saved successfully.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>


<?php if(isset($_GET['allready'])): ?>
<script>
Swal.fire({
      icon:'error',
    title:'Duplicate Data',
    text:'This data already exists in the database.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>



<?php if(isset($_GET['nothingChanged'])): ?>
<script>    
Swal.fire({
    icon: 'info',
    title: 'No Changes Detected',
    text: 'You did not make any changes to update.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>

<?php if(isset($_GET['duplicateFullname'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Duplicate Data',
    text: 'Another user with the same full name already exists.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);      
});
</script>
<?php endif; ?>


<?php if(isset($_GET['duplicateUsername'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Duplicate Data',
    text: 'Another user with the same username already exists.'
}).then(() => {         
    window.history.replaceState({}, document.title, window.location.pathname);      
});
</script>
<?php endif; ?>



<?php if(isset($_GET['duplicateEmail'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Duplicate Data',
    text: 'Another user with the same email already exists.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);      
});
</script>
<?php endif; ?>



<?php if(isset($_GET['updated'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Updated!',
    text: 'Data has been updated successfully.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>


<?php if(isset($_GET['deleted'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'User Deleted',
    text: 'The user has been deleted successfully.'
}).then(() => {
    window.history.replaceState({}, document.title, window.location.pathname);
});
</script>
<?php endif; ?>
