<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
    <title>Student</title>
</head>

<body>

    <h1 class="display-1 text-center">
        Student Management
    </h1>
    <div class="container col-lg-3 p-3 border border-">
        <label for="">Name</label>
        <input id="name" type="text" placeholder="Enter your name..." class="form-control">
        <label for="">Email</label>
        <input id="email" type="email" placeholder="Enter your Email..." class="form-control">
        <label for="">Age</label>
        <input id="age" type="number" placeholder="Enter your age..." class="form-control">
        <button class="btn btn-success my-3 w-100">
            Add Record
        </button>
    </div>
    <input class="form-control w-25 my-4 mx-auto search" type="search" name="Search" id="search"
        placeholder="Search...">
    <table class="table text-capitalize">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>email</th>
                <th>age</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-data">

        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    function generateTable() {
        $.ajax({
            url: './read.php',
            type: 'GET',
            data: {},
            success: function(data) {
                $('.table-data').html(data)
            },

        })
    }
    generateTable();

    $('.btn').click(function() {
        let name = $('#name').val();
        let email = $('#email').val();
        let age = $('#age').val();
        // console.log(name, email, age)
        $.ajax({
            url: './add.php',
            type: 'POST',
            data: {
                myName: name,
                myEmail: email,
                myAge: age
            },
            success: function(data) {
                if (data == 'success') {
                    generateTable();
                } else {
                    alert(data);
                }
            }
        })
    })

    $('.search').on('keyup', function() {
        $.ajax({
            url: './search.php',
            type: 'POST',
            data: {
                search: $(this).val()
            },
            success: function(data) {
                if (data) {
                    $('.table-data').html(data)
                } else {
                    alert(data)
                }
            }
        })
    })

    $(document).on('click', '.delete', function() {
        let id = $(this).val();
        let row = $(this).closest('tr');
        $.ajax({
            url: './delete.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                if (data == 'success') {
                    row.fadeOut();
                } else {
                    alert(Data)
                }
            }
        })
    })
    </script>


</body>

</html>