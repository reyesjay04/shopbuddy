
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Customer Accounts
                        </h1>
                            <p class="bg-success">
                            <?php display_message(); ?>
                
                            </p>
                        <div class="col-md-12">
                            <table id="reports_id" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  display_users();?> 
                                </tbody>
                            </table>
                        <h1 class="page-header">
                            Supplier Accounts
                        </h1>
                            <table id="reports_id" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  display_supplier();?> 
                                </tbody>
                            </table>
                            
                            <script>
                            $(document).ready(function() {
                                $("[id*='reports_id']").DataTable();
                            });
                            </script>      
                        </div>
                    </div>
    