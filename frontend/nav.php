<div class="col-md-2 sidebar">

<h5 class="text-center mb-4">
<i class="bi bi-mortarboard-fill"></i> Enrollment
</h5>

<a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
<a href="settings.php"><i class="bi bi-gear"></i> Settings</a>

<div class="submenu">
<a href="user.php"><i class="bi bi-person"></i> User</a>
<a href="role.php"><i class="bi bi-person-badge"></i> Role</a>
<a href="course.php"><i class="bi bi-journal-bookmark"></i> Course</a>
<a href="campus.php"><i class="bi bi-building"></i> Campus</a>
<a href="students.php"><i class="bi bi-people"></i> Students</a>
</div>

<a href="enrollment.php"><i class="bi bi-pencil-square"></i> Enrollment</a>

<div class="submenu">
<a href="enrollment.php"><i class="bi bi-card-checklist"></i> Enrollment List</a>
</div>

<hr>
<a href="#" onclick="event.preventDefault(); Swal.fire({
    title: 'Are you sure?',
    text: 'You will be logged out.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, logout',
    cancelButtonText: 'Cancel'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href='logout.php';
    }
});">
<i class="bi bi-box-arrow-right"></i> Logout
</a>

</div>
