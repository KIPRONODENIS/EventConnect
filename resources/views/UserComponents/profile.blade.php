<div class="card-row" id="profile">

  <div class="w-1/3">Email:<span class="fa fa-check bg-green-500 p-2 success" id="email">up to date</span></div>
  <div>
<div class="card"  contenteditable="false">{{$data->email}}</div>
  <div class="btn btn-primary edit" >Edit</div>
<div class="btn btn-success save" name="email" >save</div>

</div>
  <script>
$(document).ready(function(){
 var successdiv=$(".success").hide();
  var id={{$data->id}}
  $(".save").hide();
  //while editing
$(".edit").on('click', function(){
//hide successdiv
 specificsuccessdiv=$(this).parent().prev().children().first();
 specificsuccessdiv.hide();
//hide edit button
$(this).hide();
//show save button
$(this).next().show();
//select the previous subling
$(this).prev().attr('contenteditable',true);


})
//in order to save the edited item
$(".save").on('click', function(){
var value=$(this).prev().prev().text();
var save=$(this);
if(value.length>2){
  axios.put('/user', {
    'id':id,
    'name':$(this).attr('name'),
    'value':value

  }).then((response)=>{
    if(response.data.message) {
      //show updated div
       save.parent().prev().children().first().show();
       ////hide save button
      save.hide();
       //show edit button
       save.prev().show();
    }
  },(error)=>{
    alert(error);
  })
}else {
  alert(save.attr('name') + " Must be more than 3 charaters");
}
});


function hideId(name) {
  $("#"+name).hide()
}
})
  </script>
  <form>
</div>
