<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Custom DataTbale With PHP Mysql Database and Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css" />
    <style>
        td.dataTables_empty {
        color: #f00;
        } 
     </style>
</head>

<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <h1 style="text-align:center;">Custom DataTbale With PHP Mysql Database and Ajax</h1><br>

            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">View User</div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="users">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js">
    </script>

    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            var dataTable = $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "data.php",
                    type: "post",
                    error: function() {
                        $("#users").append(
                            '<tbody class="alert alert-danger"><tr><td colspan="3">Data not found.</td></tr></tbody>'
                        );
                        $("#users").css("display", "none");

                    }
                }
            });
        });
    </script>

</body>

</html>;