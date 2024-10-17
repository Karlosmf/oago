<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Mary\Traits\Toast;

class WebSearchFilter extends Component
{
    use Toast;
    public $categories = [];
    public $category;
    public $search;
    public function mount(){
        // categories take unique values from products category attribute as id and name
        $this->categories = DB::table('products')->select('category')
            ->where('published', 1)
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->get(['id', 'category']);

        $this->category = session()->get('category');
        $this->search = session()->get('search');
    }
    public function render()
    {
        return view('livewire.web-search-filter');
    }

    public function goSearch(){
        // check if this->category or this->search is set
        if(!$this->category && !$this->search){
            return;
        }

        session()->put('category', $this->category);
        session()->put('search', $this->search);
        // page reload
        return redirect()->to('/');
    }
    public function goReset(){
        session()->forget('category');
        $this->category = '';
        session()->forget('search');
        $this->search = '';
        $this->info('Se ha limpiado la búsqueda');
        // page reload
        return redirect()->to('/');
    }
}
