

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>

          <?php if (in_array('createStore', $user_permission)): ?>
            <button class="btn btn-primary" id="addUser" data-toggle="modal" data-target="#addModal">Add User</button>
            <br /> <br />
          <?php endif;?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>
                  <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif;?>
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

<?php if (in_array('createUser', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add User</h4>
      </div>

      <form role="form" action="<?php echo base_url('users/create') ?>" method="post" id="createForm">

        <div class="modal-body">
            <div class="form-group">
              <label for="groups">Groups</label>
              <select class="form-control" id="groups" name="groups">

              </select>
            </div>

            <div class="form-group">
              <label for="groups">Store</label>
              <select class="form-control" id="store" name="store">
              </select>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="cpassword">Confirm password</label>
              <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="fname">First name</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="lname">Last name</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="gender">Gender</label>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" id="male" value="1">
                  Male
                </label>
                <label>
                  <input type="radio" name="gender" id="female" value="2">
                  Female
                </label>
              </div>
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
<?php endif;?>

<?php if (in_array('updateStore', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Store</h4>
      </div>

      <form role="form" action="<?php echo base_url('users/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div class="form-group">
              <label for="groups">Groups</label>
              <select class="form-control" id="egroups" name="groups">

              </select>
            </div>

            <div class="form-group">
              <label for="groups">Store</label>
              <select class="form-control" id="estore" name="store">
              </select>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="eusername" name="username" placeholder="Username" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="eemail" name="email" placeholder="Email" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="fname">First name</label>
              <input type="text" class="form-control" id="efname" name="fname" placeholder="First name" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="lname">Last name</label>
              <input type="text" class="form-control" id="elname" name="lname" placeholder="Last name" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="ephone" name="phone" placeholder="Phone" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="gender">Gender</label>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" id="emale" value="1">
                  Male
                </label>
                <label>
                  <input type="radio" name="gender" id="efemale" value="2">
                  Female
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  Leave the password field empty if you don't want to change.
              </div>
            </div>

            <div class="form-group">
              <label for="epassword">Password</label>
              <input type="password" class="form-control" id="epassword" name="password" placeholder="Password" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="ecpassword">Confirm password</label>
              <input type="password" class="form-control" id="ecpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
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
<?php endif;?>

<?php if (in_array('deleteStore', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove User</h4>
      </div>

      <form role="form" action="<?php echo base_url('users/remove') ?>" method="post" id="removeForm">
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
<?php endif;?>



<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";


$(document).ready(function() {
  $('#userMainNav').addClass('active');
  // initialize the datatable
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'users/fetchAllUserData',
    'order': [],
    responsive: true,
  });

  $("#addUser").click(function (e) {
    $.ajax({
      type: "GET",
      url: base_url + "users/fetchGroupStoreData",
      dataType: "json",
      success: function (response) {
        // groups
        let groupsDropdown = $('#groups');
          groupsDropdown.empty();
          groupsDropdown.append('<option selected="true" disabled>Select Group</option>');
          groupsDropdown.prop('selectedIndex', 0);
          // Populate dropdown with list of Groups
          $.each(response.groups, function (key, value) {
            groupsDropdown.append($('<option></option>').attr('value', value.id).text(value.group_name));
          });
          // stores
        let storeDropdown = $('#store');
          storeDropdown.empty();
          storeDropdown.append('<option selected="true" disabled>Select Store</option>');
          storeDropdown.prop('selectedIndex', 0);
          // Populate dropdown with list of Groups
          $.each(response.stores, function (key, value) {
            storeDropdown.append($('<option></option>').attr('value', value.id).text(value.name));
          });
      }
    });
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
    url: base_url + 'users/fetchUsersDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#eusername").val(response.user_data.username);
      $("#eemail").val(response.user_data.email);
      $("#efname").val(response.user_data.firstname);
      $("#elname").val(response.user_data.lastname);
      $("#ephone").val(response.user_data.phone);
      if(response.user_data.gender == 1){
          $('#emale').prop('checked',true);
        }else{
          $('#efemale').prop('checked',true);
        }
      // groups
        let groupsDropdown = $('#egroups');
        let group_id = response.user_group.id;
          groupsDropdown.empty();

          // Populate dropdown with list of Groups
          $.each(response.group_data, function (key, value) {
            if(value.id == group_id){
              groupsDropdown.append($('<option selected></option>').attr('value',value.id).text(value.group_name));
            }else
              groupsDropdown.append($('<option></option>').attr('value', value.id).text(value.group_name));
          });
      // store
        let storeDropdown = $('#estore');
        let store_id = response.user_data.store_id;
          storeDropdown.empty();

          // Populate dropdown with list of Groups
          $.each(response.store_data, function (key, value) {
            if(value.id == store_id){
              storeDropdown.append($('<option selected></option>').attr('value',value.id).text(value.name));
            }else
              storeDropdown.append($('<option></option>').attr('value', value.id).text(value.name));
          });

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


              // hide the modal
              $("#editModal").modal('hide');
              // reset the form
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

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
        data: { user_id:id },
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