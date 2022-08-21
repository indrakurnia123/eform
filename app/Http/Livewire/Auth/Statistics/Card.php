<?php

namespace App\Http\Livewire\Auth\Statistics;

use Livewire\Component;
use App\Models\Month;
use App\Models\Request;

class Card extends Component
{
    // card component
    public $title;
    public $subtitle;


    // card data
    public $months;
    public $month;
    public $datas;
    public $sumdatas;

    public function mount($title,$data,$subtitle,$sumdata,$month)
    {
        $this->title = $title;
        $this->datas = $data;
        $this->subtitle = $subtitle;
        $this->sumdatas = $sumdata;
        $this->months=Month::all();
        $this->month=$month;
    }
    public function render()
    {
        return view('livewire.auth.statistics.card');
    }
}
