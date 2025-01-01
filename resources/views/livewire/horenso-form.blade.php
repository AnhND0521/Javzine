<div id="content">
    <div class="content-top">
        <div class="horenso-content">
            <div class="mb-4">
                <form class="max-w-sm mx-auto">
                    <select wire:model.live="selectedType" id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="report">報告</option>
                        <option value="contact">連絡</option>
                        <option value="discussion">相談</option>
                    </select>
                </form>

            </div>
            <div class="horenso-detail">
                <div class="form">
                    @if ($selectedType === 'report')
                        <p class="title">報告</p>
                        <p class="message">以下のフォームに必要な情報を入力して。</p>
                        <label>
                        <span>タイトル</span>
                            <input wire:model="formData.report_title" required="" placeholder="" type="text"
                                class="input">
                        </label>

                        <label>
                        <span>完了した作業</span>
                            <textarea wire:model="formData.report_finished" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>

                        <label>
                        <span>進行中の作業</span>
                            <textarea wire:model="formData.report_in_progress" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>

                        <label>
                        <span>直面している問題</span>
                            <textarea wire:model="formData.report_problem" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>
                        
                        <label>
                        <span>必要なサポート</span>
                            <input wire:model="formData.report_support" required="" placeholder="" type="text"
                                class="input">
                        </label>
                        
                        <label>
                        <span>次の作業計画</span>
                            <input wire:model="formData.report_next" required="" placeholder="" type="text"
                                class="input">
                        </label>
                    @elseif ($selectedType === 'contact')
                        <p class="title">連絡</p>
                        <p class="message">以下のフォームに必要な情報を入力して。</p>
                        <label>
                            <span>主題</span>
                            <input wire:model="formData.contact_subject" required="" placeholder="" type="text"
                                class="input">
                        </label>

                        <label>
                            <span>進行中の作業</span>
                            <textarea wire:model="formData.contact_in_progress" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>

                        <label>
                            <span>関係者</span>
                            <textarea wire:model="formData.contact_involved" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>

                        <label>
                            <span>必要なアクシオン</span>
                            <textarea wire:model="formData.contact_action" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>
                    @elseif ($selectedType === 'discussion')
                        <p class="title">相談</p>
                        <p class="message">以下のフォームに必要な情報を入力して。</p>
                        <label>
                            <span>相談内容</span>
                            <input wire:model="formData.discussion_content" required="" placeholder="" type="text"
                                class="input">
                        </label>

                        <label>
                            <span>問題の詳細</span>
                            <textarea wire:model="formData.discussion_problem" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>

                        <label>
                            <span>試した解決策</span>
                            <textarea wire:model="formData.discussion_attempt" required="" placeholder="" type="text"
                                class="input"></textarea>
                        </label>
                        <label>
                            <span>相談したい質問</span>
                            <textarea wire:model="formData.discussion_question" required="" placeholder=""
                                type="text" class="input"></textarea>
                        </label>
                        <label>
                            <span>関係者</span>
                            <textarea wire:model="formData.discussion_involved" required="" placeholder=""
                                type="text" class="input"></textarea>
                        </label>
                        <label>
                            <span>回答期限</span>
                            <input wire:model="formData.discussion_deadline" required="" placeholder=""
                                type="text" class="input">
                        </label>
                    @endif
                    <button class="submit" wire:click="generateText">完了</button>
                </div>
            </div>
            <!-- Bước 4: Hiển thị và sao chép văn bản -->
            @if ($generatedText)
                <div class="result center">
                    <div class="result-content">
                        <h3>作成したテキスト</h3>
                        <textarea id="generatedText" class="form-textarea" readonly>{{ $generatedText }}</textarea>
                        <button class="btn btn-secondary mt-2" onclick="copyToClipboard()">Copy</button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const textarea = document.getElementById('generatedText');
            textarea.select();
            document.execCommand('copy');
            alert('クリップボードにコピーされた!');
        }
    </script>
</div>
