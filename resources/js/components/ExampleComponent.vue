<template>
    <div class="container">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Update Status
  </button>


  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">


        <div class="modal-header">
          <h4 class="modal-title">Update Status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="container">
    <div class="row">
        <div class="col-8 col-md-4">


          <h6>Large</h6>
          <select v-model="status" class="custom-select custom-select-lg form-control" id="gender2">
            <option selected>Choose...</option>
            <option >accepted</option>
            <option >Rejected</option>
            <option >pending</option>
          </select>
        </div>
    </div>

  </div>


        </div>

        <div class="modal-footer flex justify-around">
          <button type="button" class="btn btn-success" @click="send">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
       props: {
         id: {
           type:Number,
           required:true
         }

       },
        mounted() {
            console.log('Component mounted.')
        },
        data() {
        return {
        status:'Select',
        invitation:this.id
        }
        },

        methods: {
          
        send() {

      axios.post("/seller/invitation",{
        'status':this.status,
        'id':this.id
      }).then((response)=>{
       console.log(response.data);
      })
      .then((error)=> {

      });

        },
        changed() {
    alert("i got ot")
        }
        }
    }
</script>
