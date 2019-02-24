

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Groups</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          
          <?php if(in_array('createGroup', $user_permission)): ?>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Group</button>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Groups</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Group name</th>
                  <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php if(in_array('createStore', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Group</h4>
      </div>

      <form role="form" action="<?php echo base_url('groups/create') ?>" method="post" id="createForm">

        <div class="modal-body">
          <div class="form-group">
            <label for="group_name">Group Name</label>
            <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="permission">Permission</label>

            <table class="table table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th>Create</th>
                  <th>Update</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Users</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                </tr>
                <tr>
                  <td>Groups</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"></td>
                </tr>
                <tr>
                  <td>Stores</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createStore"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateStore"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewStore"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteStore"></td>
                </tr>
                <tr>
                  <td>Tables</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createTable"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateTable"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewTable"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteTable"></td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createCategory"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory"></td>
                </tr>
                <tr>
                  <td>Product</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct"></td>
                </tr>
                <tr>
                  <td>Orders</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder"></td>
                </tr>
                <tr>
                  <td>Report</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewReport"></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Company</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Profile</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Setting</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateStore', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Group</h4>
      </div>

      <form role="form" action="<?php echo base_url('groups/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div class="form-group">
            <label for="group_name">Group Name</label>
            <input type="text" class="form-control" id="edit_store_name" name="group_name" placeholder="Enter group name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="permission">Permission</label>
            
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th>Create</th>
                  <th>Update</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Users</td>
                  <td><input type="checkbox" name="permission[]" id="createUser" value="createUser" ></td>
                  <td><input type="checkbox" name="permission[]" id="updateUser" value="updateUser"></td>
                  <td><input type="checkbox" name="permission[]" id="viewUser" value="viewUser"></td>
                  <td><input type="checkbox" name="permission[]" id="deleteUser" value="deleteUser"></td>
                </tr>
                <tr>
                  <td>Groups</td>
                  <td><input type="checkbox" name="permission[]" id="createGroup" value="createGroup" ></td>
                  <td><input type="checkbox" name="permission[]" id="updateGroup" value="updateGroup"></td>
                  <td><input type="checkbox" name="permission[]" id="viewGroup" value="viewGroup" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteGroup" value="deleteGroup" ></td>
                </tr>
                <tr>
                  <td>Stores</td>
                  <td><input type="checkbox" name="permission[]" id="createStore" value="createStore" ></td>
                  <td><input type="checkbox" name="permission[]" id="updateStore" value="updateStore" ></td>
                  <td><input type="checkbox" name="permission[]" id="viewStore" value="viewStore" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteStore" value="deleteStore" ></td>
                </tr>
                <tr>
                  <td>Tables</td>
                  <td><input type="checkbox" name="permission[]" id="createTable" value="createTable" ></td>
                  <td><input type="checkbox" name="permission[]" id="updateTable" value="updateTable"></td>
                  <td><input type="checkbox" name="permission[]" id="viewTable" value="viewTable" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteTable" value="deleteTable"></td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td><input type="checkbox" name="permission[]" id="createCategory" value="createCategory" ></td>
                  <td><input type="checkbox" name="permission[]" id="updateCategory" value="updateCategory" ></td>
                  <td><input type="checkbox" name="permission[]" id="viewCategory" value="viewCategory" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteCategory" value="deleteCategory" ></td>
                </tr>
                <tr>
                  <td>Product</td>
                  <td><input type="checkbox" name="permission[]" id="createProduct" value="createProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="updateProduct" value="updateProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="viewProduct" value="viewProduct" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteProduct" value="deleteProduct" ></td>
                </tr>
                <tr>
                  <td>Orders</td>
                  <td><input type="checkbox" name="permission[]" id="createOrder" value="createOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="updateOrder" value="updateOrder" ></td>
                  <td><input type="checkbox" name="permission[]" id="viewOrder" value="viewOrder" ></td>
                  <td><input type="checkbox" name="permission[]" id="deleteOrder" value="deleteOrder" ></td>
                </tr>
                <tr>
                  <td>Report</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="viewReport" value="viewReport" ></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Company</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="updateCompany" value="updateCompany" ></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Profile</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="viewProfile" value="viewProfile" ></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Setting</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="updateSetting" value="updateSetting" ></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
              </tbody>
            </table>
            
          </div>

        </div><!--modal body -->

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteStore', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Store</h4>
      </div>

      <form role="form" action="<?php echo base_url('groups/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>



<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";


$(document).ready(function() {
  $('#groupMainNav').addClass('active');
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'groups/fetchGroupData',
    'order': [],
    responsive: true,
  });

  // submit the create from 
  $("#createForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addModal").modal('hide');

          // reset the form
          $("#createForm")[0].reset();
          $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });

});

// edit function
function editFunc(id)
{ 
  $.ajax({
    url: base_url + 'groups/fetchGroupsDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {
      
      // console.log(response.permission);

      $("#edit_store_name").val(response.group_name);

      // Users
      if($.inArray( 'createUser', response.permission) !== -1){
        $("#createUser").prop("checked", true);
      }
      if($.inArray( 'updateUser', response.permission) !== -1){
        $("#updateUser").prop("checked", true);
      }
      if($.inArray( 'viewUser', response.permission) !== -1){
        $("#viewUser").prop("checked", true);
      }
      if($.inArray( 'deleteUser', response.permission) !== -1){
        $("#deleteUser").prop("checked", true);
      }
      // Groups
      if($.inArray( 'createGroup', response.permission) !== -1){
        $("#createGroup").prop("checked", true);
      }
      if($.inArray( 'updateGroup', response.permission) !== -1){
        $("#updateGroup").prop("checked", true);
      }
      if($.inArray( 'viewGroup', response.permission) !== -1){
        $("#viewGroup").prop("checked", true);
      }
      if($.inArray( 'deleteGroup', response.permission) !== -1){
        $("#deleteGroup").prop("checked", true);
      }
      // Stores
      if($.inArray( 'createStore', response.permission) !== -1){
        $("#createStore").prop("checked", true);
      }
      if($.inArray( 'updateStore', response.permission) !== -1){
        $("#updateStore").prop("checked", true);
      }
      if($.inArray( 'viewStore', response.permission) !== -1){
        $("#viewStore").prop("checked", true);
      }
      if($.inArray( 'deleteStore', response.permission) !== -1){
        $("#deleteStore").prop("checked", true);
      }
      // Tables
      if($.inArray( 'createTable', response.permission) !== -1){
        $("#createTable").prop("checked", true);
      }
      if($.inArray( 'updateTable', response.permission) !== -1){
        $("#updateTable").prop("checked", true);
      }
      if($.inArray( 'viewTable', response.permission) !== -1){
        $("#viewTable").prop("checked", true);
      }
      if($.inArray( 'deleteTable', response.permission) !== -1){
        $("#deleteTable").prop("checked", true);
      }
      // Category
      if($.inArray( 'createCategory', response.permission) !== -1){
        $("#createCategory").prop("checked", true);
      }
      if($.inArray( 'updateCategory', response.permission) !== -1){
        $("#updateCategory").prop("checked", true);
      }
      if($.inArray( 'viewCategory', response.permission) !== -1){
        $("#viewCategory").prop("checked", true);
      }
      if($.inArray( 'deleteCategory', response.permission) !== -1){
        $("#deleteCategory").prop("checked", true);
      }
      // Product
      if($.inArray( 'createProduct', response.permission) !== -1){
        $("#createProduct").prop("checked", true);
      }
      if($.inArray( 'updateProduct', response.permission) !== -1){
        $("#updateProduct").prop("checked", true);
      }
      if($.inArray( 'viewProduct', response.permission) !== -1){
        $("#viewProduct").prop("checked", true);
      }
      if($.inArray( 'deleteProduct', response.permission) !== -1){
        $("#deleteProduct").prop("checked", true);
      }
      // Orders
      if($.inArray( 'createOrder', response.permission) !== -1){
        $("#createOrder").prop("checked", true);
      }
      if($.inArray( 'updateOrder', response.permission) !== -1){
        $("#updateOrder").prop("checked", true);
      }
      if($.inArray( 'viewOrder', response.permission) !== -1){
        $("#viewOrder").prop("checked", true);
      }
      if($.inArray( 'deleteOrder', response.permission) !== -1){
        $("#deleteOrder").prop("checked", true);
      }
      // Report
      if($.inArray( 'viewReport', response.permission) !== -1){
        $("#viewReport").prop("checked", true);
      }
      // Company
      if($.inArray( 'updateCompany', response.permission) !== -1){
        $("#updateCompany").prop("checked", true);
      }
      // Profile
      if($.inArray( 'viewProfile', response.permission) !== -1){
        $("#viewProfile").prop("checked", true);
      }
      // Setting
      if($.inArray( 'updateSetting', response.permission) !== -1){
        $("#updateSetting").prop("checked", true);
      }

      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');

              console.log('Worked');
              // hide the modal
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);
                  console.log('Not Worked');
                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                console.log('Another Worked');
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { group_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 
          // hide the modal
            $("#removeModal").modal('hide');

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>