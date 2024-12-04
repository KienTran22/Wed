<!-- views/employees/index.php -->
<div class="container">
    <a href="index.php?action=create" class="btn btn-primary mt-4">Add New Employee</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($employee = $employees->fetch_assoc()): ?>
                <tr>
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['phone'] ?></td>
                    <td><?= $employee['address'] ?></td>
                    <td><?= $employee['created_at'] ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $employee['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?action=delete&id=<?= $employee['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
