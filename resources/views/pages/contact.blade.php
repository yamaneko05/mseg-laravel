<x-layout title="お問い合わせ">
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><span>C</span>ontact
        <div><span></span><p>お問い合わせ</p></div>
      </h2>
    </div>
  </div>
  <div class="contactform-status">
    <ul class="flex-list">
      <li class="flex-item">
        <div class="status-icon active" id="status-1">
          <span>1</span>
        </div>
        <p>入力</p>
      </li>
      <li class="flex-item">
        <div class="status-icon" id="status-2">
          <span>2</span>
        </div>
        <p>確認</p>
      </li>
      <li class="flex-item">
        <div class="status-icon" id="status-3">
          <span>3</span>
        </div>
        <p>完了</p>
      </li>
    </ul>
    <div class="supply">
      <p><span>*</span> は入力必須事項です。</p>
    </div>
    <div class="err_msg" style="display: none;">
      <ul>
        
      </ul>
    </div>
  </div>
  <x-forms.contact :sended="$sended" />

  <x-line />
  <script src="https://cdn.jsdelivr.net/npm/validator@13.11.0/validator.min.js"></script>
  <script src="{{ asset('script/contactform.js') }}"></script>
</x-layout>
