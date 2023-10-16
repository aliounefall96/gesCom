<div>
    <div class="container col-md-6 pt-5">
        <h1 class="text-center text-uppercase text-warning ff"> BIENVENU <br> GESTION COMMERCIAL Sunucode</h1>
    </div>
    <div class="container col-md-3 pt-5">
        <div class="card mt-3 bg-light-gray">
            <div class="card-header text-center">
                <div class="row">
                    <div class="text-center col-12 pb-3"><img class="logo-img" src="storage/images/logo.png" alt="logo" width="80" height="80"></div>
                </div>
            <div class="card-body p-2">
                <form wire:submit.prevent="connecter">
                    {{-- @csrf --}}
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('form.email') is-invalid @enderror"  wire:model="form.email" required autocomplete="form.email" autofocus>

                                @error('form.email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('form.password') is-invalid @enderror"  wire:model="form.password" >

                                @error('form.password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <span class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">
                                    Se connecter
                                </button>
                </form>
            </div>
        </div>
    </div>
</div>
