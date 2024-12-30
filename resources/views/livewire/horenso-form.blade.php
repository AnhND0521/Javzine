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
                            <input wire:model="formData.report_title" required="" placeholder="" type="text"
                                class="input">
                            <span>タイトル</span>
                        </label>

                        <label>
                            <input wire:model="formData.report_author" required="" placeholder="" type="text"
                                class="input">
                            <span>送信者</span>
                        </label>

                        <label>
                            <input wire:model="formData.report_content" required="" placeholder="" type="text"
                                class="input">
                            <span>コンテンツ</span>
                        </label>

                        <label>
                            <input wire:model="formData.report_conclusion" required="" placeholder="" type="text"
                                class="input">
                            <span>結論する</span>
                        </label>
                    @elseif ($selectedType === 'contact')
                        <p class="title">連絡</p>
                        <p class="message">以下のフォームに必要な情報を入力して。</p>
                        <label>
                            <input wire:model="formData.contact_author" required="" placeholder="" type="text"
                                class="input">
                            <span>送信者</span>
                        </label>

                        <label>
                            <input wire:model="formData.contact_recipient" required="" placeholder="" type="text"
                                class="input">
                            <span>受信機</span>
                        </label>

                        <label>
                            <input wire:model="formData.contact_content" required="" placeholder="" type="text"
                                class="input">
                            <span>コンテンツ</span>
                        </label>
                    @elseif ($selectedType === 'discussion')
                        <p class="title">相談</p>
                        <p class="message">以下のフォームに必要な情報を入力して。</p>
                        <label>
                            <input wire:model="formData.discussion_topic" required="" placeholder="" type="text"
                                class="input">
                            <span>トピック</span>
                        </label>

                        <label>
                            <input wire:model="formData.discussion_author" required="" placeholder="" type="text"
                                class="input">
                            <span>主催者</span>
                        </label>

                        <label>
                            <input wire:model="formData.discussion_content" required="" placeholder="" type="text"
                                class="input">
                            <span>ディスカッション内容</span>
                        </label>
                        <label>
                            <input wire:model="formData.discussion_conclusion" required="" placeholder=""
                                type="text" class="input">
                            <span>結論する</span>
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
