<div class="card-row" id="profile">

@component('SmallComponents.profile')
 @slot('id')
{{$data->id}}
 @endslot

 @slot('email')
{{$data->email}}
 @endslot

 @slot('label')
{{"Email"}}
 @endslot

 @slot('column')

{{"email"}}
 @endslot
@endcomponent

@component('SmallComponents.profile')
 @slot('id')
{{$data->id}}
 @endslot

 @slot('email')
{{$data->name}}
 @endslot
 @slot('label')
{{"Name:"}}
 @endslot

 @slot('column')
{{"name"}}
 @endslot
@endcomponent


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
console.log($(this).prev().prev());
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
