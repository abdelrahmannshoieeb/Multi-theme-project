<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Region;
use App\Models\State;
use Livewire\Component;

class AddressForm extends Component
{

    public $regions = [];
    public $states = [];
    public $selectedRegion = null;
    public $selectedState ;

    public $first_name;
    public $last_name;
    public $company;
    public $country;
    public $street_address;
    public $apartment;
    public $town;
    public $state;
    public $postcode;
    public $phone;
    public $email;

    public function mount()
    {
        $this->regions = Region::all();
    }

    public function updatedSelectedRegion($regionId)
    {
        $this->states = State::where('region_id', $regionId)->get();
        $this->selectedState = null; 
    }

    public function test($value)
    {
        logger()->info('Selected Region:', ['value' => $value]);
    }
    
    public function submit()
    {
        $user = auth()->user();
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'streetAddress' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        Address::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'company' => $this->company,
            'region_id' => $this->selectedRegion,
            'state_id' => $this->selectedState,
            'street_address' => $this->streetAddress,
            'apartment' => $this->apartment,
            'town' => $this->town,
            'postcode' => $this->postcode,
            'phone' => $this->phone,
            'email' => $this->email,
            'user_id' => $user->id,
        ]);

        session()->flash('message', 'Address saved successfully.');

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->company = '';
        $this->selectedRegion = null;
        $this->selectedState = null;
        $this->street_address = '';
        $this->apartment = '';
        $this->town = '';
        $this->postcode = '';
        $this->phone = '';
        $this->email = '';
        $this->states = [];
    }

    public function render()
    {
        $test = State::all() ;
        return view('livewire.address-form' ,['test' => $test,
        'selectedRegion' => $this->selectedRegion ]);
    }
}
