<?php

namespace App\Livewire;

use Livewire\Component;

class GroupService extends Component
{

    public $services;
    public function mount()
    {
        // Sample data - replace with your actual data source
        $this->services = [
            [
                'id' => 1,
                'name' => 'Web Development',
                'price' => '$1,200',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=400&fit=crop&crop=center'
            ],
            [
                'id' => 2,
                'name' => 'Mobile App Design',
                'price' => '$800',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&h=400&fit=crop&crop=center'
            ],
            [
                'id' => 3,
                'name' => 'Digital Marketing',
                'price' => '$600',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=400&fit=crop&crop=center'
            ],
            [
                'id' => 4,
                'name' => 'SEO Optimization',
                'price' => '$450',
                'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=400&h=400&fit=crop&crop=center'
            ],
            [
                'id' => 5,
                'name' => 'Brand Identity',
                'price' => '$900',
                'image' => 'https://images.unsplash.com/photo-1541462608143-67571c6738dd?w=400&h=400&fit=crop&crop=center'
            ],
            [
                'id' => 6,
                'name' => 'Content Strategy',
                'price' => '$550',
                'image' => 'https://images.unsplash.com/photo-1486312338219-ce68e2c6b81d?w=400&h=400&fit=crop&crop=center'
            ]
        ];
    }
    public function render()
    {
        return view('livewire.group-service');
    }
}
