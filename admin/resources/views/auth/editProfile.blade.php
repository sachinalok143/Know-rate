<div class="modal fade" my-modal1 id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">

  <div class="loginmodal-container">
    <h1>Edit Personal Details</h1><br>
   <form method="POST" action="{{url('/update-profile')}}">
  <input class="input-class" type="hidden" name="_token" value="{{ csrf_token() }}">
    <h1>Please fll out following Form :</h1>
    <div class="contentform">
      <div class="leftcontact">
        
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <p> Name <span>*</span></p>
          <span class="icon-case"><i class="fa fa-user"></i></span>
            <input class="input-class" type="text" name="name" id="name" data-rule="required" pattern="[a-zA-Z\s]+" value="{{ Auth::user()->name }}" required>
            @if ($errors->has('name'))
            <div class="col-md-12">
                 <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            </div>
            @endif
        </div>
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <p> E-mail <span></span></p>  
            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
            <input class="input-class" type="email" name="email" value="{{Auth::user()->email}}" id="email" data-rule="email" >
             @if ($errors->has('email'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            </div>
            @endif
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
      <p>Address <span>*</span></p>
      <span class="icon-case"><i class="fa fa-map-o"></i></span>
      <input class="input-class" type="text" name="address" value="{{ Auth::user()->address}}" id="address" data-rule="required" >
         @if ($errors->has('address'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            </div>
            @endif
      </div> 
       <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
      <p>Remark </p>
      <span class="icon-case"><i class="fa  fa-comment-o"></i></span>
        <input class="input-class" type="text" name="remark" value="{{ Auth::user()->remark }}" id="remark" >
         @if ($errors->has('remark'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('remark') }}</strong>
                </span>
            </div>
            @endif
      </div>  


      </div>

  <div class="rightcontact">  

      <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
        <p>Select Country <span>*</span></p>  
        <span id="Country" style="display:none;">{{Auth::user()->country}}</span>
        <select class="col-md-12" onchange="populateStates('country','state')" id="country" value="{{Auth::user()->country}}" name ="country"><option  value=""  deselected>{{ Auth::user()->country}}</option></select> 
         @if ($errors->has('country'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            </div>
            @endif
        </div>
      <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
        </p>Select State </p> 
        
        <select class="col-md-12"  value="{{ Auth::user()->state }}" name ="state" id ="state"><option value=""  deselected>{{ Auth::user()->state}}</option></select>  
       
         @if ($errors->has('state'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('state') }}</strong>
                </span>
            </div>
            @endif
      </div>

      <script language="javascript">
        populateCountries("country","state");
        populateStates("country","state");
      </script>

      <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <p>City <span>*</span></p>
      <span class="icon-case"><i class="fa fa-building-o"></i></span>
        <input class="input-class" type="text" name="city" value="{{ Auth::user()->city }}" id= data-rule="required" >
         @if ($errors->has('city'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            </div>
            @endif
      </div>
  </div>
  </div>
<button type="submit" class="bouton-contact">Submit</button>
  
</form> 
  </div>
</div>
</div>






















