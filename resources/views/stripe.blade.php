<!DOCTYPE html>
<html>
<head>
    <title>Stripe</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <x-header/>
<div class="container">
  
    
  <br><br><br><br>
  <div class="row" style="margin-top: -50px">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Add Bank Account</h1>
                
                @if (Session::has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="/accountAdd" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="cardName">Name on Card</label>
                        <input type="text" class="form-control" id="cardName" name="cardName" required>
                    </div>

                    <div class="form-group">
                        <label for="cardNum">Card Number</label>
                        <input type="text" class="form-control" id="cardNum" name="cardNum" required>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 form-group">
                            <label for="cvc">CVC</label>
                            <input type="text" class="form-control" id="cvc" name="cvc" placeholder="ex. 311" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="expMonth">Expiration Month</label>
                            <input type="text" class="form-control" id="expMonth" name="expMonth" placeholder="MM" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="expYear">Expiration Year</label>
                            <input type="text" class="form-control" id="expYear" name="expYear" placeholder="YYYY" required>
                        </div>
                    </div>

                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

      
</div>
  
</body>
  
</html>