@extends('layouts.app')

@section('content')
    <div class="container form-container rounded-3 p-4 mt-3">

        <h1 class="m-0 my-1 pb-5">Invia un messaggio al proprietario dell'appartamento</h1>
   
        @if ($errors->any())
            <div class="alert alert-danger">
                {{-- lista errori da fixare --}}
                <ul>
                    @if ($errors->has('sender'))
                        <li>Inserire il nome del mittente</li>
                    @endif
                    @if ($errors->has('email'))
                        <li>Inserire un'email per essere ricontattati</li>
                    @endif
                    @if ($errors->has('subject'))
                        <li>L'oggetto del messaggio è richiesto</li>
                    @endif
                    @if ($errors->has('message'))
                        <li>Il messaggio non può essere vuoto</li>
                    @endif

                </ul>
            </div>
        @endif

        <form action="{{ route('messages.store', $apartmentId) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="sender" value="{{ $user->name ?? null }}"
                            placeholder="Enter your fulll name" />
                        <label for="floatingInput">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" value="{{ $user->email ?? null }}"
                            placeholder="name@example.com" />
                        <label for="floatingPassword">Email </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="subject" placeholder="name@example.com" />
                        <label for="floatingInput">Oggetto</label>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="8" placeholder="Messaggio"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-buttons d-flex justify-content-between justify-content-md-end ">
                <a href="{{ env('MY_FRONTEND_URL') . '/apartments/' . $apartmentId }}"
                    class="me-3 btn text-primary border-primary d-flex align-items-center">
                    <i class="fa-solid fa-reply pe-2"></i> Indietro
                </a>
                <div class="form-controls">
                    <button type="submit" class="btn btn-primary text-light border-primary">
                        Invia
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
