<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="{{ asset('public/frontend/images/paypal.png') }}" />
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <p class="heading">PAYMENT DETAILS</p>
                <form class="card-details" method="POST" action="">
                    {{-- <div class="form-group mb-0">
                        <p class="text-warning mb-0">Phone Number</p> <input type="tel" pattern="[+][0-9]{1,14}" required placeholder="+84........" value="+84" size="17" id="cno"  maxlength="12"> <img src="https://img.icons8.com/color/48/000000/paypal.png" width="64px" height="60px" />
                    </div> --}}
                    <div class="form-group">
                        <p class="text-warning mb-0">Your Name</p> <input type="text" name="name" required placeholder="Name" value="{{Auth::user()->name}} " readonly size="17"><img src="https://img.icons8.com/color/48/000000/paypal.png" width="64px" height="60px" />
                    </div>
                    <div class="form-group">
                        <p class="text-warning mb-0">Quantity Product</p> <span name="name" style="font-weight: bold">{{Session::get('Cart')->totalQuantity}}  </span>
                    </div>
                    <div class="form-group">
                        <p class="text-warning mb-0">Total</p> <span name="name" style="font-weight: bold">{{Session::get('Cart')->totalPrice}}$ </span>
                    </div>
                    
                    {{-- <div class="form-group pt-2">
                        <div class="row d-flex">
                            <div class="col-sm-4">
                                <p class="text-warning mb-0">City</p> <input type="text" required name="exp" placeholder="Your City" size="7" id="exp" >
                            </div>
                            <div class="col-sm-3">
                                <p class="text-warning mb-0">District</p> <input type="text" required name="cvv" placeholder="Your District" size="10" >
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group pt-2">
                        <div class="row d-flex">
                            {{-- <div class="col-sm-7">
                                <p class="text-warning mb-0">Address</p> <input type="text" required name="exp" placeholder="Your Address"  id="exp" size="12" >
                            </div> --}}
                            
                        </div>
                        <br>
                        <button type="submit" style="width: 200px; margin-left:90px" id="paypal-button" class="btn btn-primary"></button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="text" id="totalPrice" value="{{Session::get('Cart')->totalPrice}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  var total=$('#totalPrice').val();
 
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AeF3eeWebxhKztXcF_iYURO7quA-580zsbTmj18_F8ATBz4bMEEkQVMUatv4gmEQq1IUxGOEScJlOj1x',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${total}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.location.href = 'https://localhost/jewelry/success';
        //window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
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