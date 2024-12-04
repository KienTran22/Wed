<!-- views/employees/create.php -->
<div class="container">
    <h2>Add New Employee</h2>
    <form method="POST" action="index.php?action=create">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>