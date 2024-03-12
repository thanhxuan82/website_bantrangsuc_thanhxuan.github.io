<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<title>CHECK ADDRESS</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="{{ asset('public/frontend/images/favicon.png') }}" />
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <p class="heading">CHECK ADDRESS</p>
                <form class="card-details" method="POST" action="{{route('store-address')}}">
                    @csrf
                    <div class="form-group mb-0">
                        @if(isset($info))
                        <p class="text-warning mb-0">Phone Number</p> <input type="tel" name="phone" pattern="[+][0-9]{11,14}" required placeholder="+84........" value="{{$info->phone}}" size="17" id="cno"  maxlength="12"> <img src="https://img.icons8.com/color/48/000000/address.png" width="64px" height="60px" />
                       @else
                        <p class="text-warning mb-0">Phone Number</p> <input type="tel" name="phone" pattern="[+][0-9]{11,14}" required placeholder="+84........" value="+84" size="17" id="cno"  maxlength="12"> <img src="https://img.icons8.com/color/48/000000/address.png" width="64px" height="60px" />
                        @endif
                    </div>
                    <div class="form-group">
                        <p class="text-warning mb-0">Your Name</p> <input type="text" name="name" required placeholder="Name" value="{{Auth::user()->name}} " readonly size="17">
                    </div>
                    {{-- <div class="form-group">
                        <p class="text-warning mb-0">Total</p> <span name="name" style="font-weight: bold">{{Session::get('Cart')->totalPrice}}$ </span>
                    </div> --}}
                    <div class="form-group pt-2">
                        <div class="row d-flex">
                            <div class="col-sm-4">
                                @if(isset($info))
                                <p class="text-warning mb-0">City</p> <input type="text" name="city" required value="{{$info->city}}" placeholder="Your City" size="12" id="exp" >
                                @else
                                <p class="text-warning mb-0">City</p> <input type="text" name="city" required  placeholder="Your City" size="12" id="exp" >
                                @endif
                            </div>
                            <div class="col-sm-3">
                                @if(isset($info))
                                <p class="text-warning mb-0">District</p> <input type="text" required name="district" value="{{$info->district}}" placeholder="Your District" size="12" >
                               @else
                                <p class="text-warning mb-0">District</p> <input type="text" required name="district" placeholder="Your District" size="12" >
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <div class="row d-flex">
                            <div class="col-sm-7">
                                @if(isset($info))
                                <p class="text-warning mb-0">Address</p> <input type="text" name="address" value="{{$info->address}}" required  size="20" >
                                @else
                                <p class="text-warning mb-0">Address</p> <input type="text" required name="address" placeholder="Your Address" value=""   size="20" >
                                @endif
                            </div>
                            
                        </div>
                        <br>
                        <button type="submit"  class="btn btn-primary" style="width:100px"><i class="fas fa-arrow-right"></i></button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

HTML
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

body {
    background: linear-gradient(to right, rgba(235, 224, 232, 1) 52%, rgba(254, 191, 1, 1) 53%, rgba(254, 191, 1, 1) 100%);
    font-family: 'Roboto', sans-serif
}

.card {
    border: none;
    max-width: 450px;
    border-radius: 15px;
    margin: 150px 0 150px;
    padding: 35px;
    padding-bottom: 20px !important
}

.heading {
    color: #C1C1C1;
    font-size: 14px;
    font-weight: 500
}

img {
    transform: translate(160px, -10px)
}

img:hover {
    cursor: pointer
}

.text-warning {
    font-size: 12px;
    font-weight: 500;
    color: #edb537 !important
}

#cno {
    transform: translateY(-10px)
}

input {
    border-bottom: 1.5px solid #E8E5D2 !important;
    font-weight: bold;
    border-radius: 0;
    border: 0
}

.form-group input:focus {
    border: 0;
    outline: 0
}

.col-sm-5 {
    padding-left: 90px
}

.btn {
    background: #F3A002 !important;
    border: none;
    border-radius: 30px
}

.btn:focus {
    box-shadow: none
}
</style>