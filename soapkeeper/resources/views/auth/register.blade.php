@extends('layouts.app')

@section('content')


 <h1>ShopKeeper Registration Form</h1>
   
   <!--div class="info"><a href="https://www.grandvincent-marion.fr" target="_blank"><p> Made with <i class="fa fa-heart"></i> by Marion Grandvincent </p></a></div-->
  
  <form class="form-horizontal" role="form" method="POST" style="max-width:700px" action="{{ route('register') }}">
  <input class="input-class" type="hidden" name="_token" value="{{ csrf_token() }}">
    <h1>Please fll out following Registration Form :</h1>
    <div class="contentform">
      <div class="leftcontact">
        
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <p> Name <span>*</span></p>
          <span class="icon-case"><i class="fa  fa-user"></i></span>
            <input class="input-class" type="text" name="name" id="name" data-rule="required" pattern="[a-zA-Z\s]+" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            </div>
            @endif
        </div>
        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
            <p> Contact no. <span>*</span></p>
            <span class="icon-case"><i class="fa  fa-phone"></i></span>
            <input class="input-class" type="text" name="contact" id="contact" data-rule="required" pattern="[0-9]{10}" value="{{ old('contact') }}" required>
            @if ($errors->has('contact'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('contact') }}</strong>
                </span>
            </div>
            @endif        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <p> E-mail <span></span></p>  
            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
            <input class="input-class" type="email" name="email" value="{{ old('email') }}" id="email" data-rule="email" >
             @if ($errors->has('email'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            </div>
            @endif
        </div>
        <div class="form-group{{ $errors->has('shopName') ? ' has-error' : '' }}">
          <p> Shop Name <span>*</span></p>  
          <span class="icon-case"><i class="fa  fa-home"></i></span>
          <input class="input-class" type="text" name="shopName" value="{{ old('shopName') }}"id="shopName" data-rule="shopName" pattern="[A-Za-z\s]{1,100}" required>
           @if ($errors->has('shopName'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('shopName') }}</strong>
                </span>
            </div>
            @endif
        </div>  

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <p> Password <span>*</span></p>
      <span class="icon-case"><i class="fa  fa-user-secret"></i></span>
        <input class="input-class" type="Password" name="password" id="password" data-rule="required" required>
        @if ($errors->has('password'))
          <div class="col-md-12">
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          </div>
        @endif
      </div>

      <div class="form-group">
      <p> Confirm Password <span>*</span></p>
      <span class="icon-case"><i class="fa  fa-user-secret"></i></span>
        <input class="input-class" type="Password" name="password_confirmation" id="password_confirmation" data-rule="required" >
                <!-- <div class="validation"></div> -->
      </div> 



  </div>

  <div class="rightcontact">  

      <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
        <p>Select Country <span>*</span></p>  
        <div class="col-md-4"> 
        <select id="country" value="{{ old('country') }}" onchange="populateStates('country','state')" name ="country"></select> 
         @if ($errors->has('country'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            </div>
            @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
        </p>Select State </p> 
        <div class="col-md-4">
        <select style="min-width: 150px;" value="{{ old('state') }}" name ="state" id ="state"></select>  
        </div>
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
      </script>

      <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <p>City <span>*</span></p>
      <span class="icon-case"><i class="fa fa-building-o"></i></span>
        <input class="input-class" type="text" name="city" value="{{ old('city') }}" id="city" data-rule="required" >
         @if ($errors->has('city'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            </div>
            @endif
      </div>

      <div class="form-group{{ $errors->has('landmark') ? ' has-error' : '' }}">
      <p>Landmark <span>*</span></p>
      <span class="icon-case"><i class="fa fa-map-marker"></i></span>
        <input class="input-class" type="text" name="landmark" value="{{ old('landmark') }}" id="landmark" data-rule="required" >
         @if ($errors->has('landmark'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('landmark') }}</strong>
                </span>
            </div>
            @endif
      </div>  
    
      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
      <p>Address <span>*</span></p>
      <span class="icon-case"><i class="fa  fa-map-o"></i></span>
      <input class="input-class" type="text" name="address" value="{{ old('address') }}" id="address" data-rule="required" >
         @if ($errors->has('address'))
            <div class="col-md-12">
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            </div>
            @endif
      </div> 
 
  </div>
  </div>
<button type="submit" class="bouton-contact">Submit</button>
  
</form> 


@endsection
