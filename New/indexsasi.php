<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php include 'navbar.php'?> 

<!-- Button trigger modal -->
<div class="container">

    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
        ADD CLASS
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- Increased modal width using modal-xl for larger screens -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="className">Class Name:</label>
                        <input type="text" class="form-control" id="className" placeholder="Enter class name">
                    </div>
                    
                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Hours Required</th>
                                <th>Lab</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="subjectCode[]" maxlength="8"></td>
                                <td><input type="text" class="form-control" name="subjectName[]" maxlength="20"></td>
                                <td><input type="text" class="form-control" name="hoursRequired[]"></td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="lab[]" value="no" checked> No
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="lab[]" value="1"> 1
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="lab[]" value="2"> 2
                                    </div>
                                </td>
                                <td><button class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <!-- Add Row Button -->
                    <button class="btn btn-success float-right" onclick="addRow()">Add Row</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create Class</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    // Function to add a new row to the table
    function addRow() {
        var newRow = '<tr>' +
                        '<td><input type="text" class="form-control" name="subjectCode[]" maxlength="8"></td>' +
                        '<td><input type="text" class="form-control" name="subjectName[]" maxlength="20"></td>' +
                        '<td><input type="text" class="form-control" name="hoursRequired[]"></td>' +
                        '<td>' +
                            '<div class="form-check form-check-inline">' +
                                '<input type="radio" class="form-check-input" name="lab[]" value="no" checked> No' +
                            '</div>' +
                            '<div class="form-check form-check-inline">' +
                                '<input type="radio" class="form-check-input" name="lab[]" value="1"> 1' +
                            '</div>' +
                            '<div class="form-check form-check-inline">' +
                                '<input type="radio" class="form-check-input" name="lab[]" value="2"> 2' +
                            '</div>' +
                        '</td>' +
                        '<td><button class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                    '</tr>';
        document.querySelector('#exampleModal table tbody').insertAdjacentHTML('beforeend', newRow);
    }

    // Function to delete a row
    function deleteRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

</body>
</html>
