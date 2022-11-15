<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article as ModelsArticles;

class Index extends Component
{
    public $search = '';
    public $articles;

    public function render()
    {
        if (empty($this->search)) {

            $this->articles = ModelsArticles::get();
        } else {
            $this->articles = ModelsArticles::search($this->search)->get();
        }
        return view('livewire.article.index');
    }
}
