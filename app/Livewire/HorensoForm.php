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
            $this->generatedText = "タイトル: {$this->formData['report_title']}\n"
                . "1.完了した作業:\n{$this->formData['report_finished']}\n"
                . "2.進行中の作業:\n{$this->formData['report_in_progress']}\n"
                . "3.直面している問題:\n{$this->formData['report_problem']}\n"
                . "4.必要なサポート: {$this->formData['report_support']}\n"
                . "5.次の作業計画: {$this->formData['report_next']}";
        } elseif ($this->selectedType === 'contact') {
            $this->generatedText = "主題: {$this->formData['contact_subject']}\n"
                . "1.進行中の作業:\n{$this->formData['contact_in_progress']}\n"
                . "2.関係者:\n{$this->formData['contact_involved']}\n"
                . "3.必要なアクシオン:\n{$this->formData['contact_action']}";
        } elseif ($this->selectedType === 'discussion') {
            $this->generatedText = "相談内容: {$this->formData['discussion_content']}\n"
                . "問題の詳細:\n{$this->formData['discussion_problem']}\n"
                . "試した解決策:\n{$this->formData['discussion_attempt']}\n"
                . "相談したい質問:\n{$this->formData['discussion_question']}\n"
                . "関係者:\n{$this->formData['discussion_involved']}\n"
                . "回答期限: {$this->formData['discussion_deadline']}";
        }
    }
}
