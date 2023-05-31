@extends('layout.auth')


@section('css')
    {{-- Put CSS here --}}
@endsection


@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                document.addEventListener("DOMContentLoaded", (event) => {
                    showToast('error', 'Error', '{{ $error }}')
                });
            </script>
        @endforeach
    @endif

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" value="{{ old('email') }}"
                                        name="email" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password_confirmation" class="control-label">Confirm your
                                            password</label>
                                    </div>
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    {{-- Put JS Here --}}

    <script>
        function showToast(toastType, toastTitle, toastMsg) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                confirmButtonColor: '#204065',
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                title: toastTitle,
                text: toastMsg,
                icon: toastType
            })
        }
    </script>
@endsection
