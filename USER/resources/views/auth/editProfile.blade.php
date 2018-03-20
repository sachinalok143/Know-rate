
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">X</span>
<div class="col-lg-8 col-md-offset-2" style="position:absolute; top:100px;">
  <form class="modal-content animate form vertical-form" method="POST" action="{{url('/update-profile/')}}"  class="vertical-form" style="padding: 100px;">
  {{csrf_field()}}
    <div class="container">
       <label class="col-sm-2 control-label">Name Of User </label>  
        <div class="col-sm-4">
            <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name}}"/> 
        </div><br><br>  

       <label class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-4">
            <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email}}"/> 
        </div><br><br>  

       
        <label class="col-sm-2 control-label">Address:</label> 
        <div class="col-sm-4">
            <input type="text" class="form-control" name="address" id="Address" value="{{ Auth::user()->address}}"></input> 
            <input type="hidden" name="type" value="{{ Auth::user()->type}}">
        </div><br><br>
      <div class="clearfix">
      
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Save</button>
      </div>
    </div>
  </form>
</div>
</div>

<script type="text/javascript">
function hideform(argument) {
    
    document.getElementById('Edit_form').style.visibility = 'hidden';
}
</script>
</form>

