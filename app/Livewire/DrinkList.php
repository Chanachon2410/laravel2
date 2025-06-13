<?php

namespace App\Livewire;

use App\Models\Orderitems;
use Livewire\Component;

class DrinkList extends Component
{
    public $drinksData = [];

    public function mount()
    {
        // Query orderitems ร่วมกับ drinks
        $this->drinksData = Orderitems::with('drinks')
            ->get()
            ->map(function ($item) {
                return [
                    'drink_id' => $item->drinks_id,
                    'drink_name' => $item->drinks->name ?? '-',
                    'drink_price' => $item->drinks->price ?? 0,
                    'quantity' => $item->quantity,
                ];
            });
    }

    public function render()
    {
        return view('livewire.drink-list');
    }
}
