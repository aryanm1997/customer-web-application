<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</head>
<body>

<a href="/customers/create">
<button>Add New</button>
</a>

<button id="editSelected">
Edit Selected
</button>

<table id="customerTable">

<thead>
<tr>
<th>Select</th>
<th>Name</th>
<th>Address</th>
<th>City</th>
<th>Phone</th>
<th>Postbox</th>
<th>Region</th>
<th>Company</th>
<th>Email</th>
</tr>
</thead>

</table>

<script>

$('#customerTable').DataTable({
ajax:'/customers/data',
pageLength:10,
lengthMenu:[[10,20,50,100],[10,20,50,100]],
columns:[
{
data:'customer_id',
render:function(data){
return '<input type="checkbox" class="chk" value="'+data+'">';
}
},
{data:'name'},
{data:'address'},
{data:'city'},
{data:'phone'},
{data:'postbox'},
{data:'region'},
{data:'company'},
{data:'email'}
]
});

$('#editSelected').click(function(){

let id = $('.chk:checked').first().val();

if(id){
window.open('/customers/edit/'+id,'_blank');
}else{
alert('Select customer');
}

});

</script>

</body>
</html>