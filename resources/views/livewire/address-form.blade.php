<div class="address account-content mt-0 pt-2">
    <h4 class="title">Billing address</h4>

    <form wire:submit.prevent="submit" class="mb-2">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First name <span class="required">*</span></label>
                    <input type="text" wire:model.defer="firstName" class="form-control" required />
                    @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Last name <span class="required">*</span></label>
                    <input type="text" wire:model.defer="lastName" class="form-control" required />
                    @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Company </label>
            <input type="text" wire:model.defer="company" class="form-control">
        </div>
        <div class="form-group">
            <label>Country / Region <span class="required">*</span></label>
            <select wire:model="selectedRegion" class="form-control">
                <option value="">-- Choose Region --</option>
                @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
            @error('selectedRegion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
       
        <div class="form-group">
            <label>State <span class="required">*</span></label>
            <select wire:model="selectedState" class="form-control" @if(is_null($states)) disabled @endif>
                <option value="">-- Choose State --</option>
                @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
            @error('selectedState') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Street address <span class="required">*</span></label>
            <input type="text" wire:model.defer="streetAddress" class="form-control" placeholder="House number and street name" required />
            @error('streetAddress') <span class="text-danger">{{ $message }}</span> @enderror

            <input type="text" wire:model.defer="apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" />
        </div>

        <div class="form-group">
            <label>Town / City <span class="required">*</span></label>
            <input type="text" wire:model.defer="town" class="form-control" required />
            @error('town') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Postcode / ZIP <span class="required">*</span></label>
            <input type="text" wire:model.defer="postcode" class="form-control" required />
            @error('postcode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-3">
            <label>Phone <span class="required">*</span></label>
            <input type="text" wire:model.defer="phone" class="form-control" required />
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-3">
            <label>Email address <span class="required">*</span></label>
            <input type="email" wire:model.defer="email" class="form-control" required />
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-footer mb-0">
            <div class="form-footer-right">
                <button type="submit" class="btn btn-dark py-4">
                    Save Address
                </button>
            </div>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
        @endif
    </form>
    @foreach($regions as $region)
    <p>{{ $region->name }}</p>


    @foreach($region->state as $state)
    <p>&nbsp;&nbsp; - {{ $state->name }}</p>
    @endforeach
    @endforeach
</div>