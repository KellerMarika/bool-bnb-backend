@extends('layouts.dashboard')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media (max-width: 767px) {
            .table {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .small {
                display: none;
                list-style: none;
            }
        }
    </style>


    @vite(['resources/js/deleteForm.js'])
    {{-- pezza perchè non lo recupera da dashboard layout?? --}}
    @php
        $frontendURL = env('MY_FRONTEND_URL');
    @endphp

    <div class="my-2 me-md-4 text-center form-container index-container rounded-4 mt-4 px-5 py-3">
        <a class="add-apartment  btn btn-primary text-light my-3 fs-4 py-2 px-md-3" href="{{ route('Admin.apartments.create') }}">Aggiungi nuovo
            Appartamento
            <i class="fa fa-plus"></i>
        </a>
        <div class="small">
            <ul style="margin-left: -20px" class="p-0">
                @foreach ($apartments as $apartment)
                    {{-- <div class="">{{ $apartment->title }}</div> --}}
                    <li style="list-style: none;">
                        <div class="row">
                            <div class="col-6">
                                @if ($apartment->cover_img !== null)
                                    <img src="{{ asset('storage/' . $apartment->cover_img) }}"
                                        style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                        alt="Card image cap" class=" d-inline-block m-auto">
                                @elseif(count($apartment->images))
                                    <img src="{{ asset($apartment->images[0]->image) }}"
                                        style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                        alt="Card image cap" class="m-auto">
                                @else
                                    <img src="{{ asset('storage/apartments_images/placeholder-image.png') }}"
                                        style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                        alt="Card image cap">
                                @endif
                            </div>
                            <div class=" col-6 gap-1 ">
                                <div class="row">
                                    <div class="p-0 col-6">
                                        <a href="{{ route('Admin.apartments.edit', $apartment->id) }}"
                                            class="m-auto w-50 h-75 btn  "><i class="w-75 fa-solid fa-pen "></i></a>
                                    </div>
                                    <div class="col-6 p-0 ">
                                        {{-- {{ route('Admin.apartments.show', $apartment->id) }} --}}
                                        <a href="{{ route('Admin.apartments.show', $apartment->id) }}"
                                            class="h-75 text-center  p-1 btn "><i class="fa-solid fa-eye"></i></a>
                                    </div>


                                    <form class="delete-form col-6 p-0 m-0 "
                                        action="{{ route('Admin.apartments.destroy', $apartment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-75 p-1 m-auto destroy-btn btn  text-dark"><i
                                                class="ms-1 fa-regular fa-trash-can"></i></button>
                                    </form>

                                    <div class="col-6 p-0">
                                        <a href="{{ route('subs.form', $apartment->id) }}"
                                            class="h-75   ms-lg-3  btn  rounded-4 px-2 px-lg-4 "><i
                                                class="fa-brands fa-shopify"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                    <hr style="border: 2px solid white" class="my-2">
                @endforeach

            </ul>
        </div>
        <table class="table L">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Immagine</th>
                    <th>Indirizzo</th>
                    <th>Opzioni</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr>
                        <td>{{ $apartment->title }}</td>
                        @if ($apartment->cover_img !== null)
                            <td><img src="{{ asset('storage/' . $apartment->cover_img) }}"
                                    style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                    alt="Card image cap">
                            </td>
                        @elseif(count($apartment->images))
                            <td><img src="{{ asset($apartment->images[0]->image) }}"
                                    style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                    alt="Card image cap">
                            </td>
                        @else
                            <td><img src="{{ asset('storage/apartments_images/placeholder-image.png') }}"
                                    style="width: 80px; height: 50px; object-fit:cover; object-position: top  "
                                    alt="Card image cap">
                            </td>
                        @endif
                        <td>{{ $apartment->address }}</td>

                        <td>
                            <div class="d-flex gap-lg-3 gap-md-2  gap-1 ">
                                <div>
                                    <a href="{{ route('Admin.apartments.edit', $apartment->id) }}"
                                        class="  btn btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                </div>
                                <div>
                                    {{-- {{ route('Admin.apartments.show', $apartment->id) }} --}}
                                    <a href="{{ route('Admin.apartments.show', $apartment->id) }}"
                                        class="  btn btn-primary text-light"><i class="fa-solid fa-eye"></i></a>
                                </div>


                                <form class="delete-form " action="{{ route('Admin.apartments.destroy', $apartment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="destroy-btn  btn btn-danger text-light"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </form>

                                <div>
                                    <a href="{{ route('subs.form', $apartment->id) }}"
                                        class="  btn btn-secondary  rounded-3 text-light px-2 px-lg-4 "><i
                                            class="fa-brands fa-shopify"></i></a>
                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
