<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Issue Management</h2>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Add Issue</button>
        </div>
        <table class="table table-bordered" id="issueTable">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Mã vấn đề</th>
                    <th>Tên máy tính</th>
                    <th>Tên phiên bản</th>
                    <th>Người báo cáo sự cố</th>
                 	<th>Thời gian báo cáo</th>
                    <th>Mức độ sự cố</th>
                    <th>Trạng thái hiện tại</th>
            </thead>
            <tbody>
                <!-- Example rows will be added here -->
            </tbody>
        </table>
        <div class="d-flex">
            <button class="btn btn-danger mr-2" id="deleteSelected">Delete Selected</button>
            <button class="btn btn-info" id="updateStatus">Update Status</button>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Issue</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Issue ID</label>
                            <input type="text" id="issueId" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Computer Name</label>
                            <input type="text" id="computerName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Version Name</label>
                            <input type="text" id="versionName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Reporter</label>
                            <input type="text" id="reporter" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Report Time</label>
                            <input type="datetime-local" id="reportTime" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Severity</label>
                            <select id="severity" class="form-control" required>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" id="status" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Issue</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editRowIndex">
                        <div class="form-group">
                            <label>Issue ID</label>
                            <input type="text" id="editIssueId" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Computer Name</label>
                            <input type="text" id="editComputerName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Version Name</label>
                            <input type="text" id="editVersionName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Reporter</label>
                            <input type="text" id="editReporter" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Report Time</label>
                            <input type="datetime-local" id="editReportTime" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Severity</label>
                            <select id="editSeverity" class="form-control" required>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" id="editStatus" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Example issues data
            const issues = [
                { id: "1", computerName: "PC1", versionName: "v1.0", reporter: "Alice", reportTime: "2024-12-16T10:00", severity: "High", status: "Open" },
                { id: "2", computerName: "PC2", versionName: "v2.1", reporter: "Bob", reportTime: "2024-12-15T09:30", severity: "Medium", status: "In Progress" },
                { id: "3", computerName: "PC3", versionName: "v3.0", reporter: "Charlie", reportTime: "2024-12-14T11:15", severity: "Low", status: "Closed" },
                { id: "4", computerName: "PC4", versionName: "v4.2", reporter: "Dave", reportTime: "2024-12-13T14:45", severity: "High", status: "Open" },
                { id: "5", computerName: "PC5", versionName: "v1.2", reporter: "Eve", reportTime: "2024-12-12T08:20", severity: "Medium", status: "In Progress" }
            ];

            // Add example rows to the table
            issues.forEach(issue => {
                const row = `
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>${issue.id}</td>
                        <td>${issue.computerName}</td>
                        <td>${issue.versionName}</td>
                        <td>${issue.reporter}</td>
                        <td>${issue.reportTime}</td>
                        <td>${issue.severity}</td>
                        <td>${issue.status}</td>
                        <td>
                            <a href="#" class="edit" data-toggle="modal" data-target="#editEmployeeModal">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>`;
                $("#issueTable tbody").append(row);
            });

            // Select/Deselect all checkboxes
            $("#selectAll").click(function () {
                $("input[type='checkbox']").prop('checked', this.checked);
            });

            // Add new issue
            $("#addForm").submit(function (e) {
                e.preventDefault();
                const id = $("#issueId").val();
                const computerName = $("#computerName").val();
                const versionName = $("#versionName").val();
                const reporter = $("#reporter").val();
                const reportTime = $("#reportTime").val();
                const severity = $("#severity").val();
                const status = $("#status").val();

                const newRow = `
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>${id}</td>
                        <td>${computerName}</td>
                        <td>${versionName}</td>
                        <td>${reporter}</td>
                        <td>${reportTime}</td>
                        <td>${severity}</td>
                        <td>${status}</td>
                        <td>
                            <a href="#" class="edit" data-toggle="modal" data-target="#editEmployeeModal">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>`;
                $("#issueTable tbody").append(newRow);
                $("#addEmployeeModal").modal('hide');
                $("#addForm")[0].reset();
            });

            // Delete selected issues
            $("#deleteSelected").click(function () {
                $("#issueTable tbody input[type='checkbox']:checked").each(function () {
                    $(this).closest('tr').remove();
                });
            });

            // Edit issue
            $("#issueTable").on("click", ".edit", function () {
                const row = $(this).closest("tr");
                const rowIndex = row.index();

                // Get data from the selected row
                const id = row.find("td:nth-child(2)").text();
                const computerName = row.find("td:nth-child(3)").text();
                const versionName = row.find("td:nth-child(4)").text();
                const reporter = row.find("td:nth-child(5)").text();
                const reportTime = row.find("td:nth-child(6)").text();
                const severity = row.find("td:nth-child(7)").text();
                const status = row.find("td:nth-child(8)").text();

                // Populate the modal fields
                $("#editRowIndex").val(rowIndex);
                $("#editIssueId").val(id);
                $("#editComputerName").val(computerName);
                $("#editVersionName").val(versionName);
                $("#editReporter").val(reporter);
                $("#editReportTime").val(reportTime);
                $("#editSeverity").val(severity);
                $("#editStatus").val(status);
            });

            // Save edited issue
            $("#editForm").submit(function (e) {
                e.preventDefault();
                const rowIndex = $("#editRowIndex").val();
                const row = $("#issueTable tbody tr").eq(rowIndex);

                // Get updated data
                const id = $("#editIssueId").val();
                const computerName = $("#editComputerName").val();
                const versionName = $("#editVersionName").val();
                const reporter = $("#editReporter").val();
                const reportTime = $("#editReportTime").val();
                const severity = $("#editSeverity").val();
                const status = $("#editStatus").val();

                // Update the selected row
                row.find("td:nth-child(2)").text(id);
                row.find("td:nth-child(3)").text(computerName);
                row.find("td:nth-child(4)").text(versionName);
                row.find("td:nth-child(5)").text(reporter);
                row.find("td:nth-child(6)").text(reportTime);
                row.find("td:nth-child(7)").text(severity);
                row.find("td:nth-child(8)").text(status);

                $("#editEmployeeModal").modal("hide");
            });

            // Update status of selected issues
            $("#updateStatus").click(function () {
                const newStatus = prompt("Enter the new status for selected issues:", "Resolved");
                if (newStatus) {
                    $("#issueTable tbody input[type='checkbox']:checked").each(function () {
                        const row = $(this).closest("tr");
                        row.find("td:nth-child(8)").text(newStatus);
                    });
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\Cong Nghe Wed\BTTH\BTTH04\resources\views/welcome.blade.php ENDPATH**/ ?>