const toastrOptions = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

let url, type, rowIndex;

// INITIALIZE DATAGRID
$('#dg').datagrid({
  columns: [[
    {field:'id', title:'ID', sortable:true, hidden:true},
    {field:'org', title:'ORG', sortable:true},
    {field:'plant', title:'PLANT', sortable:true},
    {field:'sold_to', title:'SOLD TO', sortable:true},
    {field:'ship_to', title:'SHIP TO', sortable:true},
    {field:'material', title:'MATERIAL', sortable:true},
    {field:'distrik', title:'DISTRIK', sortable:true},
    {field:'qty_minimum', title:'QTY MINIMUM', sortable:true},
    {field:'qty_bonus', title:'QTY BONUS', sortable:true},
    {field:'qty_status', title:'QTY STATUS', sortable:true},
    {field:'created_by', title:'CREATED BY', sortable:true},
    {field:'created_at', title:'CREATED AT', sortable:true, width:'200px'},
    {field:'updated_by', title:'UPDATED BY', sortable:true},
    {field:'updated_at', title:'UPDATED AT', sortable:true},
  ]],
  height: '55%'
})

// ADD ITEM
function newUser() {
  $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'New Item');
  $('#fm').form('clear');
  url = '/inventory';
  type = 'POST';
  console.log(url + ' ' + type)
}

// EDIT & UPDATE ITEM
function editUser() {
  let row = $('#dg').datagrid('getSelected');
  rowIndex = $('#dg').datagrid('getRowIndex', row);

  if (row){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit Item');
    $('#fm').form('load', row);
    url = '/inventory/' + row.id;
    type = 'PUT';
  }
  console.log(url + ' ' + type)
}

// add item
// $('#submit-btn').on('click', function(e) {
//   e.preventDefault()

//   let data = $('#fm').serialize()
//   $.ajax({
//     url: "/inventory",
//     type: 'POST',
//     data: data,
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     success: function(response) {
//       $('#dlg').dialog('close')
//       $('#dg').datagrid('insertRow', {index: 0, row: response.data})

//       toastr.options = toastrOptions
//       toastr.success(response.message, 'Success!')
//     },
//     error: function(http, errorStatus, exception) {
//       toastr.options = toastrOptions
//       toastr.error(exception, errorStatus + ' ' + http)
//     }
//   })
// })

// SUBMIT EVENT
$('#submit-btn').on('click', function(e) {
  e.preventDefault();
  let data = $('#fm').serialize();

  $.ajax({
    url: url,
    type: type,
    data: data,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      $('#dlg').dialog('close');

      switch (type) {
        case 'POST':
          $('#dg').datagrid('insertRow', {index: 0, row: response.data});
          break;
        case 'PUT':
          $('#dg').datagrid('updateRow', {index: rowIndex, row: response.data});
          break;
        default:
          break;
      }
      toastr.options = toastrOptions;
      toastr.success(response.message, 'Success!');
    },
    error: function(http, errorStatus, exception) {
      toastr.options = toastrOptions;
      toastr.error(exception, errorStatus + ' ' + http);
    }
  })
})

// function saveUser() {
//   $('#fm').form('submit',{
//     url: '/inventory',
//     iframe: false,
//     onSubmit: function(){
//       return $(this).form('validate');
//     },
//     success: function(result){
//       var result = eval('('+result+')');
//       if (result.errorMsg){
//         $.messager.show({
//           title: 'Error',
//           msg: result.errorMsg
//         });
//       } else {
//         $('#dlg').dialog('close');        // close the dialog
//         $('#dg').datagrid('reload');    // reload the user data
//       }
//     }
//   });
// }

function destroyUser() {
  // $('#dg').datagrid('reload')
  // var row = $('#dg').datagrid('getSelected');
  // if (row){
  //   $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
  //     if (r){
  //       $.post('destroy_user.php',{id:row.id},function(result){
  //         if (result.success){
  //           $('#dg').datagrid('reload');    // reload the user data
  //         } else {
  //           $.messager.show({    // show error message
  //             title: 'Error',
  //             msg: result.errorMsg
  //           });
  //         }
  //       },'json');
  //     }
  //   });
  // }
}