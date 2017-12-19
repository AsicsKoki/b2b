@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">Payment</h1>

<main class="main_app_container">
    
<div class="container money_slider_container">
  <div class="row">
  <div class="col-sm-6">
<h3>Prepay and get discounts:</h3>
  <div class="row">
    <div class="col-sm-12">
      <div class="h4">Pay:</div>
      <div class="value-1">
        <div class="number-1">0 RSD
        </div>
        <div class="money-slider"></div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="h4">And get bonus ( <span id="bonus">0%</span>)</div>
      <div class="value-2">
        <div class="number-2">0
        </div>
        <div class="slider-2"></div>
      </div>
    </div>
  </div>
  </div>
    <div class="col-sm-6">
      <h3>Payment method:</h3>
      <div class="radio payment_method">
       <label for="stripe_payment"><input type="radio" name="stripe_payment" id="stripe_payment">Stripe</label>
      </div>
      <button class="btn btn-primary" type="submit">Proceed to payment of <span id="total_amount_btn"> 0 RSD </span></button>
    </div>
  </div>
</div>
</main>

@endsection