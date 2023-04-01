@extends('layouts.app')
@section('content')

    <div id="sponsor" class="container form-container px-5 rounded-5 mt-5 py-5">
        <form action="#" method="post">
            @csrf
            @method('POST')
        </form>
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex-center position-ref full-height">

            <h1 class="text-uppercase text-center mt-5">Scegli una Promozione:</h1>
            <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                @csrf

                <div id="subs-container" class="row">

                  @foreach ([0, 1, 2] as $i)
                        <div class="row col-12 col-lg-4  card-container border-0">
                            <?php
                            $class = '';

                            switch ($i) {
                                case 0:
                                    $class = 'bg-silver';
                                    $icon = 'flash-outline';
                                    $title = 'economy';
                                    $iconColor = 'text-secondary';
                                    break;
                                case 1:
                                    $class = 'bg-gold';
                                    $icon = 'diamond-outline';
                                    $title = 'standard';
                                    $iconColor = 'text-warning';
                                    break;
                                case 2:
                                    $class = 'bg-diamond';
                                    $icon = 'rocket-outline';
                                    $title = 'premium';
                                    $iconColor = 'text-danger';
                                    break;
                            }
                            ?>
                            <div class="card-container col d-flex col-12 col-lg-4 border-0 my-3 ">

                                <input id="{{ 'sub' . $i }}" class="sub-plan-input d-none" type="radio" name="amount"
                                    value="{{ $data[$i]['price'] }}">

                                <label style="cursor: pointer;" class="d-block sub-plan-label p-0 m-0" for="{{ 'sub' . $i }}">
                                    <div class="card border-0 <?php echo $class; ?>">
                                        <div class="icon">
                                            <ion-icon class="<?php echo $iconColor ?> " style="color:" name="<?php echo $icon; ?>">
                                            </ion-icon>
                                        </div>
                                        <div class="content text-light">
                                            <h1 class="text-uppercase"><?php echo $title; ?></h2>
                                                <span class="m-2">visibilità garantita per</span>
                                                <h2 class="p-1" style="font-size:50px">{{ $data[$i]['duration'] }} ore
                                                </h2>
                                                <h3>{{ $data[$i]['price'] }} €</h3>
                                        </div>
                                    </div>
                                </label>
                            </div>

                        </div>
                    @endforeach
                </div>

                <input class="d-none" type="hidden" name="apartmentID" value="{{ $apartmentID }}">
                <div class="text-center final-button">
                    <button type="submit" class="d-none btn btn-success" id="invia">Confirm Payment</button>
                </div>
                <section>


                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input class="" id="nonce" name="payment_method_nonce" type="hidden" />
                <div class="row  ">
                    <div class="col-8 text-end p-0 ">
                        <button
                            class="hoverbtnPaga justify-item-end  button btn btn-danger py-2 fs-4  mt-4 text-light  ms-5 px-5"
                            type="submit"><span class="px-5">SPONSORIZZA!</span></button>
                    </div>
                    <div class="col text-end p-0">
                        <a type="button" href="{{ route('Admin.apartments.show', $apartmentID) }}"
                            class="hoverBtnBackToApartment btn btn-outline-primary opacity-50 me-3 mt-4">
                            <i class="fa-solid fa-share"></i>
                            vai al tuo appartamento
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            header: "paga con la carta",
            selector: '#bt-dropin',
            // paypal: {
            //     flow: 'vault'
            // }
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
    {{-- <script src="{{ asset('js/admin/sponsor.js') }}" charset="utf-8"></script> --}}
@endsection
