<?php

namespace App\Livewire;

use Livewire\Component;

class HorensoForm extends Component
{
    public $selectedType = 'report'; 
    public $formData = [];
    public $generatedText = null;
    public function render()
    {
        return view('livewire.horenso-form');
    }

    public function generateText()
    {
        if ($this->selectedType === 'report') {
            $this->generatedText = "報告:\n"
                . "タイトル: {$this->formData['report_title']}\n"
                . "送信者: {$this->formData['report_author']}\n"
                . "コンテンツ:\n{$this->formData['report_content']}\n"
                . "結論する: {$this->formData['report_conclusion']}";
        } elseif ($this->selectedType === 'contact') {
            $this->generatedText = "連絡:\n"
                . "送信者: {$this->formData['contact_author']}\n"
                . "受信機: {$this->formData['contact_recipient']}\n"
                . "連絡先:\n{$this->formData['contact_content']}";
        } elseif ($this->selectedType === 'discussion') {
            $this->generatedText = "相談:\n"
                . "トピック: {$this->formData['discussion_topic']}\n"
                . "主催者: {$this->formData['discussion_author']}\n"
                . "ディスカッション内容:\n{$this->formData['discussion_content']}\n"
                . "結論する: {$this->formData['discussion_conclusion']}";
        }
    }
}
