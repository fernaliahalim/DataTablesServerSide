<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employees
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="employee_data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Employee No</th>
                        <th>Birth Date</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Hire Date</th>
                    </tr>
                    </thead>
                </table>
            </div><!-- /.box-body -->
        </div>
    </section>
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function(){
        var dataTable = $('#employee_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"<?= base_url(); ?>/employee/fetch_employee_data",
                type:"POST"
            },
            "columnDefs":[
                {
                    "target":[0,3,4],
                    "orderable":false
                }
            ]
        });
    });
</script>