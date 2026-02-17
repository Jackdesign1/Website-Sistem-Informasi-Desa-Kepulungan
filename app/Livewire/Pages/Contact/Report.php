<?php

namespace App\Livewire\Pages\Contact;

use Livewire\Component;

class Report extends Component
{
    public $name, $email, $phone, $category, $title, $description;

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required',
        'category' => 'required',
        'title' => 'required',
        'description' => 'required|max:1000',
    ];

    public function sendToWhatsapp()
    {
        $this->validate();

        $phoneNumber = "628123456789"; // Replace with your target number (use country code)
        
        // Construct the message
        $message = "*Laporan Warga Baru*\n\n" .
            "*Nama:* {$this->name}\n" .
            "*Kategori:* {$this->category}\n" .
            "*Judul:* {$this->title}\n" .
            "*Laporan:* {$this->description}";

        $url = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);

        return redirect()->away($url);
    }
    
    public function render()
    {
        return view('livewire.pages.contact.report');
    }
}
