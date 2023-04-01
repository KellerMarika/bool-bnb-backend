@extends('layouts.dashboard')

@section('content')
    <div class=" m-auto">
        @if ($userApartmentsCount)
            <h1 class="text-center text-lg-start">Hai <span class="text-primary">{{ $userApartmentsCount }}</span>
                appartamenti in
                totale</h1>
            <div class="py-3">
                <h2>Ultimi aggiunti: </h2>

                @foreach ($lastApartments as $apartment)
                    {{-- @dump($apartment->subscriptions) --}}
                    <a href="{{ route('Admin.apartments.show', $apartment->id) }}" class="text-decoration-none text-dark">

                        <div class="card bg-transparent mb-3  m-auto">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($apartment->cover_img)
                                        <img src="{{ asset('storage/' . $apartment->cover_img) }}"
                                            class="img-fluid rounded rounded h-100 w-100" alt="...">
                                    @else
                                        <img src="{{ asset('storage/apartments_images/placeholder-image.png') }}"
                                            class="img-fluid rounded border h-100 w-100" alt="...">
                                    @endif
                                    {{-- @if ($apartment->cover_img !== null)
                     <td><img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-fluid rounded-start"
                           alt="Card image cap">
                     </td>
                  @elseif(count($apartment->images))
                     <td><img src="{{ asset($apartment->images[0]->image) }}" class="img-fluid rounded-start"
                           alt="Card image cap">
                     </td>
                  @else
                     <td><img src="{{ asset('storage/apartments_images/placeholder-image.png') }}"
                           class="img-fluid rounded-start" alt="Card image cap">
                     </td>
                  @endif --}}
                                </div>
                                <div class="col-md-8 d-flex flex-column form-container">
                                    <div class="card-body flex-grow-1">
                                        <h1 class="card-title text-primary">{{ $apartment->title }}</h1>
                                        <p class="card-text text-muted">{{ $apartment->address }}</p>
                                        <p class="card-text">{{ $apartment->description }}</p>
                                        @if (count($apartment->subscriptions))
                                            @foreach ($apartment->subscriptions as $sub)
                                                @if ($loop->last)
                                                    <p class="text-info ">
                                                        Sponsorizzato fino al:
                                                        {{ date('Y/m/d H:i', strtotime($sub->pivot->expiration_date)) }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        @else
                                            <p class="text-danger fw-bold">Nessuna sponsorizzazione attiva!</p>
                                        @endif
                                    </div>
                                    <div class="card-footer text-center text-lg-end">
                                        <span class="card-text">
                                            <small class="text-muted">
                                                Ultima modifica:
                                                {{ date('Y/m/d H:i', strtotime($apartment->updated_at)) }}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <h3 class="text-center">
                    <a href="{{ route('Admin.apartments.index') }}">Mostra tutti</a>
                </h3>
            </div>
            <h1>Hai <span class="text-primary">{{ count($toReadMessages) }}</span> nuovi messaggi</h1>
            <h2>Ultimi messaggi: </h2>
            <ul>
                @foreach ($lastMsgToShow as $message)
                    <li class="py-3">
                        <h3 class="text-primary fs-5 fs-md-3">{{ $message['subject'] }}</h3>
                        <span class="small"> Mittente:
                            <span class="fw-bold">{{ $message['sender'] }}</span>
                            <span class="text-muted">{{ '(' . $message['email'] . ')' }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
            <h3 class="text-center">
                <a href="{{ route('Admin.dashboard.messages') }}" class="py-3">Mostra tutti i messaggi</a>
            </h3>
        @else
            <h1 class="text-center">Non hai appartamenti da mostrare!</h1>
            <h2 class="text-center">Aggiungine subito di nuovi dalla sezione appartamenti</h2>
        @endif
    </div>
@endsection
