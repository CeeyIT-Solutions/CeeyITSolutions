@extends($activeTemplate.'layouts.master')
@section('content')

<section class="pt-100 pb-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card custom--card">
            <div class="card-body px-4 py-3">
                <div class="card-wrapper"></div>
                <br><br>

                <form role="form" id="payment-form" method="{{$data->method}}" action="{{$data->url}}">
                    @csrf
                    <input type="hidden" value="{{$data->track}}" name="track">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">@lang('Name on Card')</label>
                            <div class="input-group">
                                <input type="text" class="form--control custom-input" name="name" placeholder="@lang('Name on Card')" autocomplete="off" autofocus/>
                                <span class="input-group-text"><i class="fa fa-font"></i></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="cardNumber">@lang('Card Number')</label>
                            <div class="input-group">
                                <input type="tel" class="form--control custom-input" name="cardNumber" placeholder="@lang('Valid Card Number')" autocomplete="off" required autofocus/>
                                <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="cardExpiry">@lang('Expiration Date')</label>
                            <input type="tel" class="form--control  custom-input" name="cardExpiry" placeholder="@lang('MM / YYYY')" autocomplete="off" required/>
                        </div>
                        <div class="col-md-6 ">
                            <label for="cardCVC">@lang('CVC Code')</label>
                            <input type="tel" class="form--control custom-input" name="cardCVC" placeholder="@lang('CVC')" autocomplete="off" required/>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn--base w-100" type="submit"> @lang('PAY NOW')
                    </button>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

  
@endsection


@push('script')
    <script src="{{ asset('assets/global/js/card.js') }}"></script>

    <script>
        (function ($) {
            "use strict";
            var card = new Card({
                form: '#payment-form',
                container: '.card-wrapper',
                formSelectors: {
                    numberInput: 'input[name="cardNumber"]',
                    expiryInput: 'input[name="cardExpiry"]',
                    cvcInput: 'input[name="cardCVC"]',
                    nameInput: 'input[name="name"]'
                }
            });
        })(jQuery);
    </script>
@endpush
