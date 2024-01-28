<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
  <h2>Ajax CRUD Application</h2>
  <p>Click the item first to edit and delete.</p>
  
  <table id="dg" title="My Inventory" class="easyui-datagrid" style="width:100%;height:250px"
          url='/inventory'
          toolbar="#toolbar" pagination="true"
          rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
      <tr>
        {{-- <th field="org" width="50">ORG</th>
        <th field="plant" width="50">PLANT</th>
        <th field="sold_to" width="50">SOLD TO</th>
        <th field="ship_to" width="50">SHIP TO</th>
        <th field="material" width="50">MATERIAL</th>
        <th field="distrik" width="50">DISTRIK</th>
        <th field="qty_minimum" width="50">QTY MINIMUM</th>
        <th field="qty_bonus" width="50">QTY BONUS</th>
        <th field="qty_status" width="50">QTY STATUS</th>
        <th field="created_by" width="50">Created by</th>
        <th field="created_date" width="50">Created Date</th>
        <th field="updated_by" width="50">Updated by</th>
        <th field="updated_date" width="50">Updated Date</th> --}}
      </tr>
    </thead>
    <tbody id="table-body">
      @foreach (json_decode($data) as $item)
        <?php
          $timestamp_create = strtotime($item->created_at);
          $timestamp_update = strtotime($item->updated_at);
        ?>
        
        <tr id={{ $item->id }}>
          <td>{{ $item->org }}</td>
          <td>{{ $item->plant }}</td>
          <td>{{ $item->sold_to }}</td>
          <td>{{ $item->ship_to }}</td>
          <td>{{ $item->material }}</td>
          <td>{{ $item->distrik }}</td>
          <td>{{ $item->qty_minimum }}</td>
          <td>{{ $item->qty_bonus }}</td>
          <td>{{ $item->qty_status }}</td>
          <td>{{ $item->created_by }}</td>
          <td>{{ date('d/m/Y | H:i:s', $timestamp_create) }}</td>
          <td>{{ $item->updated_by }}</td>
          <td>{{ date('d/m/Y | H:i:s', $timestamp_update) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Delete</a>
  </div>
  
  <div id="dlg" class="easyui-dialog" style="width:50%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" novalidate style="margin:0;padding:20px 50px">
      @csrf
      <h3>Item Information</h3>
      <div style="margin-bottom:10px">
        <input name="org" type="number" class="easyui-textbox" label="Org:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="plant" type="text" class="easyui-textbox" label="Plant:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="sold_to" type="text" class="easyui-textbox" label="Sold to:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="ship_to" type="text" class="easyui-textbox" label="Ship to:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="material" type="text" class="easyui-textbox" label="Material:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="distrik" type="email" class="easyui-textbox" label="Distrik:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="qty_minimum" type="number" class="easyui-textbox" label="Qty minimum:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="qty_bonus" type="number" class="easyui-textbox" label="Qty bonus:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="qty_status" type="number" class="easyui-textbox" label="Qty status:" style="width:100%">
      </div>
      <div style="margin-bottom:10px">
        <input name="created_by" type="" class="easyui-textbox" label="Created by:" style="width:100%">
      </div>
      <div id="dlg-buttons">
        <a id="submit-btn" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
      </div>
    </form>
  </div>

  <script src="script.js" type="text/javascript"></script>
</body>
</html>